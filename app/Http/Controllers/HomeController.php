<?php
  
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Milk;
use App\Models\Cow;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;
  
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    } 

    public function add_months($months, DateTime $dateObject) 
    {
        $next = new DateTime($dateObject->format('Y-m-d'));
        $next->modify('last day of +'.$months.' month');

        if($dateObject->format('d') > $next->format('d')) {
            return $dateObject->diff($next);
        } else {
            return new DateInterval('P'.$months.'M');
        }
    }

    public function endCycle($d1, $months)
    {
        $date = new DateTime($d1);

        // call second function to add the months
        $newDate = $date->add($this->add_months($months, $date));

        // goes back 1 day from date, remove if you want same day of month
        #$newDate->sub(new DateInterval('P1D')); 

        //formats final date to Y-m-d form
        $dateReturned = $newDate->format('Y-m-d'); 

        return $dateReturned;
    }

    public function exponentialSmoothing($periode, $dataset)
    {
        // Adaptive Response Rate Single Exponential Smoothing
        // F[periode ke-t] = (alpha[t] * X[t]) + ((1 - alpha[t]) * F[t])
        $X = $dataset; // dataset
        $F = []; // peramalan
        $e = []; // error/kesalahan
        $E = []; // error dihaluskan
        $AE = []; //error absolut
        $alpha = []; // konstanta smoothing
        $beta = [0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9]; // range alpha
        $PE = []; // persentase error
        $MAPE = []; // rata rata kesalahan

        // perhitungan peramalan menggunakan nilai beta mulai dari 0.1 sampai 0.9
        for($i = 0; $i < count($beta); $i++) {
            // inisialisasi
            $F[$i][0] = $e[$i][0] = $E[$i][0] = $AE[$i][0] = $alpha[$i][0] = $PE[$i][0] = 0;
            $F[$i][1] = $X[0];
            $alpha[$i][1] = $beta[$i];

            for($j = 1; $j < count($periode); $j++){
                // perhitungan peramalan untuk periode berikutnya
                $F[$i][$j + 1] = ($alpha[$i][$j] * $X[$j]) + ((1 - $alpha[$i][$j]) * $F[$i][$j]);

                // menghitung selisih antara nilai aktual dengan hasil peramalan
                $e[$i][$j] = $X[$j] - $F[$i][$j]; 

                // menghitung nilai kesalahan peramalan yang dihaluskan
                $E[$i][$j] = ($beta[$i] * $e[$i][$j]) + ((1 - $beta[$i]) * $E[$i][$j - 1]);

                // menghitung nilai kesalahan absolut peramalan yang dihaluskan
                $AE[$i][$j] = ($beta[$i] * abs($e[$i][$j])) + ((1 - $beta[$i]) * $AE[$i][$j - 1]);

                // menghitung nilai alpha untuk periode berikutnya
                $alpha[$i][$j + 1] = $E[$i][$j] == 0 ? $beta[$i] : abs($E[$i][$j] / $AE[$i][$j]);

                // menghitung nilai kesalahan persentase peramalan
                $PE[$i][$j] = $X[$j] == 0 ? 0 : abs((($X[$j] - $F[$i][$j]) / $X[$j]) * 100);
            }

            // menghitung rata-rata kesalahan peramalan
            $MAPE[$i] = array_sum($PE[$i])/(count($periode) - 1);
        }
        
        // mendapatkan index beta dengan nilai mape terkecil
        $bestBetaIndex = array_search(min($MAPE), $MAPE);

        // menyatukan semua hasil perhitungan dan menginputkan hasil peramalan periode berikutnya
        $result = [];
        for ($i = 0; $i <= count($periode); $i++) {
            $result[$i] = round($F[$bestBetaIndex][$i]);
        }
        
        // masukkan hasil, beta, dan mape tebaik ke array
        $final = [
            'result' => $result,
            'last' => end($result),
            'mape' => $MAPE[$bestBetaIndex],
        ];
        
        return $final;
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboardAdmin()
    {
        $pemasukan = collect(DB::select("SELECT to_date(to_char(date_trunc('month', tanggal), 'DDMMYYYY'),'DDMMYYYY') AS txn_month, sum(nominal) as pemasukan FROM transaction where jenis = 1 GROUP BY txn_month order by txn_month"))
        ->pluck('txn_month', 'pemasukan');
        
        $transaksirekap = DB::select("SELECT to_date(to_char(date_trunc('month', tanggal), 'DDMMYYYY'),'DDMMYYYY') AS txn_month, sum(case when jenis = 1 then nominal END) as pemasukan, sum(case when jenis = 0 then nominal END) as pengeluaran FROM transaction GROUP BY txn_month order by txn_month desc");

        $pengeluaran = collect(DB::select("SELECT to_date(to_char(date_trunc('month', tanggal), 'DDMMYYYY'),'DDMMYYYY') AS txn_month, sum(nominal) as pengeluaran FROM transaction where jenis = 0 GROUP BY txn_month order by txn_month"))
        ->pluck('txn_month', 'pengeluaran');

        $pemerahan = collect(DB::select("SELECT to_date(to_char(date_trunc('month', tanggal), 'DDMMYYYY'),'DDMMYYYY') AS txn_month, sum(jumlah) as jumlah FROM milk GROUP BY txn_month order by txn_month"))
        ->pluck('txn_month', 'jumlah');

        $pemerahanrekap = DB::select("SELECT to_date(to_char(date_trunc('month', tanggal), 'DDMMYYYY'),'DDMMYYYY') AS txn_month, sum(jumlah) as jumlah FROM milk GROUP BY txn_month order by txn_month desc");

        $totalpemasukan = Transaction::select(DB::raw("SUM(nominal) as total"))
        ->where('jenis', '=', 1)
        ->pluck('total');

        $totalpengeluaran = Transaction::select(DB::raw("SUM(nominal) as total"))
        ->where('jenis', '=', 0)
        ->pluck('total');

        $totalpemerahan = Milk::select(DB::raw("SUM(jumlah) as total"))
        ->pluck('total');

        $jumlahsapi = Cow::all()->count();
        $jumlahtransaksi = Transaction::all()->count();
        $jumlahpemerahan = Milk::all()->count();

        $labels = $pemasukan->values();
        $labels1 = $pengeluaran->values();
        $data1 = $pemasukan->keys();
        $data2 = $pengeluaran->keys();
        $labels2 = $pemerahan->values();
        $data3 = $pemerahan->keys();

        $exponentialSmoothing = $this->exponentialSmoothing($labels, $data1);
        $exponentialSmoothing2 = $this->exponentialSmoothing($labels1, $data2);
        $exponentialSmoothing3 = $this->exponentialSmoothing($labels2, $data3);

        $forecast = $exponentialSmoothing['result'];
        $forecast2 = $exponentialSmoothing2['result'];
        $forecast3 = $exponentialSmoothing3['result'];
        $last = $exponentialSmoothing['last'];
        $mape = round($exponentialSmoothing['mape']);

        $nMonths = 1;
        $final = $this->endCycle($labels->last(), $nMonths);
        $final1 = $this->endCycle($labels1->last(), $nMonths);
        $final2 = $this->endCycle($labels2->last(), $nMonths);
        $labels->push($final);
        $labels1->push($final1);
        $labels2->push($final2);
        /* $endlabels = end($labels);
        $endlabels->modify('+1 month'); */
        #dd($labels1);
        return view('admin.adminHome', compact('labels', 'data1', 'data2', 'labels1', 'labels2', 'data3', 'jumlahsapi', 'jumlahtransaksi', 'jumlahpemerahan', 'totalpemasukan', 'totalpengeluaran', 'totalpemerahan', 'transaksirekap', 'pemerahanrekap', 'forecast', 'forecast2', 'forecast3'));
    }

    public function dashboardPenjaga()
    {
        $totalpemerahan = Milk::select(DB::raw("SUM(jumlah) as total"))
        ->pluck('total');

        $penjadwalanmissed = DB::select("select COUNT(*) over(), s.* from schedule s where (tanggal < CURRENT_DATE and status = 0)");
        $penjadwalantomorrow = DB::select("select COUNT(*) over(), s.* from schedule s where (tanggal = CURRENT_DATE+1)");
        $penjadwalantoday = DB::select("select COUNT(*) over(), s.* from schedule s where (tanggal = CURRENT_DATE)");

        $jumlahsapi = Cow::all()->count();
        $jumlahpenjadwalan = Schedule::all()->count();
        $jumlahpemerahan = Milk::all()->count();

        return view('penjaga.penjagaHome', compact('jumlahsapi', 'jumlahpenjadwalan', 'jumlahpemerahan', 'totalpemerahan', 'penjadwalanmissed', 'penjadwalantomorrow', 'penjadwalantoday'));
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function penjagaHome()
    {
        return view('penjaga.penjagaHome');
    }

}
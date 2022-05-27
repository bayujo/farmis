<?php
  
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Milk;
use App\Models\Cow;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;
  
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
        $data1 = $pemasukan->keys();
        $data2 = $pengeluaran->keys();
        $labels2 = $pemerahan->values();
        $data3 = $pemerahan->keys();

        return view('admin.adminHome', compact('labels', 'data1', 'data2', 'labels2', 'data3', 'jumlahsapi', 'jumlahtransaksi', 'jumlahpemerahan', 'totalpemasukan', 'totalpengeluaran', 'totalpemerahan', 'transaksirekap', 'pemerahanrekap'));
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
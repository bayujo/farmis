<?php
  
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Milk;
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
    public function dashboard()
    {
        $pemasukan = Transaction::select(DB::raw("to_char(date_trunc('month', tanggal), 'YYYY-Month') as txn_month"), DB::raw("sum(nominal) as pemasukan"))
        ->where('jenis','=', 1)
        ->groupBy('txn_month')
        ->orderBy('txn_month', 'asc')
        ->pluck('txn_month', 'pemasukan');

        $pengeluaran = Transaction::select(DB::raw("to_char(date_trunc('month', tanggal), 'YYYY-Month') as txn_month"), DB::raw("sum(nominal) as pengeluaran"))
        ->where('jenis','=', 0)
        ->groupBy('txn_month')
        ->orderBy('txn_month', 'asc')
        ->pluck('txn_month', 'pengeluaran');

        $pemerahan = Milk::select(DB::raw("to_char(date_trunc('month', tanggal), 'YYYY-Month') as txn_month"), DB::raw("sum(jumlah) as jumlah"))
        ->groupBy('txn_month')
        ->orderBy('txn_month', 'asc')
        ->pluck('txn_month', 'jumlah');

        $labels = $pemasukan->values();
        $data1 = $pemasukan->keys();
        $data2 = $pengeluaran->keys();
        $labels2 = $pemerahan->values();
        $data3 = $pemerahan->keys();

        return view('admin.adminHome', compact('labels', 'data1', 'data2','labels2','data3'));
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
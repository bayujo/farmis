<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdminTransaksi()
    {
        $transaksi = Transaction::latest()->paginate(10);
        return view('admin.adminTransaksi', [
            'transaksi'=>$transaksi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaksi()
    {
        return view('admin.adminTransaksiTambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTransaksi(Request $request)
    {
        $this->validate($request,[
            'jenis' => 'required|max:5',
            'nominal' => 'required|max:30',
            'tanggal' => 'required|before_or_equal:today',
            'keterangan' => 'required|max:255'
        ]);
        
        Transaction::create([
            'jenis' => $request->jenis,
            'nominal' => $request->nominal,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan
        ]);
        Alert::toast('Berhasil menambahkan data transaksi');
        return redirect('/admin/transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function editTransaksi($id)
    {
        $transaksi = Transaction::find($id);
        return view('admin.adminTransaksiEdit', ['transaksi' => $transaksi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function updateTransaksi(Request $request, $id)
    {
        $this->validate($request,[
            'jenis' => 'required|max:5',
            'nominal' => 'required|max:30',
            'tanggal' => 'required|before_or_equal:today',
            'keterangan' => 'required|max:255'
        ]);

        $transaksi = Transaction::find($id);
        $transaksi->jenis = $request->jenis;
        $transaksi->nominal = $request->nominal;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->keterangan = $request->keterangan;
        $transaksi->save();

        Alert::toast('Berhasil mengedit data transaksi');
        return redirect('/admin/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function deleteTransaksi($id)
    {
        Transaction::find($id)->delete();
        
        Alert::toast('Berhasil menghapus data transaksi');
        return redirect('/admin/transaksi');
    }
}

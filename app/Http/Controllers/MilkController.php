<?php

namespace App\Http\Controllers;

use App\Models\Milk;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MilkController extends Controller
{

    public function indexPenjagaMilk()
    {
        $pemerahan = Milk::latest()->paginate(10);
        return view('penjaga.penjagaPemerahan', [
            'pemerahan'=>$pemerahan
        ]);
    }

    public function indexAdminMilk()
    {
        $pemerahan = Milk::latest()->paginate(10);
        return view('admin.adminPemerahan', [
            'pemerahan'=>$pemerahan
        ]);
    }

    public function createMilk()
    {
        $users = User::all();
        $cow = DB::table('cow')->pluck('kode', 'id');
        return view('penjaga.penjagaPemerahanTambah',['cow'=>$cow,'users'=>$users]);
    }

    public function storeMilk(Request $request)
    {
        $this->validate($request,[
            'jumlah' => 'required|integer|max:30',
            'tanggal' => 'required|before_or_equal:today',
            'id_users' => 'required',
            'id_cow' => 'required|max:5',

        ]);
        
        Milk::create([
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'id_users' => $request->id_users,
            'id_cow' => $request->id_cow
        ]);
        Alert::toast('Berhasil menambahkan data pemerahan');
        return redirect('/penjaga/pemerahan');
    }

    public function show(Milk $milk)
    {
        //
    }

    public function editMilk($id)
    {
        $pemerahan = Milk::find($id);
        $cow = DB::table('cow')->pluck('kode', 'id');
        return view('penjaga.penjagaPemerahanEdit', ['pemerahan' => $pemerahan,'cow'=>$cow]);
    }

    public function updateMilk($id, Request $request)
    {
        $this->validate($request,[
            'jumlah' => 'required|integer|max:30',
            'tanggal' => 'required|before_or_equal:today',
            'id_users' => 'required',
            'id_cow' => 'required|max:5',
        ]);
        
        $pemerahan = Milk::find($id);
        $pemerahan->jumlah = $request->jumlah;
        $pemerahan->tanggal = $request->tanggal;
        $pemerahan->id_cow = $request->id_cow;
        $pemerahan->id_users = $request->id_users;
        $pemerahan->save();

        Alert::toast('Berhasil mengedit data pemerahan');
        return redirect('/penjaga/pemerahan');
    }

    public function destroy(Milk $milk)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Schedule;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class ScheduleController extends Controller
{
    public function indexPenjagaSchedule()
    {
        $penjadwalan = Schedule::latest()->paginate(10);
        return view('penjaga.penjagaPenjadwalan', [
            'penjadwalan'=>$penjadwalan
        ]);
    }

    public function indexAdminSchedule()
    {
        $penjadwalan = Schedule::latest()->paginate(10);
        return view('admin.adminPenjadwalan', [
            'penjadwalan'=>$penjadwalan
        ]);
    }

    public function changeStatus(Request $request)
    {
        $penjadwalan = Schedule::find($request->id);
        $penjadwalan->status = $request->status;
        $penjadwalan->save();
    }

    public function createSchedule()
    {
        $users = User::all();
        $cow = DB::table('cow')->pluck('kode', 'id');
        return view('penjaga.penjagaPenjadwalanTambah',['cow'=>$cow,'users'=>$users]);
    }

    public function storeSchedule(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required|max:30',
            'tanggal' => 'required',
            'id_users' => 'required',
            'id_cow' => 'required|max:5',

        ]);
        
        Schedule::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'id_users' => $request->id_users,
            'id_cow' => $request->id_cow
        ]);
        Alert::toast('Berhasil menambahkan data penjadwalan');
        return redirect('/penjaga/penjadwalan');
    }

    public function editSchedule($id)
    {
        $penjadwalan = Schedule::find($id);
        $cow = DB::table('cow')->pluck('kode', 'id');
        return view('penjaga.penjagaPenjadwalanEdit', ['penjadwalan' => $penjadwalan,'cow'=>$cow]);
    }

    public function updateSchedule($id, Request $request)
    {
        $this->validate($request,[
            'judul' => 'required|max:30',
            'tanggal' => 'required',
            'id_users' => 'required',
            'id_cow' => 'required|max:5',
        ]);
        
        $penjadwalan = Schedule::find($id);
        $penjadwalan->judul = $request->judul;
        $penjadwalan->tanggal = $request->tanggal;
        $penjadwalan->id_cow = $request->id_cow;
        $penjadwalan->id_users = $request->id_users;
        $penjadwalan->save();

        Alert::toast('Berhasil mengedit data penjadwalan');
        return redirect('/penjaga/penjadwalan');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Schedule;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class ScheduleController extends Controller
{
    public function indexPenjagaPenjadwalan()
    {
        $penjadwalan = Schedule::all();
        return view('penjaga.penjagaPenjadwalan', [
            'penjadwalan'=>$penjadwalan
        ]);
    }

    public function indexAdminPenjadwalan()
    {
        $penjadwalan = Schedule::all();
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
            'judul' => 'required',
            'tanggal' => 'required',
            'id_users' => 'required',
            'id_cow' => 'required',

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
        $schedule = Schedule::find($id);
        $cow = DB::table('cow')->pluck('kode', 'id');
        return view('penjaga.penjagaPenjadwalanEdit', ['schedule' => $schedule,'cow'=>$cow]);
    }

    public function updateSchedule($id, Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'tanggal' => 'required',
            'id_users' => 'required',
            'id_cow' => 'required',
        ]);
        
        $schedule = Schedule::find($id);
        $schedule->judul = $request->judul;
        $schedule->tanggal = $request->tanggal;
        $schedule->id_cow = $request->id_cow;
        $schedule->id_users = $request->id_users;
        $schedule->save();

        Alert::toast('Berhasil mengedit data penjadwalan');
        return redirect('/penjaga/penjadwalan');
    }
}

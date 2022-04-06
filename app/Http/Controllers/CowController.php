<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Cow;
use Illuminate\Http\Request;

class CowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPenjagaCow()
    {
        $cow = Cow::all();
        return view('penjagaSapi', [
            'cow'=>$cow
        ]);
    }

    public function indexAdminCow()
    {
        $cow = Cow::all();
        return view('adminSapi', [
            'cow'=>$cow
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCow()
    {
        return view('penjagaSapiTambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCow(Request $request)
    {
        $this->validate($request,[
            'kode' => 'required',
            'nama' => 'required',
            'bobot' => 'required',
            'tgl_lahir' => 'required',
        ]);
        
        Cow::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'bobot' => $request->bobot,
            'tgl_lahir' => $request->tgl_lahir
        ]);
        return back()->with('success','berhasil menambahkan data sapi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cow  $cow
     * @return \Illuminate\Http\Response
     */
    public function show(Cow $cow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cow  $cow
     * @return \Illuminate\Http\Response
     */
    public function editCow($id)
    {
        $cow = Cow::find($id);
        return view('penjagaSapiEdit', ['cow' => $cow]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cow  $cow
     * @return \Illuminate\Http\Response
     */
    public function updateCow($id, Request $request)
    {
        $this->validate($request,[
            'kode' => 'required',
            'nama' => 'required',
            'bobot' => 'required',
            'tgl_lahir' => 'required',
        ]);
        
        $cow = Cow::find($id);
        $cow->kode = $request->kode;
        $cow->nama = $request->nama;
        $cow->bobot = $request->bobot;
        $cow->tgl_lahir = $request->tgl_lahir;
        $cow->save();

        return back()->with('success','berhasil mengedit data sapi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cow  $cow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cow $cow)
    {
        $cow->delete();
       
        return redirect()->route('cow.index')
                        ->with('success','Cow deleted successfully');
    }
}

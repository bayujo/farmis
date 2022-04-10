<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdminPenjaga()
    {
        $user = DB::select('select * from users where type = :type', ['type' => 2]);
    	return view('adminPenjaga', [
            'user'=>$user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPenjaga()
    {
        return view('adminPenjagaTambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePenjaga(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);
        
        User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => Hash::make($request->password),
            'no_hp' => $request -> no_hp,
            'alamat' => $request -> alamat
        ]);
        return back()->with('success','berhasil menambahkan data penjaga');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function adminProfile()
    {
        return view('adminProfil');
    }

    public function penjagaProfile()
    {
        return view('penjagaProfil');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editAdminProfil($id)
    {
        $user = User::find($id);
        return view('adminProfilEdit', ['user' => $user]);
    }

    public function editPenjaga($id)
    {
        $user = User::find($id);
        return view('adminPenjagaEdit', ['user' => $user]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updatePenjaga($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->save();

        return back()->with('success','berhasil mengedit data penjaga');
    }
    
    public function updateAdminProfil($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->save();

        return back()->with('success','berhasil mengedit data penjaga');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
       
        return redirect()->route('user.index')
                        ->with('success','User deleted successfully');
    }
}

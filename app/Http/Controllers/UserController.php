<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use RealRashid\SweetAlert\Facades\Alert;

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
    	return view('admin.adminPenjaga', [
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
        return view('admin.adminPenjagaTambah');
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
        Alert::toast('Berhasil menambahkan data penjaga');
        return redirect('/admin/penjaga');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function adminProfile()
    {
        return view('admin.adminProfil');
    }

    public function penjagaProfile()
    {
        return view('penjaga.penjagaProfil');
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
        return view('admin.adminProfilEdit', ['user' => $user]);
    }
    public function editAdminPassword()
    {
        return view('admin.adminEditPassword');
    }

    public function editPenjaga($id)
    {
        $user = User::find($id);
        return view('admin.adminPenjagaEdit', ['user' => $user]);
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
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->save();

        Alert::toast('Berhasil mengedit data penjaga');
        return redirect('/admin/penjaga');
    }
    
    public function updateAdminProfil($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->save();

        Alert::toast('Berhasil mengedit profil');
        return redirect('/admin/profil');
    }
    public function updateAdminPassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        Alert::toast('Berhasil mengubah password');
        return redirect('/admin/profil');
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

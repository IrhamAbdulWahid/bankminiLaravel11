<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function tambahuser()
    {
        return view('user.create');
    }
    public function simpanuser(Request $request)
    {
        $this->validate($request, [
            'ktp' => 'required|numeric|unique:users,ktp',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'hp' => 'required|numeric|unique:users,hp',
            'peran' => 'required'
    ],[
        'ktp.required' => 'KTP harus diisi',
        'ktp.numeric' => 'KTP harus berupa angka',
        'ktp.unique' => 'KTP sudah terdaftar',
        'name.required' => 'Nama harus diisi',
        'email.required' => 'Email harus diisi',
        'email.email' => 'Email tidak valid',
        'email.unique' => 'Email sudah terdaftar',
        'password.required' => 'Password harus diisi',
        'hp.required' => 'Nomor HP harus diisi',
        'hp.numeric' => 'Nomor HP harus berupa angka',
        'hp.unique' => 'Nomor HP sudah terdaftar',
        'peran.required' => 'Peran harus diisi',
    ]);
    $simpan = new User();
    $simpan->ktp = $request->ktp;
    $simpan->name = $request->name;
    $simpan->email = $request->email;
    $simpan->password = bcrypt($request->password);
    $simpan->hp = $request->hp;
    $simpan->peran = $request->peran;
    $simpan->save();
    return redirect()->route('users.index');
    }
    public function edituser($id)
    {
        $edit = User::find($id);
        return view('user.edit', compact('edit'));
    }
    public function updateuser(Request $request, $id)
    {
        $this->validate($request, [
            'ktp' => 'required|numeric|unique:users,ktp,'.$id,
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'hp' => 'required|numeric|unique:users,hp,'.$id,
            'peran' => 'required'
    ],[
        'ktp.required' => 'KTP harus diisi',
        'ktp.numeric' => 'KTP harus berupa angka',
        'ktp.unique' => 'KTP sudah terdaftar',
        'name.required' => 'Nama harus diisi',
        'email.required' => 'Email harus diisi',
        'email.email' => 'Email tidak valid',
        'email.unique' => 'Email sudah terdaftar',
        
        'hp.required' => 'Nomor HP harus diisi',
        'hp.numeric' => 'Nomor HP harus berupa angka',
        'hp.unique' => 'Nomor HP sudah terdaftar',
        'peran.required' => 'Peran harus diisi',
    ]);
        $simpan = user::find($id);
        $simpan->ktp = $request->ktp;
        $simpan->name = $request->name;
        $simpan->email = $request->email;
        if($request->password != null){
            $simpan->password = bcrypt($request->password);
        }
        $simpan->hp = $request->hp;
        $simpan->peran = $request->peran;
        $simpan->save();
        return redirect()->route('users.index');
    }
    public function hapususer($id)
    {
        $hapus = User::find($id);
        $hapus->delete();
        return redirect()->route('users.index');
    }
}

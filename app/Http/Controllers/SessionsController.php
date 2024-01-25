<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionsController extends Controller
{
    function index ()
    {
        return view("sesi/index");
    }
    function login (Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ], [
            'email.required'=>'email wajib di isi',
            'password.required'=>'password wajib di isi'
        ]);

        // dd($request->all());

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            //kalo auth sukses
            return redirect('mhs')->with('succes','Berhasil Login');
        }else {
            //kalo auth gagal
            return redirect('sesi')->withErrors('Username dan Password Salah');
        }

    }
    
    function logout ()
    {
        Auth::logout();
        return redirect('sesi')->with('succes','Berhasil Logout');
    }

    function register ()
    {
        return view('/sesi/register');
    }

    function create (Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);

        
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required'],
            'password' => ['required','min:6']
        ], [
            'name.required'=>'Nama wajib di isi',
            'email.required'=>'email wajib di isi',
            'email.email'=>'email tidak valid',
            'email.unique'=>'email sudah digunakan',
            'password.required'=>'password wajib di isi',
            'password.min'=>'password harus lebih dari 6 karakter'
        ]);

        $data =([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make($request->password),
        ]);
        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            //kalo auth sukses
            return redirect('mhs')->with('succes', Auth::user()->name, 'Berhasil Dibuat');
        }else {
            //kalo auth gagal
            return redirect('sesi')->withErrors('Username dan Password Salah');
        }
    }
    public function show(string $id)
    {
        $data = User::where('id', $id)->first();
        return view('/sesi/user')->with('data', $data);
    }

}

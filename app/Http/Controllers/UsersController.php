<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all();
        return view('/sesi/user')->with('data', $data);
    }
    
}

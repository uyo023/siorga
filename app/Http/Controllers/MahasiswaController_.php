<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    function index (){
        // $data = Mahasiswa::all();
        // return $data;
        $data = Mahasiswa::OrderBy('nama', 'asc')->paginate(1);
        return view('admin/menus/mhs')->with('data', $data);
    }
    function detail_id ($id){
        // return "Saya mahasiswa dari kontroller dengan id $id";
        $data = Mahasiswa::where('npm', $id)->first();
        return view('admin/menus/show_mhs')->with('data', $data);
    }
    function detail_nama ($id, $nama){
        return "Saya mahasiswa dari kontroller dengan id $id dan Nama $nama";
    }
}

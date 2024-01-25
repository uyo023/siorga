<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Mahasiswa::OrderBy('updated_at', 'asc')->paginate(10);
        $data = Mahasiswa::OrderBy('updated_at', 'desc')->paginate(10);
        return view('admin/menus/mhs')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/menus/create_mhs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat isian tidak ilang, dibarengi pada blade dengan value
        Session::flash('npm', $request->npm);
        Session::flash('nama', $request->nama);
        Session::flash('fakultas', $request->fakultas);
        Session::flash('jurusan', $request->jurusan);
        Session::flash('kelas', $request->kelas);
        Session::flash('alamat', $request->alamat);

        // dd($request->all());

        $request->validate([
            'npm' => ['required', 'numeric','unique:mahasiswa,npm'],
            'nama' => ['required', 'max:100'],
            'fakultas' => ['required'],
            'jurusan' => ['required'],
            'kelas' => ['required'],
            'alamat' => ['required'],
            'foto' => ['required','mimes:jpeg,jpg,png,gif']
        ], [
            'npm.unique'=>'NPM yang Anda Masukan Sudah Digunakan, Silahkan Gunakan NPM yang Belum Terdaftar',
            'npm.required'=>'NPM Wajid Diisi',
            'npm.numeric'=>'NPM Wajid Diisi dengan angka',
            'npm.max'=>'NPM yang anda masukan terlalu banyak',
            'nama.required'=>'Nama Wajid Diisi',
            'nama.max'=>'Nama Wajid Diisi Dengan Benar',
            'fakultas.required'=>'Fakultas Wajid Diisi',
            'jurusan.required'=>'Jurusan Wajid Diisi',
            'kelas.required'=>'Kelas Wajid Diisi',
            'alamat.required'=>'Alamat Wajid Diisi',
            'foto.required'=>'Silahkan Masukan Foto',
            'foto.extensions'=>'Hanya Ekstensi : jpeg,jpg,png,gif'
        ]);

        // return 'Good!';
        
        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = $request->npm. "." .$foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);
        $data =([
            'npm' => request('npm'),
            'nama' => request('nama'),
            'fakultas' => request('fakultas'),
            'jurusan' => request('jurusan'),
            'kelas' => request('kelas'),
            'alamat' => request('alamat'),
            'foto' => $foto_nama
        ]);

        // dd($foto_nama);

        Mahasiswa::create( $data );
        return redirect('/mhs')->with('succes','Berhasil Memasukan Data Mahasiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Mahasiswa::where('npm', $id)->first();
        return view('admin/menus/show_mhs')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Mahasiswa::where('npm', $id)->first();
        // $data = Mahasiswa::where('npm', $id)->first();
        // return $data;
        return view ('admin/menus/edit_mhs')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => ['required', 'max:100'],
            'fakultas' => ['required'],
            'jurusan' => ['required'],
            'kelas' => ['required'],
            'alamat' => ['required'],
        ], [
            'nama.required'=>'Nama Wajid Diisi',
            'nama.max'=>'Nama Wajid Diisi Dengan Benar',
            'fakultas.required'=>'Fakultas Wajid Diisi',
            'jurusan.required'=>'Jurusan Wajid Diisi',
            'kelas.required'=>'Kelas Wajid Diisi',
            'alamat.required'=>'Alamat Wajid Diisi'
        ]);

        // return 'Good!';
        $data =([
            'nama' => request('nama'),
            'fakultas' => request('fakultas'),
            'jurusan' => request('jurusan'),
            'kelas' => request('kelas'),
            'alamat' => request('alamat'),
        ]);
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'mimes:jpeg,jpg,png,gif'
            ],[
                'foto.mimes'=>'Hanya Ekstensi : jpeg,jpg,png,gif'
            ]);
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = $request->npm. "." .$foto_ekstensi;
            $foto_file->move(public_path('foto'), $foto_nama);

            $data_foto = Mahasiswa::where('npm',$id)->first();
            File::delete(public_path('foto').'/'.$data_foto->foto);

            $data =([
                'nama' => request('nama'),
                'fakultas' => request('fakultas'),
                'jurusan' => request('jurusan'),
                'kelas' => request('kelas'),
                'alamat' => request('alamat'),
                'Foto' => $foto_nama
            ]);
            // $data = ['foto'] = $foto_nama;
        }
        Mahasiswa::where('npm', $id)->update($data);
        return redirect('/mhs')->with('succes','Berhasil Mengupdate Data Mahasiswa');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Mahasiswa::where('npm', $id)->first();
        File::delete(public_path('foto').'/'.$data->foto);
        Mahasiswa::where('npm', $id)->delete();
        return redirect('/mhs')->with('succes','Berhasil Menghapus Data Mahasiswa');
    }
}

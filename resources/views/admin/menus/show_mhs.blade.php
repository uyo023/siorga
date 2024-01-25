@extends('admin.layouts.index')
 
@section('container')



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      <a class="btn btn-secondary btn-sm" href="/mhs">Kembali</a>
      <a class="btn btn-warning btn-sm" href="{{ url('mhs/'. $data->npm). '/edit' }}">Edit</a>
      <div class="image">
        @if ($data->foto)
        <img style="max-width: 100px; max-height: 100px" src="{{ url('foto').'/'.$data->foto }}" class="img-circle elevation-2" alt="User Image">
        @endif
        </div>
      <div>Nama Mahasiswa {{ $data->nama }}</div>
        <p>
          <strong>Nomor Pokok Mahasiswa : {{ $data->npm }}</strong>
        </p>
        <p>
          <strong>Alamat Mahasiswa : {{ $data->alamat }}</strong>
        </p>
        <!-- /.row (main row) -->
     


@endsection





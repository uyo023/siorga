@extends('admin.layouts.index')
 
@section('container')


<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Update Data</h3>
          </div>
          <!-- /.card-header -->

          <!-- form start -->
          <form method="POST" action="{{ '/mhs/'. $data->npm }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">

              <div class="form-group">
                <label>Nomor Pokok Mahasiswa</label>
                <input type="text" name="npm" class="form-control" placeholder="{{ $data->npm }}" value="{{ $data->npm }}" disabled>
              </div>

              <div class="form-group">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama" class="form-control" placeholder="{{ $data->nama }}" value="{{ $data->nama }}">
              </div>

              <div class="form-group">
                <label>Fakultas</label>
                <input type="text" name="fakultas" class="form-control" placeholder="{{ $data->fakultas }}" value="{{ $data->fakultas }}">
              </div>

              <div class="form-group">
                <label">Program Study</label>
                <input type="text" name="jurusan" class="form-control" placeholder="{{ $data->jurusan }}" value="{{ $data->jurusan }}">
              </div>

              <div class="form-group">
                <label>Kelas</label>
                <input type="text" name="kelas" class="form-control" placeholder="{{ $data->kelas }}" value="{{ $data->kelas }}">
              </div>

              <div class="form-group">
                <label>Alamat</label>
               <textarea name="alamat" class="form-control">{{ $data->alamat }}</textarea>
              </div>
              @if ($data->foto)
              <div class="mb3">
                <img style="max-width: 50px; max-height: 50px" src="{{ url('foto').'/'.$data->foto }}">
              </div>
                          
               @endif
              <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control" placeholder="foto">
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a class="btn btn-secondary btn-sm" href="/mhs">Kembali</a>
              <button type="submit" class="btn btn-warning btn-sm">Update</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
        </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">

      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>


@endsection





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
            <h3 class="card-title">Masukan Data</h3>
          </div>
          <!-- /.card-header -->

          <!-- form start -->
          <form method="POST" action="/mhs" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

              <div class="form-group">
                <label>Nomor Pokok Mahasiswa</label>
                <input type="text" name="npm" class="form-control" placeholder="Masukan Nomor Pokok Mahasiswa" value="{{ Session::get('npm') }}">
              </div>

              <div class="form-group">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Mahasiswa" value="{{ Session::get('nama') }}">
              </div>

              <div class="form-group">
                <label>Fakultas</label>
                <input type="text" name="fakultas" class="form-control" placeholder="Masukan Fakultas" value="{{ Session::get('fakultas') }}">
              </div>

              <div class="form-group">
                <label">Program Study</label>
                <input type="text" name="jurusan" class="form-control" placeholder="Masukan Prodi" value="{{ Session::get('jurusan') }}">
              </div>

              <div class="form-group">
                <label>Kelas</label>
                <input type="text" name="kelas" class="form-control" placeholder="Kelas" value="{{ Session::get('kelas') }}">
              </div>

              <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ Session::get('alamat') }}</textarea>
              </div>

              <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control" placeholder="foto">
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
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





@extends('admin.layouts.index')
 
@section('container')
       
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <a class="btn btn-primary" href="/mhs/create">+ Tambah Data </a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                      <thead>
                      <tr role="row">
                        <th class="sorting sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">Foto</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NPM</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nama</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Fakultas(s)</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Jurusan</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Kelas</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Alamat</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                      </tr>
                      </thead>
                      <tbody>                      
                        @foreach ($data as $item)
                      <tr class="odd">
                        <td class="sorting_1 dtr-control">
                          @if ($item->foto)
                          <img style="max-width: 50px; max-height: 50px" src="{{ url('foto').'/'.$item->foto }}">
                          
                          @endif
                        </td>
                        <td>{{ $item->npm }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->fakultas }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                        <a class="btn btn-secondary btn-sm" href="{{ url('mhs/'. $item->npm) }}">Detail</a>
                        <a class="btn btn-warning btn-sm" href="{{ url('mhs/'. $item->npm). '/edit' }}">Edit</a>
                        <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data {{ $item->nama }}')" class="b-inline" action="{{ url('mhs/'. $item->npm) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                        </td> 
                      </tr>
                      @endforeach
                     
                    </tbody>
                      <tfoot>
                      <tr>
                        <th rowspan="1" colspan="1">Foto</th>
                        <th rowspan="1" colspan="1">NPM</th>
                        <th rowspan="1" colspan="1">Nama</th>
                        <th rowspan="1" colspan="1">Fakultas(s)</th>
                        <th rowspan="1" colspan="1">Jurusan</th>
                        <th rowspan="1" colspan="1">Kelas</th>
                        <th rowspan="1" colspan="1">Alamat</th>
                        <th rowspan="1" colspan="1">Status</th>
                      </tr>
                      </tfoot>
                    </table>
                    {{ $data->links() }}
                  </div>
                </div>
                <div class="col-sm-12 col-md-7">
                  <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination">
                    
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
    
                
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.row (main row) -->
     


@endsection





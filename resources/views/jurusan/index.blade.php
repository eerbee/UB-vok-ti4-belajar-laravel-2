@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Jurusan</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline" action="{{ route('jurusan.index')}}">
              <div class="form-group">
                <input style="width: 400px;" type="text" name="src" class="form-control" placeholder="Search" value="{{ request()->get('src') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-search"></i> &nbsp; Search
                </button>
              </div>
            </form>
            <a href="{{ route('jurusan.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-header">
            <button type="button" data-toggle="modal" data-target="#addData" class="btn btn-success">
              <i class="fa fa-plus"></i> Tambah Jurusan
            </button>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" width="10%"><center>#</center></th>
                  <th scope="col">Nama Jurusan</th>
                  <th scope="col">Nama Fakultas</th>
                  <th scope="col"><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
               @forelse($jurusans as $jurusan => $jrsn)
                <tr>
                  <td align="center">{{ $jurusans->firstItem() + $jurusan }}</td>
                  <td>{{ $jrsn->tjurusan_nama }}</td>
                  <td>{{ $jrsn->tfakultas_nama }}</td>
                  <td align="center">
                    <button type="button" data-toggle="modal" data-target="#editData{{$jrsn->tjurusan_id}}" class="btn btn-info btn-sm">
                       EDIT
                    </button>
                    <button type="button" data-toggle="modal" data-target="#deleteData{{$jrsn->tjurusan_id}}" class="btn btn-danger btn-sm">
                       DELETE
                    </button>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="3"><center>Data Tidak Ditemukan</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            {!! $jurusans->links() !!}
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              
            </nav>
          </div>
        </div>
      </div>  
  </div>
</section>
<!-- Modal ADD -->
  <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addData" aria-hidden="true" >
    <div class="modal-dialog" role="document">
      <div class="modal-content"> 
        <form action="{{ route('jurusan.store') }}" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="DataLabel"><i class="far fa-plus-square"></i>&nbsp; Tambah Data Jurusan</h5>
          </div>
          <hr>
          <div class="modal-body">
            {{csrf_field()}}
            <div class="form-group">
              <label for="inputNamaJurusan">
                Nama Jurusan <i style="color: red;">*</i>
              </label>
              <input name="tjurusan_nama" type="text" class="form-control" id="inputNamaJurusan" placeholder="Masukkan Nama Jurusan" required="">
              <label for="inputNamaFakultas">
                Nama Fakultas<i style="color: red;">*</i>
              </label>
              <select class="form-control" name="tjurusan_fakultas" required="">
                @foreach( $fakultass as $fakultas)
                  <option value="{{ $fakultas->tfakultas_id }}">
                    {{ $fakultas->tfakultas_nama }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Tambahkan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- End of Modal Add -->  

<!-- Modal Edit -->
  @foreach($jurusans as $jrsn)
    <div class="modal fade" id="editData{{$jrsn->tjurusan_id}}" tabindex="-1" role="dialog" aria-labelledby="deleteData" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content"> 
          <form action="{{ route('jurusan.update', $jrsn->tjurusan_id) }}" method="post">
            <div class="modal-header">
              <h5 class="modal-title" id="DataLabel"><i class="far fa-edit"></i> &nbsp; Edit Data Jurusan</h5>
            </div>
            <hr>
            <div class="modal-body">
              @csrf 
              @method('PATCH')
              <div class="form-group">
                <label>Nama Jurusan</label>
                <input type="text" name="tjurusan_nama" class="form-control" value="{{ $jrsn->tjurusan_nama }}" required="">
                <label for="inputFakultas">Nama Fakultas</label>
                  <select class="form-control" name="tjurusan_fakultas" required="">
                    @foreach( $fakultass as $fakultas )
                      <option value="{{ $fakultas->tfakultas_id }}" {{ $fakultas->tfakultas_id == $jrsn->tjurusan_fakultas ? 'selected="selected"' : '' }}> 
                        {{ $fakultas->tfakultas_nama }} 
                      </option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="modal-footer">\
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-warning"><b>Save</b></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endforeach
<!-- End of Modal Edit--> 

<!-- Modal DELETE -->
  @foreach($jurusans as $jrsn)
    <div class="modal fade" id="deleteData{{$jrsn->tjurusan_id}}" tabindex="-1" role="dialog" aria-labelledby="deleteData" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content"> 
          <form action="{{route('jurusan.destroy', $jrsn->tjurusan_id)}}" method="post">
            <div class="modal-header">
              <h5 class="modal-title" id="DataLabel"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> &nbsp; Konfirmasi Hapus</h5>
            </div>
            <hr>
            <div class="modal-body">
              <div class="form-group">
                <h5>
                  <br>
                  Hapus <b>{{$jrsn->tjurusan_nama}}</b> ? 
                </h5>
              </div>
            </div>
            <div class="modal-footer">\
              @csrf
              @method('DELETE')
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endforeach
<!-- End of Modal DELETE--> 
@endsection()

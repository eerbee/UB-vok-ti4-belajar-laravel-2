@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Fakultas</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline" action="{{ route('fakultas.index')}}">
              <div class="form-group">
                <input style="width: 400px;" type="text" name="src" class="form-control" placeholder="Search" value="{{ request()->get('src') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-search"></i> &nbsp; Search
                </button>
              </div>
            </form>
            <a href="{{ route('fakultas.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data Fakultas</button>
            </a>
          </div>
          <div class="card-header">
            <button type="button" data-toggle="modal" data-target="#addData" class="btn btn-success">
              <i class="fa fa-plus"></i> Tambah Fakultas
            </button>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" width="10%"><center>#</center></th>
                  <th scope="col">Nama Fakultas</th>
                  <th scope="col"><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
               @forelse($fakultass as $fakultas => $fklts)
                <tr>
                  <td align="center">{{ $fakultass->firstItem() + $fakultas }}</td>
                  <td>{{ $fklts->tfakultas_nama }}</td>
                  <td align="center">
                    <button type="button" data-toggle="modal" data-target="#editData{{$fklts->tfakultas_id}}" class="btn btn-info btn-sm">
                       EDIT
                    </button>
                    <button type="button" data-toggle="modal" data-target="#deleteData{{$fklts->tfakultas_id}}" class="btn btn-danger btn-sm">
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
            {!! $fakultass->links() !!}
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
          <form action="{{ route('fakultas.store') }}" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="DataLabel"><i class="far fa-plus-square"></i>&nbsp; Tambah Data Fakultas</h5>
            </div>
            <hr>
            <div class="modal-body">
              {{csrf_field()}}
              <div class="form-group">
                <label for="inputNamaFakultas">
                  Nama Fakultas <i style="color: red;">*</i>
                </label>
                <input name="tfakultas_nama" type="text" class="form-control" id="inputNamaFakultas" placeholder="Masukkan Nama Fakultas" required="">
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

  <!-- Modal DELETE -->
  @foreach($fakultass as $fklts)
    <div class="modal fade" id="deleteData{{$fklts->tfakultas_id}}" tabindex="-1" role="dialog" aria-labelledby="deleteData" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content"> 
          <form action="{{route('fakultas.destroy', $fklts->tfakultas_id)}}" method="post">
            <div class="modal-header">
              <h5 class="modal-title" id="DataLabel"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> &nbsp; Konfirmasi Hapus</h5>
            </div>
            <hr>
            <div class="modal-body">
              <div class="form-group">
                <h5>
                  <br>
                  Hapus <b>{{$fklts->tfakultas_nama}}</b> ? 
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

  <!-- Modal Edit -->
  @foreach($fakultass as $fklts)
    <div class="modal fade" id="editData{{$fklts->tfakultas_id}}" tabindex="-1" role="dialog" aria-labelledby="deleteData" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content"> 
          <form action="{{ route('fakultas.update', $fklts->tfakultas_id) }}" method="post">
            <div class="modal-header">
              <h5 class="modal-title" id="DataLabel"><i class="far fa-edit"></i> &nbsp; Edit Data Fakultas</h5>
            </div>
            <hr>
            <div class="modal-body">
              @csrf 
              @method('PATCH')
              <div class="form-group">
                <label>Nama Fakultas</label>
                <input type="text" name="tfakultas_nama" class="form-control" value="{{ $fklts->tfakultas_nama }}" required="">
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
@endsection()

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
          &nbsp;
          <a href="{{ url('/export_excel') }}" class="pull-right">
            <button type="button" class="btn btn-info">All Data Jurusan</button>
          </a>
          &nbsp;
          <form action="/export_excel_jurusan" method="get">
              <button type="submit" class="btn btn-success">
                <i class="fas fa-file-excel"></i> &nbsp; Export Excel
              </button>
          </form>
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
                <td colspan="4"><center>Data Tidak Ditemukan</center></td>
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
  <div class="modal fade" id="addData" role="dialog" aria-labelledby="addData" aria-hidden="true">
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
              <label for="inputNamaJurusan" style="font-weight: bold;">
                Nama Jurusan<i style="color: red;">*</i>
              </label>
              <input name="tjurusan_nama" type="text" class="form-control" id="inputNamaJurusan" placeholder="Masukkan Nama Jurusan" required="" style="font-weight: bold;">

              <label for="inputNamaFakultas" style="margin-top: 10px; font-weight: bold;">
                Pilih Fakultas<i style="color: red;">*</i>
              </label>
              <select class="itemNameAdd form-control" style="width:450px;" name="tjurusan_fakultas" required=""></select>
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
  <script type="text/javascript">
      $('.itemNameAdd').select2({
        placeholder: 'Select Fakultas',
        ajax: {
          url: '/src_jurusan',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.tfakultas_nama,
                        id: item.tfakultas_id
                    }
                })
            };
          },
          cache: true
        }
      });
  </script>
<!-- End of Modal Add -->  

<!-- Modal Edit -->
  @foreach($jurusans as $jrsn)
    <div class="modal fade" id="editData{{$jrsn->tjurusan_id}}" role="dialog" aria-labelledby="deleteData" aria-hidden="true" >
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
                <label style="font-weight: bold;">Nama Jurusan<i style="color: red;">*</i></label>
                <input type="text" name="tjurusan_nama" class="form-control" value="{{ $jrsn->tjurusan_nama }}" required="" style="font-weight: bold;">

                <label for="inputFakultasBaru" style="margin-top: 10px; font-weight: bold;">
                  Pilihan Fakultas <i style="color: red;">*</i>
                </label>
                <select class="itemNameEdit form-control" style="width:450px; " name="tjurusan_fakultas" >
                  @foreach($fakultass as $fakultas)
                    <option value="{{ $fakultas->tfakultas_id }}" {{ $fakultas->tfakultas_id == $jrsn->tjurusan_fakultas ? 'selected="selected"' : '' }} > {{$fakultas->tfakultas_nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">
                Batal
              </button>
              <button type="submit" class="btn btn-warning">
                <b>Save</b>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endforeach
  <script type="text/javascript">
      $('.itemNameEdit').select2({
        placeholder: 'Select Fakultas Baru',
        ajax: {
          url: '/src_jurusan',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.tfakultas_nama,
                        id: item.tfakultas_id
                    }
                })
            };
          },
          cache: true
        }
      });
  </script>
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
                    Hapus <b>{{$jrsn->tjurusan_nama}} - {{ $jrsn->tfakultas_nama }}</b> ? 
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
@stop

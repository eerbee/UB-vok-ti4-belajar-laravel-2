@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Barang</h1>
  </div>

  @if ($message = Session::get('success'))
    <div class="card">
        <div class="card-body">
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
        </div>
    </div>
  @endif

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline" action="{{ route('barang.index')}}">
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
            <a href="{{ route('barang.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data Barang</button>
            </a>
            &nbsp;
            <form action="/export_excel_barang" method="get">
                <button type="submit" class="btn btn-success">
                  <i class="fas fa-file-excel"></i> &nbsp; Export Excel
                </button>
            </form>
          </div>
          @if(auth()->user()->role == 'admin')
            <div class="card-header">
              <button type="button" data-toggle="modal" data-target="#addData" class="btn btn-success">
                <i class="fa fa-plus"></i> Tambah Barang
              </button>
            </div>
          @endif
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" width="4%"><center>#</center></th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col" width="2%"><center>Total Barang</center></th>
                  <th scope="col" width="2%"><center>Barang Rusak</center></th>
                  <th scope="col">Ruangan</th>
                  <th scope="col" width="4%"><center>Created By</center></th>
                  <th scope="col" width="4%"><center>Updated By</center></th>
                  <th scope="col" width="17%"><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
                @forelse($barangs as $barang => $brg)
                <tr>
                  <td align="center">{{ $barangs->firstItem() + $barang  }}</td>
                  <td>{{ $brg->tbarang_nama }}</td>
                  <td align="center">{{ $brg->tbarang_total }}</td>
                  <td align="center">{{ $brg->tbarang_broken }}</td>
                  <td>{{ $brg->truangan_nama }}</td>
                  <td>
                    @foreach($user as $u)
                      @if($u->id == $brg->tbarang_created_by)
                        {{ $u->name }}
                      @endif
                    @endforeach
                  </td>
                  <td>
                    @foreach($user as $u)
                      @if($u->id == $brg->tbarang_updated_by)
                        {{ $u->name }}
                      @endif
                    @endforeach
                  </td>
                  <td align="center">
                    <div class="btn-group">
                      <button type="button" data-toggle="modal" data-target="#detailData{{$brg->tbarang_id}}" class="btn btn-info btn-sm">
                         <i class="fas fa-eye"></i>
                      </button>
                      <button type="button" data-toggle="modal" data-target="#editData{{$brg->tbarang_id}}" class="btn btn-warning btn-sm">
                         <i class="fas fa-pen"></i>
                      </button>
                      @if(auth()->user()->role == 'admin')
                        <button type="button" data-toggle="modal" data-target="#deleteData{{$brg->tbarang_id}}" class="btn btn-danger btn-sm">
                           <i class="fas fa-trash"></i>
                        </button>
                      @endif
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4"><center>Data Tidak Ditemukan</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            {!! $barangs->links() !!}        
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              
            </nav>
          </div>
        </div>
      </div>  
  </div>
  @if($errors->any())
    <script>
        $( document ).ready(function() {
            $('#errorModal').modal('show');
        });
    </script>
  @endif
</section>
<!-- Modal ADD -->
  <div class="modal fade" id="addData" role="dialog" aria-labelledby="addData" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content"> 
        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title" id="DataLabel"><i class="far fa-plus-square"></i>&nbsp; Tambah Data Barang</h5>
          </div>
          <hr>
          <div class="modal-body">
            {{csrf_field()}}
            <div class="form-group">
              <label for="inputNamaBarang" style="font-weight: bold;">
                Nama Barang<i style="color: red;">*</i>
              </label>
              <input name="tbarang_nama" type="text" class="form-control" id="inputNamaJurusan" placeholder="Masukkan Nama Barang" required="" style="font-weight: bold;">

              <label for="inputTotalBarang" style="font-weight: bold;">
                Barang Total<i style="color: red;">*</i>
              </label>
              <input name="total_barang" type="text" class="form-control" id="inputNamaJurusan" placeholder="Masukkan Total Barang" required="" style="font-weight: bold;">

              <label for="inputRusakBarang" style="font-weight: bold;">
                Barang Rusak<i style="color: red;">*</i>
              </label>
              <input name="barang_broken" type="text" class="form-control" id="inputNamaJurusan" placeholder="Masukkan Jumlah Barang Rusak" required="" style="font-weight: bold;">

              <input type="hidden" name="tbarang_created_by" value="{{auth()->user()->id}}" class="form-control">

              <label for="inputNamaRuangan" style="margin-top: 10px; font-weight: bold;">
                Pilih Ruangan<i style="color: red;">*</i>
              </label>
              <select class="itemNameAdd form-control" style="width:450px;" name="tbarang_ruangan" required=""></select>

              <label style="margin-top: 10px;" for="inputGambarBarang">Gambar Barang <i style="color: red;">*</i></label>
              <input type="file" class="form-control" name="gambar_barang" class="btn btn-primary btn-sm" value="Add" style="padding-bottom: 1cm;" required="">
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
        placeholder: 'Select Ruangan Baru',
        ajax: {
          url: '/src_barang',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.truangan_nama,
                        id: item.truangan_id
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
  @foreach($barangs as $brg)
    <div class="modal fade" id="editData{{$brg->tbarang_id}}" role="dialog" aria-labelledby="deleteData" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content"> 
          <form action="{{ route('barang.update', $brg->tbarang_id) }}" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="DataLabel"><i class="far fa-edit"></i> &nbsp; Edit Data Barang</h5>
            </div>
            <hr>
            <div class="modal-body">
              @csrf 
              @method('PATCH')
              <div class="form-group">
                <label style="font-weight: bold;">
                  Nama Barang<i style="color: red;">*</i>
                </label>
                <input type="text" name="tbarang_nama" class="form-control" value="{{ $brg->tbarang_nama }}" required="" style="font-weight: bold;">

                <label style="font-weight: bold;">
                  Total Barang<i style="color: red;">*</i>
                </label>
                <input type="text" name="total_barang" class="form-control" value="{{ $brg->tbarang_total }}" required="" style="font-weight: bold;">

                <label style="font-weight: bold;">
                  Barang Rusak<i style="color: red;">*</i>
                </label>
                <input type="text" name="barang_broken" class="form-control" value="{{ $brg->tbarang_broken}}" required="" style="font-weight: bold;">

                <label for="inputRuanganBaru" style="margin-top: 10px; font-weight: bold;">
                  Pilihan Ruangan <i style="color: red;">*</i>
                </label>
                <select class="itemNameEdit form-control" style="width:450px;" name="tbarang_ruangan" required="">
                  @foreach($ruangans as $ruangan)
                    <option value="{{ $ruangan->truangan_id }}" {{ $ruangan->truangan_id == $brg->tbarang_ruangan ? 'selected="selected"' : '' }} > {{$ruangan->truangan_nama}}</option>
                  @endforeach
                </select>

                <label style="margin-top: 10px;" for="inputGambarBarang">Gambar Barang <i style="color: red;">*</i></label>
                <input type="file" class="form-control" name="gambar_barang" class="btn btn-primary btn-sm" value="Add" style="padding-bottom: 1cm;">
                <img src="{{ URL::to('/')}}/images/barang/{{ $brg->tbarang_gambar }}" class="img-thumbnail" width="150"/>
                <input type="hidden" name="hidden_image" value="{{ $brg->tbarang_gambar }}">

                <input type="hidden" name="tbarang_created_by" value="{{ $brg->tbarang_created_by }}" class="form-control">

                <input type="hidden" name="tbarang_updated_by" value="{{auth()->user()->id}}" class="form-control">
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
        placeholder: 'Select Ruangan Baru',
        ajax: {
          url: '/src_barang',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.truangan_nama,
                        id: item.truangan_id
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
  @foreach($barangs as $brg)
    <div class="modal fade" id="deleteData{{$brg->tbarang_id}}" tabindex="-1" role="dialog" aria-labelledby="deleteData" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content"> 
          <form action="{{route('barang.destroy', $brg->tbarang_id)}}" method="post">
            <div class="modal-header">
              <h5 class="modal-title" id="DataLabel"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> &nbsp; Konfirmasi Hapus</h5>
            </div>
            <hr>
            <div class="modal-body">
              <div class="form-group">
                <h5>
                  <br>
                    Hapus <b>{{$brg->tbarang_nama}} - {{ $brg->truangan_nama }}</b> ? 
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

<!-- Modal DETAIL -->
  @foreach($barangs as $brg)
    <div class="modal fade" id="detailData{{$brg->tbarang_id}}" tabindex="-1" role="dialog" aria-labelledby="detailData" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content"> 
          <div class="modal-header">
            <h5 class="modal-title" id="DataLabel"><i class="fa fa-image" aria-hidden="true"></i> &nbsp; Detail Barang </h5>
          </div>
          <div class="modal-body">
            <div class="form-group" align="center">
                <img src="{{ URL::to('/') }}/images/barang/{{ $brg->tbarang_gambar }}" class="img-thumbnail" width="250" />
                <br><br>
                <h5>
                  <b>{{$brg->tbarang_nama}} - {{ $brg->truangan_nama }}</b>
                </h5>
            </div>
          </div>
          <div class="modal-footer">\
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          </div>
        </div>
      </div>
    </div>
  @endforeach
<!-- End of Modal DELETE-->

<!-- Modal Error Add -->
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="deleteData" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content"> 
            <div class="modal-header">
              <h5 class="modal-title" id="DataLabel"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> &nbsp; Error </h5>
            </div>
            <hr>
            <div class="modal-body">
              <div class="alert alert-danger m-t-25">
                <ul>
                  @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="modal-footer">\
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <!-- <button id="toAddModal" type="button" data-toggle="modal" class="btn btn-warning">Coba Lagi</button> -->
            </div>
        </div>
      </div>
      <!-- <script type="text/javascript">
        $("#toAddModal").click(function() 
        {
          $("#errorAdd").modal('hide');
          $("#addData").modal('show');
        });
      </script> -->
    </div>
<!-- End of Modal Error Add --> 
@stop

@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Barang</h1>
  </div>

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
            <a href="{{ route('barang.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
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
                  <th scope="col"><center>Aksi</center></th>
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
                  <td>{{ $brg->tbarang_created_by }}</td>
                  <td>{{ $brg->tbarang_updated_by }}</td>
                  <td align="center">
                    <button type="button" data-toggle="modal" data-target="#editData{{$brg->tbarang_id}}" class="btn btn-info btn-sm">
                       EDIT
                    </button>
                    @if(auth()->user()->role == 'admin')
                      <button type="button" data-toggle="modal" data-target="#deleteData{{$brg->tbarang_id}}" class="btn btn-danger btn-sm">
                         DELETE
                      </button>
                    @endif
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
</section>
<!-- Modal ADD -->
  <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addData" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content"> 
        <form action="{{ route('barang.store') }}" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="DataLabel"><i class="far fa-plus-square"></i>&nbsp; Tambah Data Barang</h5>
          </div>
          <hr>
          <div class="modal-body">
            {{csrf_field()}}
            <div class="form-group">
              <label for="inputNamaJurusan" style="font-weight: bold;">
                Nama Barang<i style="color: red;">*</i>
              </label>
              <input name="tbarang_nama" type="text" class="form-control" id="inputNamaJurusan" placeholder="Masukkan Nama Barang" required="" style="font-weight: bold;">

              <label for="inputNamaJurusan" style="font-weight: bold;">
                Barang Total<i style="color: red;">*</i>
              </label>
              <input name="tbarang_total" type="text" class="form-control" id="inputNamaJurusan" placeholder="Masukkan Total Barang" required="" style="font-weight: bold;">

              <label for="inputNamaJurusan" style="font-weight: bold;">
                Barang Rusak<i style="color: red;">*</i>
              </label>
              <input name="tbarang_broken" type="text" class="form-control" id="inputNamaJurusan" placeholder="Masukkan Jumlah Barang Rusak" required="" style="font-weight: bold;">

              <label for="inputNamaFakultas" style="margin-top: 10px;">
                Cari Ruangan
              </label>
              <input type="text" id="ruangan" placeholder="Pencarian Ruangan" class="form-control" autocomplete="off">
              <label for="inputNamaFakultas" style="margin-top: 10px; font-weight: bold;">
                Pilihan Ruangan<i style="color: red;">*</i>
              </label>
              <div id="ruangan_list"></div>
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
    $(document).ready(function () 
    {
      $('#ruangan').on('keyup',function() 
      {
          var query = $(this).val(); 
          $.ajax({
             
            url:"{{ route('src_add_barang') }}",
        
            type:"GET",
             
            data:{'ruangan':query},
             
            success:function (data) 
            {  
              $('#ruangan_list').html(data);
            }
        })
        // end of ajax call
      });

      $(document).on('click', 'option', function()
      {
        var value = $(this).text();
        $('#ruangan').val(value);
        $('#ruangan_list').html("");
      });
    });
  </script>
<!-- End of Modal Add -->  

<!-- Modal Edit -->
  @foreach($barangs as $brg)
    <div class="modal fade" id="editData{{$brg->tbarang_id}}" role="dialog" aria-labelledby="deleteData" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content"> 
          <form action="{{ route('barang.update', $brg->tbarang_id) }}" method="post">
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
                <input type="text" name="tbarang_total" class="form-control" value="{{ $brg->tbarang_total }}" required="" style="font-weight: bold;">

                <label style="font-weight: bold;">
                  Total Broken<i style="color: red;">*</i>
                </label>
                <input type="text" name="tbarang_broken" class="form-control" value="{{ $brg->tbarang_broken}}" required="" style="font-weight: bold;">

                <label for="FakultasLama" style="margin-top: 10px; font-weight: bold;">
                  Ruangan Saat Ini
                </label>
                <input type="text" class="form-control" value="{{ $brg->truangan_nama }}" disabled>

                <label for="inputFakultasBaru" style="margin-top: 10px; font-weight: bold;">
                  Pilihan Ruangan Baru<i style="color: red;">*</i>
                </label>
                <select class="itemName form-control" style="width:450px;" name="tbarang_ruangan"></select>
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
      $('.itemName').select2({
        placeholder: 'Select Ruangan Baru',
        ajax: {
          url: '/src_edit_barang',
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
@stop

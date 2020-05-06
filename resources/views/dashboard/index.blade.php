@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

  <div class="card-header">
      <button type="button" data-toggle="modal" data-target="#send_email" class="btn btn-success">
        <i class="fas fa-envelope-square"></i> &nbsp; Send Email
      </button>
  </div>
  <br>
  <div class="section-body">
  	<div class="row">
  	  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-building"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Fakultas</h4>
              </div>
              <div class="card-body">
                {{$fklts}}
              </div>
            </div>
          </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-book-reader"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Jurusan</h4>
              </div>
              <div class="card-body">
                {{$jrsn}}
              </div>
            </div>
          </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
              <i class="fab fa-houzz"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Ruangan</h4>
              </div>
              <div class="card-body">
                {{$rngn}}
              </div>
            </div>
          </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-pencil-ruler"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Barang</h4>
              </div>
              <div class="card-body">
                {{$brg}}
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>
<!-- Modal EMAIL -->
  <div class="modal fade" id="send_email" tabindex="-1" role="dialog" aria-labelledby="deleteData" aria-hidden="true" >
    <div class="modal-dialog" role="document">
      <div class="modal-content"> 
        <form action="{{url('kirimemail')}}">
          <div class="modal-header">
            <h5 class="modal-title" id="DataLabel"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> &nbsp; Konfirmasi Email</h5>
          </div>
          <hr>
          <div class="modal-body">
            <div class="form-group">
              <h5>
                Kirim Email?
              </h5>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-success" data-dismiss="modal">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- End of Modal EMAIL--> 
@stop
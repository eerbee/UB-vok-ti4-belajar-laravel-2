@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

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
@stop
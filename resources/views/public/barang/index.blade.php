@extends('public.layouts.main')

@section('content')
	<!-- Start Page Header area -->
	<div id="mu-page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="mu-page-header-area" style="background-image: url({{asset('assets_public/images/inventori.jpg')}});">
						<h1 class="mu-page-header-title">Koleksi Buku</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Header area -->

	<!-- Start Breadcrumb -->
	<div id="mu-breadcrumb">
		<div class="container">				
			<div class="row">
				<div class="col-md-12">
					<nav aria-label="breadcrumb" role="navigation">
					  <ol class="breadcrumb mu-breadcrumb">
					    {{--<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>--}}
					    <li class="breadcrumb-item active" aria-current="page">Koleksi Buku</li>
					  </ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumb -->

	<!-- Start main content -->
	<main>
		<!-- Start Team -->
		<section id="mu-team">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-team-area">
							<!-- Title -->
							<div class="row">
								<div class="col-md-12">
									<div class="mu-title">
										<h3>Temukan Barang Yang Ingin Anda Cari</h3>
										<!-- Another variation with a button -->
										 <div class="input-group" style="margin-top: 25px;">
										 	<form class="form-control" action="{{ route('index')}}" method="get">
											    <input type="text" class="form-control" placeholder="Pencarian Barang" name="src">
											    <div class="input-group-append">
												     <button class="btn btn-secondary" type="submit">
												        <i class="fa fa-search"></i>
												     </button>
											    </div>
										    </form>
										 </div>
									</div>
								</div>
							</div>				
							<!-- Start Team Content -->
							<div class="row">
								<div class="col-md-12">
									<div class="mu-team-content">
										<div class="row">
											@foreach($barangs as $barang)
											<!-- start single item -->
											<div class="col-md-6">
												<div class="mu-single-team">
													<div class="mu-single-team-img">
														<img src="{{ URL::to('/') }}/images/barang/{{ $barang->tbarang_gambar }}" >
													</div>
													<div class="mu-single-team-content">
														<h3>{{$barang->tbarang_nama}}</h3>
														<span>
															{{ $barang->truangan_nama }}
														</span>
														<br><br>
														<ul style="margin-left: 20px; margin-bottom: 10px;">
															<li> Total : {{$barang->tbarang_total}}</li>
															<li> Rusak : {{$barang->tbarang_broken}} </li>
														</ul>
													</div>
												</div>
											</div>
											<!-- End single item -->
											@endforeach
										</div>
										{!! $barangs->links() !!}
									</div>
								</div>
							</div>
							<!-- End Team Content -->
						</div>
					</div>
				</div>
			</div>
		</section>
@stop
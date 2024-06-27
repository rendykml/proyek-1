<!-- Content Login Start -->
@include('admin.header-dashboard')

@include('admin.navbar-dashboard')

@include('admin.sidebar-dashboard')
<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				<span class="page-title-icon bg-gradient-primary text-white me-2">
					<i class="mdi mdi-home"></i>
				</span> Pengguna
			</h3>
			<nav aria-label="breadcrumb">
				<ul class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">
						<span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
					</li>
				</ul>
			</nav>
		</div>
		<div class="row">
			<div class="col-md-4 stretch-card grid-margin">
				<div class="card bg-gradient-secondary card-img-holder text-white">
					<div class="card-body">
						<img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
						<h4 class="font-weight-normal mb-3">Jumlah Pengguna
						</h4>
						<h2 class="mb-5">{{ $pengguna }}</h2>
					</div>
				</div>
			</div>
			<div class="col-md-4 stretch-card grid-margin">
				<div class="card bg-gradient-info card-img-holder text-white">
					<div class="card-body">
						<img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
						<h4 class="font-weight-normal mb-3">Jumlah Dokter
						</h4>
						<h2 class="mb-5">{{ $dokter }}</h2>
					</div>
				</div>
			</div>
			<div class="col-md-4 stretch-card grid-margin">
				<div class="card bg-gradient-success card-img-holder text-white">
					<div class="card-body">
						<img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
						<h4 class="font-weight-normal mb-3">Jumlah Pasien
						</h4>
						<h2 class="mb-5">{{ $pasien }}</h2>
					</div>
				</div>
			</div>
			<div class="col-md-4 stretch-card grid-margin">
				<div class="card bg-gradient-primary card-img-holder text-white">
					<div class="card-body">
						<img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
						<h4 class="font-weight-normal mb-3">Jumlah Keluhan Terjawab
						</h4>
						<h2 class="mb-5">{{ $keluhanterjawab }}</h2>
					</div>
				</div>
			</div>
			<div class="col-md-4 stretch-card grid-margin">
				<div class="card bg-gradient-danger card-img-holder text-white">
					<div class="card-body">
						<img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
						<h4 class="font-weight-normal mb-3">Jumlah Keluhan Belum Dijawab
						</h4>
						<h2 class="mb-5">{{ $keluhanbelumdijawab }}</h2>
					</div>
				</div>
			</div>
			<div class="col-md-4 stretch-card grid-margin">
				<div class="card bg-gradient-warning card-img-holder text-white">
					<div class="card-body">
						<img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
						<h4 class="font-weight-normal mb-3">Jumlah Keluhan Selesai (Rated)
						</h4>
						<h2 class="mb-5">{{ $keluhanrated }}</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- content-wrapper ends -->
	<!-- partial:partials/_footer.html -->
	<footer class="footer">
		<div class="container-fluid d-flex justify-content-between">
			<span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
			<span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
		</div>
	</footer>
	<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>

@include('admin.footer-dashboard')
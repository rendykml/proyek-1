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
					<i class="mdi mdi-view-list"></i>
				</span> Laporan
			</h3>
			{{-- <nav aria-label="breadcrumb">
				<ul class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">
						<span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
					</li>
				</ul>
			</nav> --}}
		</div>
		<div class="row">
			<div class="card-body">
				{{-- <a href="{{ route('admin.tambah-jadwal') }}" class="btn btn-success">Tambah Jadwal Dokter</a> --}}
			</div>
		</div>
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">
						<div class="row mb-3">
                            <div class="col-md-4">
                                <div class="card text-white bg-primary mb-3">
                                    <div class="card-header">Total Pasien</div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $sum_pasien }}</h5>
                                        <p class="card-text">Orang</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white bg-success mb-3">
                                    <div class="card-header">Appointments</div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $total_appoiment }}</h5>
                                        <p class="card-text">Upcoming appointments.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white bg-warning mb-3">
                                    <div class="card-header">Pending Reports</div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $total_pesan_blm_dijawab }}</h5>
                                        <p class="card-text">Reports pending review.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="card text-white bg-primary mb-3">
                                    <div class="card-header">Total Dokter</div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $total_dokter }}</h5>
                                        <p class="card-text">Orang</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white bg-success mb-3">
                                    <div class="card-header">Rating</div>
                                    <div class="card-body">
                                        <h5 class="card-title">100</h5>
                                        <p class="card-text">Bintang</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white bg-warning mb-3">
                                    <div class="card-header">Report</div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $total_pesan_blm_dijawab }}</h5>
                                        <p class="card-text">Reports pending review.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
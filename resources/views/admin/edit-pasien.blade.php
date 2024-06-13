<!-- Content Login Start -->
@include('admin.header-dashboard')

@include('admin.navbar-dashboard')

@include('admin.sidebar-dashboard')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title"> Update Data Pasien </h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
					<li class="breadcrumb-item active" aria-current="page">Update Data Pasien</li>
				</ol>
			</nav>
		</div>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Update Data Pasien</h4>
						<p class="card-description"> Isi Seluruh Form yang Tersedia </p>
						<form class="forms-sample" method="POST" action="{{ route('updatePasien', $pasien->pasien_id) }}">
							@csrf
							@method('PUT')
                            <div class="form-group">
                                <label for="user_id">Nama Pasien</label>
                                <input type="text" id="user_id" value="{{ $pasien->user->name }}" class="form-control" readonly>
                            </div>
							<div class="form-group">
								<label for="riwayat_medis">Riwayat Medis</label>
								<input type="text" name="riwayat_medis" id="riwayat_medis" value="{{ $pasien->riwayat_medis }}" class="form-control">
							</div>
							<div class="form-group">
								<label for="asuransi">Asuransi</label>
								<input type="text" name="asuransi" id="asuransi" value="{{ $pasien->asuransi }}" class="form-control">
							</div>
							<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
							<a href="{{ route('admin.dashboard') }}" class="btn btn-light">Cancel</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- content-wrapper ends -->
	<!-- partial:../../partials/_footer.html -->
	<footer class="footer">
		<div class="container-fluid d-flex justify-content-between">
			<span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
			<span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
		</div>
	</footer>
	<!-- partial -->
</div>

@include('admin.footer-dashboard')
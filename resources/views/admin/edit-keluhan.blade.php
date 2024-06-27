<!-- Content Login Start -->
@include('admin.header-dashboard')

@include('admin.navbar-dashboard')

@include('admin.sidebar-dashboard')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title"> Update Data Konsultasi Pasien</h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin.dashboard-keluhan') }}">Dashboard</a></li>
					<li class="breadcrumb-item active" aria-current="page">Update Data Konsultasi Pasien</li>
				</ol>
			</nav>
		</div>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Update Data Konsultasi Pasien</h4>
						<p class="card-description"> Isi Seluruh Form yang Tersedia </p>
						<form class="forms-sample" method="POST" action="{{ route('updateKeluhan', ['konsultasi_id' => $konsultasi->konsultasi_id]) }}">
							@csrf
							@method('PUT')

							<div class="form-group">
								<label for="pasien_id">Pasien</label>
								<input type="text" class="form-control" id="pasien_id" value="{{ $konsultasi->pasien_name }}" readonly>
							</div>

							<div class="form-group">
								<label for="doctor_id">Pilih Dokter</label>
								<select class="form-control" id="doctor_id" name="doctor_id">
									@foreach($doctors as $dokter)
									<option value="{{ $dokter->doctor_id }}" {{ $konsultasi->doctor_id == $dokter->doctor_id ? 'selected' : '' }}>{{ $dokter->doctor_name }}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label for="tanggal_konsultasi">Tanggal Konsultasi</label>
								<input type="datetime-local" name="tanggal_konsultasi" class="form-control datepicker" id="tanggal_konsultasi" value="{{ \Carbon\Carbon::parse($konsultasi->tanggal_konsultasi)->format('Y-m-d\TH:i') }}">
								@if ($errors->has('tanggal_konsultasi'))
								<span class="text-danger">{{ $errors->first('tanggal_konsultasi') }}</span>
								@endif
							</div>

							<div class="form-group">
								<label for="keluhan_pasien">Keluhan Pasien</label>
								<input type="text" class="form-control" id="keluhan_pasien" name="keluhan_pasien" value="{{ $konsultasi->keluhan_pasien }}">
								@if ($errors->has('keluhan_pasien'))
								<span class="text-danger">{{ $errors->first('keluhan_pasien') }}</span>
								@endif
							</div>

							<button type="submit" class="btn btn-gradient-primary me-2">Update</button>
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
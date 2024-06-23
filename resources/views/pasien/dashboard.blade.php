<!-- Content Login Start -->
@include('pasien.header-dashboard')

@include('pasien.navbar-dashboard')

@include('pasien.sidebar-dashboard')
<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				<span class="page-title-icon bg-gradient-primary text-white me-2">
					<i class="mdi mdi-home"></i>
				</span> Pengajuan Keluhan Pasien
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
			<div class="card-body">
				<a href="{{ route('pasien.dashboard-keluhan') }}" class="btn btn-success">Tambah Keluhan</a>
			</div>
		</div>
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Data Keluhan</h4>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th> No </th>
										<th> Nama Pasien </th>
										<th> Dokter yang Menangani </th>
										<th> Tanggal Konsultasi </th>
										<th> Status Konsultasi </th>
										<th> Keluhan </th>
										<th> Balasan Dokter </th>
										<th> Review </th>
									</tr>
								</thead>
								<tbody>
									@foreach($consultations as $index => $consultation)
									<tr>
										<td>{{ $index + 1 }}</td>
										<td>{{ $consultation->nama_pasien }}</td>
										<td>{{ $consultation->nama_dokter }}</td>
										<td>{{ $consultation->tanggal_konsultasi }}</td>
										<td>
											@if ($consultation->status == 'belum dijawab')
											<button class="btn btn-danger">Belum Dijawab</button>
											@elseif ($consultation->status == 'terjawab')
											<button class="btn btn-primary">Terjawab</button>
											@endif
										</td>
										<td>{{ $consultation->keluhan_pasien }}</td>
										<td>{{ $consultation->balasan_dokter }}</td>
										<td>
											@if ($consultation->status == 'terjawab')
											<button class="btn btn-primary">Review</button>
											@elseif ($consultation->status == 'belum dijawab')
											<button class="btn btn-danger">Keluhan Anda Belum Terjawab</button>
											@endif
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
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

@include('pasien.footer-dashboard')
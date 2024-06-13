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
				</span> Pasien
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
				<a href="{{ route('admin.tambah-pasien') }}" class="btn btn-success">Tambah Data Pasien</a>
			</div>
		</div>
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Data Pasien</h4>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th> No </th>
										<th> Nama </th>
										<th> Email </th>
										<th> Jenis Kelamin </th>
										<th> Tanggal Lahir </th>
										<th> Alamat </th>
										<th> No. Telepon </th>
										<th>Riwayat Medis</th>
										<th>Asuransi</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($pasiens as $index => $pasien)
									<tr>
										<td>{{ $index + 1 }}</td>
										<td>{{ $pasien->name }}</td>
										<td>{{ $pasien->email }}</td>
										<td>{{ $pasien->jenis_kelamin }}</td>
										<td>{{ $pasien->tanggal_lahir }}</td>
										<td>{{ $pasien->alamat }}</td>
										<td>{{ $pasien->no_telepon }}</td>
										<td>{{ $pasien->riwayat_medis }}</td>
										<td>{{ $pasien->asuransi }}</td>
										<td>
										<a href="{{ route('admin.edit-pasien', $pasien->pasien_id) }}" class="btn btn-primary">Edit</a>
											<button class="add btn btn-danger">Delete</button>
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

@include('admin.footer-dashboard')
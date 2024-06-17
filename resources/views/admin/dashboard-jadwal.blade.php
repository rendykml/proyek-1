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
				</span> Jadwal Dokter
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
				<a href="{{ route('admin.tambah-jadwal') }}" class="btn btn-success">Tambah Jadwal Dokter</a>
			</div>
		</div>
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Data Jadwal Dokter</h4>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th> No </th>
										<th> Nama Dokter </th>
										<th> Spesialisasi  </th>
										<th> Hari </th>
										<th> Tanggal dan Jam Mulai </th>
										<th> Tanggal dan Jam Selesai </th>
										<th> Action </th>
									</tr>
								</thead>
								<tbody>
									@foreach($jadwals as $index => $jadwal)
									<tr>
										<td>{{ $index + 1 }}</td>
										<td>{{ $jadwal->doctor_name }}</td>
										<td>{{ $jadwal->spesialisasi }}</td>
										<td>{{ $jadwal->hari }}</td>
										<td>{{ $jadwal->jam_mulai }}</td>
										<td>{{ $jadwal->jam_selesai }}</td>
										<td>
										<a href="{{ route('admin.edit-jadwal', $jadwal->jadwal_id) }}" class="btn btn-primary">Edit</a>
										<form action="{{ route('deleteJadwal', $jadwal->jadwal_id) }}" method="POST" style="display:inline;">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal dokter ini?')">Delete</button>
											</form>
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
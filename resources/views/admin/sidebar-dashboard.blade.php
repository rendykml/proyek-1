<!-- partial -->
<div class="container-fluid page-body-wrapper">
	<!-- partial:partials/_sidebar.html -->
	<nav class="sidebar sidebar-offcanvas" id="sidebar">
		<ul class="nav">
			<li class="nav-item nav-profile">
				<a href="#" class="nav-link">
					<div class="nav-profile-image">
						<img src="{{asset('assets/images/faces/face1.jpg')}}" alt="profile">
						<span class="login-status online"></span>
						<!--change to offline or busy as needed-->
					</div>
					<div class="nav-profile-text d-flex flex-column">
						<span class="font-weight-bold mb-2">David Grey. H</span>
						<span class="text-secondary text-small">Project Manager</span>
					</div>
					<i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.home') }}">
					<span class="menu-title">Dashboard</span>
					<i class="mdi mdi-home menu-icon"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.dashboard') }}">
					<span class="menu-title">Pengguna</span>
					<i class="mdi mdi-account menu-icon"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.pasien-dashboard') }}">
					<span class="menu-title">Pasien</span>
					<i class="mdi mdi-account-box-outline menu-icon"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.dashboard-keluhan') }}">
					<span class="menu-title">Keluhan Pasien</span>
					<i class="mdi mdi-home menu-icon"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.dashboard-dokter') }}">
					<span class="menu-title">Dokter</span>
					<i class="mdi mdi-home menu-icon"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.dashboard-jadwal') }}">
					<span class="menu-title">Jadwal Dokter</span>
					<i class="mdi mdi-home menu-icon"></i>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.dashboard-laporan') }}">
					<span class="menu-title">Laporan</span>
					<i class="mdi mdi-view-list menu-icon"></i>
				</a>
			</li>
		</ul>
	</nav>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="assets/img/favicon.png" rel="icon">
	<link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
	<title>Pasien Dashboard</title>
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
	<section id="appointment" class="appointment section-bg">
		<div class="container">

			<div class="section-title">
				<h2>Make an Appointment</h2>
				<p>Silahkan tulis keluhan anda</p>
			</div>

			<form action="{{ route('tambahKeluhan') }}" method="POST" role="form" class="php-email-form">
				@csrf
				<div class="row">
					<div class="col-md-4 form-group">
						<input type="text" name="name" class="form-control" id="name" placeholder="Nama" value="{{ $pasien->name }}" readonly>
						<div class="validate"></div>
					</div>
					<div class="col-md-4 form-group mt-3 mt-md-0">
						<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $pasien->email }}" readonly>
						<div class="validate"></div>
					</div>
					<div class="col-md-4 form-group mt-3 mt-md-0">
						<input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{ $pasien->no_telepon }}" readonly>
						<div class="validate"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 form-group mt-3">
						<input type="datetime-local" name="date" class="form-control datepicker" id="date" placeholder="Tanggal" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
						<div class="validate"></div>
					</div>
					<div class="col-md-4 form-group mt-3">
						<select name="doctor" id="doctor" class="form-select">
							<option value="">Pilih Dokter</option>
							@foreach($doctors as $doctor)
							<option value="{{ $doctor->doctor_id }}">{{ $doctor->doctor_name }} - {{ $doctor->spesialisasi }}</option>
							@endforeach
						</select>
						<div class="validate"></div>
					</div>
				</div>

				<div class="form-group mt-3">
					<textarea class="form-control" name="message" rows="5" placeholder="Keluhan"></textarea>
					<div class="validate"></div>
				</div>
				<div class="mb-3">
					<div class="loading">Loading</div>
					<div class="error-message"></div>
					<div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
				</div>
				<div class="text-center">
					<button type="submit">Make an Appointment</button>
				</div>
			</form>
			<form method="POST" action="{{ route('logout') }}">
				@csrf
				<button type="submit" class="btn btn-danger">Logout</button>
			</form>
		</div>
		</div>
	</section>
</body>

</html>
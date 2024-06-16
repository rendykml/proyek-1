<!-- Content Register Start -->
@include('auth.header-register')

<main class="d-flex w-100">
	<div class="container d-flex flex-column">
		<div class="row vh-100">
			<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
				<div class="d-table-cell align-middle">

					<div class="text-center mt-4">
						<h1 class="h2">Buat Akun!</h1>
						<p class="lead">
							ULBI Medicine
						</p>
					</div>

					<div class="card">
						<div class="card-body">
							<div class="m-sm-3">
								<form method="POST" action="{{ route('register') }}">
									@csrf
									<div class="mb-3">
										<label class="form-label">Nama Lengkap</label>
										<input class="form-control form-control-lg" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Lengkap" required />
										@if ($errors->has('name'))
										<span class="text-danger">{{ $errors->first('name') }}</span>
										@endif
									</div>
									<div class="mb-3">
										<label class="form-label">Email</label>
										<input class="form-control form-control-lg" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email" />
										@if ($errors->has('email'))
										<span class="text-danger">{{ $errors->first('email') }}</span>
										@endif
									</div>
									<div class="mb-3">
										<label class="form-label">Jenis Kelamin</label>
										<select class="form-control form-control-lg" id="gender" name="gender" required>
											<option value="">Pilih Jenis Kelamin</option>
											<option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
											<option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
										</select>
										@if ($errors->has('gender'))
										<span class="text-danger">{{ $errors->first('gender') }}</span>
										@endif
									</div>
									<div class="mb-3">
										<label class="form-label">Password</label>
										<input class="form-control form-control-lg" type="password" id="password" name="password" placeholder="Masukkan Password" />
										@if ($errors->has('password'))
										<span class="text-danger">{{ $errors->first('password') }}</span>
										@endif
									</div>
									<div class="form-group">
										<label for="password_confirmation">Confirm Password</label>
										<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
									</div>
									<div class="d-grid gap-2 mt-3">
										<button type="submit" class="btn btn-lg btn-primary">Buat Akun</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="text-center mb-3">
						Sudah Punya Akun? <a href="{{ url('/login') }}">Log In</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@include('auth.footer-register')
<!-- Content Register End -->
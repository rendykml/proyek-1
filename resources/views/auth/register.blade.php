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
										<label class="form-label">Username</label>
										<input class="form-control form-control-lg" type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Masukkan Username" required />
										@if ($errors->has('username'))
										<span class="text-danger">{{ $errors->first('username') }}</span>
										@endif
									</div>
									<div class="mb-3">
										<label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
										<select class="form-control form-control-lg" id="jenis_kelamin" name="jenis_kelamin">
											<option value="">Pilih Jenis Kelamin</option>
											<option value="Laki-Laki">Laki-Laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
										@if ($errors->has('jenis_kelamin'))
										<span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
										@endif
									</div>
									<div class="mb-3">
										<label for="alamat" class="form-label">Alamat</label>
										<textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
										@error('alamat')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
									<div class="mb-3">
										<label class="form-label">Tanggal Lahir</label>
										<input class="form-control form-control-lg" type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder="Masukkan tanggal_lahir" required />
										@if ($errors->has('tanggal_lahir'))
										<span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
										@endif
									</div>
									<div class="mb-3">
										<label class="form-label">No Telepon</label>
										<input class="form-control form-control-lg" type="text" id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}" placeholder="Masukkan no_telepon" required />
										@if ($errors->has('no_telepon'))
										<span class="text-danger">{{ $errors->first('no_telepon') }}</span>
										@endif
									</div>
									<div class="mb-3">
										<label class="form-label">Riwayat Medis</label>
										<input class="form-control form-control-lg" type="text" id="riwayat_medis" name="riwayat_medis" value="{{ old('riwayat_medis') }}" placeholder="Masukkan Riwayat Medis" required />
										@if ($errors->has('riwayat_medis'))
										<span class="text-danger">{{ $errors->first('riwayat_medis') }}</span>
										@endif
									</div>
									<div class="mb-3">
										<label class="form-label">Asuransi</label>
										<input class="form-control form-control-lg" type="text" id="asuransi" name="asuransi" value="{{ old('asuransi') }}" placeholder="Masukkan Asuransi" required />
										@if ($errors->has('asuransi'))
										<span class="text-danger">{{ $errors->first('asuransi') }}</span>
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
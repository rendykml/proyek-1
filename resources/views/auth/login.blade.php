<!-- Content Login Start -->
@include('auth.header-login')

<main class="d-flex w-100">
	<div class="container d-flex flex-column">
		<div class="row vh-100">
			<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
				<div class="d-table-cell align-middle">

					<div class="text-center mt-4">
						<h1 class="h2">Selamat Datang!</h1>
						<p class="lead">
							ULBI Medicine
						</p>
					</div>

					<div class="card">
						<div class="card-body">
							<div class="m-sm-3">
								<form id="loginForm" action="{{ route('login') }}" method="post">
									@csrf
									<div class="mb-3">
										<label class="form-label">Email</label>
										<input class="form-control form-control-lg" type="email" id="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}" />
										@if ($errors->has('email'))
										<span class="text-danger">{{ $errors->first('email') }}</span>
										@endif
									</div>
									<div class="mb-3">
										<label class="form-label">Password</label>
										<input class="form-control form-control-lg" type="password" id="password" name="password" placeholder="Masukkan Password" />
										@if ($errors->has('password'))
										<span class="text-danger">{{ $errors->first('password') }}</span>
										@endif
									</div>
									<div class="d-grid gap-2 mt-5">
										<button type="submit" class="btn btn-lg btn-primary">Log In</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="text-center mb-3">
						Belum Punya Akun? <a href="{{ url('/register') }}">Register</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@include('auth.footer-login')
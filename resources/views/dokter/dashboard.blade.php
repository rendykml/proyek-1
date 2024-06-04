<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dokter Dashboard</title>
</head>

<body>
	<h1>Welcome to Dokter Dashboard</h1>
	<p>This is a simple Dokter dashboard page.</p>
	<form method="POST" action="{{ route('logout') }}">
		@csrf
		<button type="submit" class="btn btn-danger">Logout</button>
	</form>
</body>

</html>
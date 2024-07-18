<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
            <div class="container">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <a class="nav-link" href="{{ route('laporan.dashboard-laporan') }}">
                        <span class="menu-title">Report</span>
                        <i class="mdi mdi-home menu-icon"></i>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>

                <!-- Dashboard Cards -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Total Pasien</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $sum_pasien }}</h5>
                                <p class="card-text">Orang</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header">Sudah Terjawab</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $total_appoiment }}</h5>
                                <p class="card-text">Terjawab</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-header">Belum Terjawab</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $total_pesan_blm_dijawab }}</h5>
                                <p class="card-text">Belum Terjawab.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Appointments</h4>
                                <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                    <th>#</th>
                                            <th>ID</th>
                                            <th>pasien_id</th>
                                            <th>doctor_id</th>
                                            <th>tanggal_konsultasi</th>
                                            <th>status</th>
                                            <th>keluhan_pasien</th>
                                            <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($konsultasi as $index => $konsul)
                                    <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $konsul->konsultasi_id }}</td>
                                    <td>{{ $konsul->pasien_id }}</td>
                                    <td>{{ $konsul->doctor_id }}</td>
                                    <td>{{ $konsul->tanggal_konsultasi }}</td>
                                    <td>{{ $konsul->status }}</td>
                                    <td>{{ $konsul->keluhan_pasien }}</td>
                                    <td><a href="{{ route('dokter.respon', $konsul->konsultasi_id) }}" class="btn btn-success">Lihat detail</a></td>
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
</body>
</html>

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
                    <h1 class="h2">Report</h1>
                    <a class="nav-link" href="{{ route('dokter.dashboard') }}">
                        <span class="menu-title">Dashboard</span>
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
                                <p class="card-text">Hasil yang sudah terjawab.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-header">Belum Terjawab</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $total_pesan_blm_dijawab }}</h5>
                                <p class="card-text"> Hasil yang belum terjawab.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Total Dokter</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $total_dokter }}</h5>
                                <p class="card-text">Orang</p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Appointments Table -->
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Kelola Laporan</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th> No </th>
                                                <th> Nama Pasien </th>
                                                <th> Dokter yang Menangani </th>
                                                <th> Tanggal Konsultasi </th>
                                                {{-- <th> Status Konsultasi </th> --}}
                                                <th> Keluhan </th>
                                                {{-- <th> Balasan Dokter </th> --}}
                                                {{-- <th> Rating </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($consultations as $index => $consultation)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $consultation->nama_pasien }}</td>
                                                <td>{{ $consultation->nama_dokter }}</td>
                                                <td>{{ $consultation->tanggal_konsultasi }}</td>
                                                <td>{{ $consultation->keluhan_pasien }}</td>
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

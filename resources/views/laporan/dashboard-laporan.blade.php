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
                            <div class="card-header">Appointments</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $total_appoiment }}</h5>
                                <p class="card-text">Upcoming appointments.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-header">Pending Reports</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $total_pesan_blm_dijawab }}</h5>
                                <p class="card-text">Reports pending review.</p>
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
                                <h4 class="card-title">Data Keluhan</h4>
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
                                                {{-- <td>
                                                    @if ($consultation->status == 'belum dijawab')
                                                    <button class="btn btn-danger">Belum Dijawab</button>
                                                    @elseif ($consultation->status == 'terjawab')
                                                    <button class="btn btn-primary">Terjawab</button>
                                                    @elseif ($consultation->status == 'reviewed')
                                                    <button class="btn btn-success">Reviewed</button>
                                                    @endif
                                                </td> --}}
                                                <td>{{ $consultation->keluhan_pasien }}</td>
                                                {{-- <td>{{ $consultation->balasan_dokter }}</td> --}}
                                                {{-- <td>
                                                    @if ($consultation->status == 'terjawab')
                                                    <button class="btn btn-primary review-button" data-consultation-id="{{ $consultation->konsultasi_id }}">Review</button>
                                                    @elseif ($consultation->status == 'belum dijawab')
                                                    <button class="btn btn-danger">Keluhan Anda Belum Terjawab</button>
                                                    @elseif ($consultation->status == 'reviewed' && $consultation->rating)
                                                    <button class="btn btn-success">Rating: {{ $consultation->rating }}</button>
                                                    @endif
                                                </td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <!-- Message Section -->
                {{-- <h2>Messages</h2>
                <div class="card mb-3">
                    <div class="card-header">Reply to Messages</div>
                    <div class="card-body">
                        <form id="messageForm">
                            <div class="form-group">
                                <label for="messageText">Message</label>
                                <textarea class="form-control" id="messageText" rows="3" placeholder="Type your message here..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div> --}}
            </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // JavaScript for form submission
    document.getElementById('messageForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const messageText = document.getElementById('messageText').value;
        if (messageText.trim() === '') {
            alert('Please enter a message before sending.');
        } else {
            alert('Message sent: ' + messageText);
            document.getElementById('messageText').value = '';
        }
    });
</script>
</html>

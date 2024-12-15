<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
                <h2>Konsultasi ID :{{$respon[0]->konsultasi_id ?? "-"}}</h2>
                <br>
                <table>
                <tr>
                        <td>Nama</td>
                        <td>: {{$respon[0]->name ?? "-"}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:{{$respon[0]->jenis_kelamin ?? "-"}} </td>
                    </tr>
                    <tr>
                        <td>Tanggal lahir</td>
                        <td>:{{$respon[0]->tanggal_lahir ?? "-"}} </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: {{$respon[0]->alamat ?? "-"}}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>: {{$respon[0]->no_telepon ?? "-"}}</td>
                    </tr>
                    <tr>
                        <td>Asuransi</td>
                        <td>: {{$respon[0]->asuransi?? "-"}}</td>
                    </tr>
                </table>
                <hr>
                <table>
                <tr>
                        <td>Riwayat medis</td>
                        <td>: {{$respon[0]->riwayat_medis ?? "-"}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Konsultasi</td>
                        <td>: {{$respon[0]->tanggal_konsultasi ?? "-"}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>: {{$respon[0]->status ?? "-"}}</td>
                    </tr>
                    <tr>
                        <td>Keluhan pasien</td>
                        <td>: {{$respon[0]->keluhan_pasien ?? "-"}}</td>
                    </tr>
                   
                </table>
                <br>
                <div class="card mb-3">

                    <div class="card-header">Keluhan</div>
                    <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('respon', $respon[0]->konsultasi_id ?? '-' ) }}">
							@csrf
							@method('PUT')
                            <div class="form-group">
                                <label for="respon">pesan</label>
                                <textarea class="form-control" id="respon" name="respon" rows="3" placeholder="Type your message here..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
</div>

  
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
</body>
</html>

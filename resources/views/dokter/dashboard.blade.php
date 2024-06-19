<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-size: .875rem;
        }

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
        }

        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 48px;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .nav-link.active {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Patients
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Appointments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Reports
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>

                <!-- Dashboard Cards -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Total Patients</div>
                            <div class="card-body">
                                <h5 class="card-title">150</h5>
                                <p class="card-text">New patients registered this month.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header">Appointments</div>
                            <div class="card-body">
                                <h5 class="card-title">75</h5>
                                <p class="card-text">Upcoming appointments.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-header">Pending Reports</div>
                            <div class="card-body">
                                <h5 class="card-title">10</h5>
                                <p class="card-text">Reports pending review.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Appointments Table -->
                <h2>Appointments</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Patient Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>2024-06-15</td>
                                <td>10:00 AM</td>
                                <td>Confirmed</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>2024-06-16</td>
                                <td>11:00 AM</td>
                                <td>Pending</td>
                            </tr>
                            <!-- More rows as needed -->
                        </tbody>
                    </table>
                </div>

                <!-- Message Section -->
                <h2>Messages</h2>
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
                </div>
            </main>
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

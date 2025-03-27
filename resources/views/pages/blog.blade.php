@extends('layouts.app')
@section('content')

<html>
<head>
    <title>Yewo Car Hire Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #212529;
            color: white;
            height: 100vh;
            padding: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }
        .sidebar a:hover {
            background-color: #343a40;
        }
        .sidebar .active {
            background-color: #343a40;
        }
        .content {
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #f8f9fa;
            border-bottom: none;
        }
        .card-body {
            padding: 20px;
        }
        .stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .stats .value {
            font-size: 24px;
            font-weight: bold;
        }
        .stats .change {
            font-size: 14px;
            color: red;
        }
        .stats .change.positive {
            color: green;
        }
        .pie-chart {
            width: 100%;
            height: 200px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .earning-summary {
            height: 200px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <h2>YEWO CAR HIRE</h2>
            <a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="#"><i class="fas fa-car"></i> Bookings</a>
            <a href="#"><i class="fas fa-bell"></i> Notifications</a>
            <a href="#"><i class="fas fa-cog"></i> Settings</a>
            <a href="#"><i class="fas fa-file-alt"></i> Report</a>
            <a href="#"><i class="fas fa-credit-card"></i> Payment Details</a>
            <a href="#"><i class="fas fa-exchange-alt"></i> Transactions</a>
            <a href="#"><i class="fas fa-file-alt"></i> Car Report</a>
            <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
        <div class="content flex-grow-1">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Todays Statistics</h4>
                <div>
                    <i class="fas fa-bell"></i>
                    <input type="text" placeholder="Search" class="form-control d-inline-block" style="width: 200px;">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="stats">
                                <div>
                                    <div class="value">$9460.00</div>
                                    <div class="change">-1.5%</div>
                                </div>
                                <div>Income</div>
                            </div>
                            <div>Compared to $9640 yesterday</div>
                            <div>Last week income $25860.00</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="stats">
                                <div>
                                    <div class="value">$5660.00</div>
                                    <div class="change positive">+2.5%</div>
                                </div>
                                <div>Expenses</div>
                            </div>
                            <div>Compared to $5520 yesterday</div>
                            <div>Last week expenses $22580.00</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="pie-chart">
                                <canvas id="pieChart"></canvas>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>Total Hired</div>
                                <div>54%</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>Total Canceled</div>
                                <div>26%</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>Total Pending</div>
                                <div>20%</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Car Availability
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <input type="text" class="form-control me-2" placeholder="Car number">
                                <input type="date" class="form-control me-2">
                                <input type="time" class="form-control me-2">
                                <button class="btn btn-primary">Check</button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Live Car Status
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Car no.</th>
                                        <th>Driver</th>
                                        <th>Status</th>
                                        <th>Earning</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>6465</td>
                                        <td>Alex Norman</td>
                                        <td>Completed</td>
                                        <td>$36.44</td>
                                        <td><button class="btn btn-primary">Details</button></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>8655</td>
                                        <td>Razib Rahman</td>
                                        <td>Pending</td>
                                        <td>$0.00</td>
                                        <td><button class="btn btn-primary">Details</button></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>1755</td>
                                        <td>Luke Norton</td>
                                        <td>In route</td>
                                        <td>$23.50</td>
                                        <td><button class="btn btn-primary">Details</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Earning Summary
                        </div>
                        <div class="card-body">
                            <canvas id="earningSummary" class="earning-summary"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzOg6tv6kL6pL4l8v2X+zT9l6k6txU5Bf5c5ExlW4pON" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-pZjw8f+ua7Kw1TIqZJ6C6t2eI6p1p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6i6p6X5p6


@endsection

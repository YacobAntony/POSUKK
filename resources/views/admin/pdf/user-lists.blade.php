<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Receipt</title>
    <!-- Include Bootstrap CSS link -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */
        body {
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Transaction Receipt</h3>
                    </div>
                    <div class="card-body">
                        <div class="receipt_header">
                            <h1>Seeaudio</h1>
                            <h2>Address: Jl. Amerika <span>Tel: +62 012 345 67 89</span></h2>
                        </div>

                        <div class="receipt_body">
                            <div class="date_time_con">
                                <div class="date">{{ $transaction->created_at->timezone('Asia/Jakarta')->format('d/m/Y') }}</div>
                                <div class="time">{{ $transaction->created_at->timezone('Asia/Jakarta')->format('h:i:s A') }}</div>
                            </div>

                            <div class="items">
                                <table class="table">
                                    <thead>
                                        <th>QTY</th>
                                        <th colspan="2">ITEM</th>
                                        <th>AMT</th>
                                    </thead>
                                    <tbody>
                                        @foreach($transactionDetail as $cok)
                                            <tr>
                                                <td>{{ $cok->qty }}</td>
                                                <td colspan="2">{{ $cok->produk_name }}</td>
                                                <td>{{ $cok->subtotal }}</td>
                                            </tr>
                                        @endforeach
                                        <!-- Tambahkan baris-baris tambahan sesuai dengan jumlah transaksi detail -->
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Total</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $transaction->total }}</td>
                                        </tr>
                                        <tr>
                                            <td>Cash</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $transaction->dibayarkan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Change</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $transaction->dibayarkan - $transaction->total }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <h3>Thank You!</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS and Popper.js scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

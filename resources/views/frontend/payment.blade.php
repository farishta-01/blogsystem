<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 - Stripe Payment Gateway Integration Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Laravel 10 - Stripe Payment Gateway Integration Example <br /> ItSolutionStuff.com</h1>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table">
                        <h2 class="panel-title">Checkout Form</h2>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
                        <form id='checkout-form' method='post' action="{{ route('stripe.post') }}">
                            @csrf
                            <input type='hidden' name='stripeToken' id='stripe-token-id'>
                            <div class="form-group">
                                <label for="cardholder-name">Cardholder Name:</label>
                                <input type="text" id="cardholder-name" name="cardholder_name" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="card-number">Card Number:</label>
                                <input type="text" id="card-number" name="card_number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="cvv">CVV:</label>
                                <input type="text" id="cvv" name="cvv" class="form-control" required>
                            </div>
                            {{-- <div class="form-group">
                                <label for="card-expiration-date">Expiration Date:</label>
                                <input type="text" id="card-expiration-date" name="card_expiration_date"
                                    class="form-control" required>
                            </div> --}}

                            <div class="row">
                                @php
                                    $months = [
                                        '1' => 'Jan',
                                        '2' => 'Feb',
                                        '3' => 'March',
                                        '4' => 'April',
                                        '5' => 'May',
                                        '6' => 'Jun',
                                        '7' => 'July',
                                        '8' => 'Aug',
                                        '9' => 'Sep',
                                        '10' => 'OCT',
                                        '11' => 'Nov',
                                        '12' => 'Dec',
                                    ];
                                @endphp
                                <div class="form-group col-md-6">
                                    <label>Exp Date</label>
                                    <select class="form-control" name="expiration-month">
                                        @foreach ($months as $k => $v)
                                            <option value="{{ $k }}">{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Exp Year</label>
                                    <select class="form-control" name="expiration-year">
                                        @for ($i = date('Y'); $i <= date('Y') + 15; $i++)
                                            <option value="{{ $i }}">
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <button id='pay-btn' class="btn btn-success mt-3" type="submit"
                                style="margin-top: 20px; width: 100%;padding: 7px;">PAY $10</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

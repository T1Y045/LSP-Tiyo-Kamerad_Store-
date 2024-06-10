<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
              <h2 class="card-title">Payment</h2>
              <p class="card-text">Order ID: {{ $paymentInfo['orderId'] }}</p>
              <p class="card-text">Total Amount: Rp. <span id="totalAmount">{{ number_format($paymentInfo['totalAmount'], 2) }}</span></p>
            </div>
          
            <div class="card-body">
              <h3 class="card-title">Order Details</h3>
              <ul class="list-group list-group-flush">
                @foreach ($paymentInfo['orderDetails'] as $detail)
                @php
                  $discountedPrice = $detail->product->price;
                  if ($detail->product->discount) {
                    $discountedPrice = $detail->product->price - ($detail->product->price * ($detail->product->discount->percentage / 100));
                  }
                @endphp
                <li class="list-group-item d-flex align-items-center">
                  <img src="{{ $detail->product->image1_url }}" alt="{{ $detail->product->product_name }}" style="width: 100px; height: auto; margin-right: 20px;">
                  <div>
                    <strong>Product:</strong> {{ $detail->product->product_name }}<br>
                    <strong>Quantity:</strong> {{ $detail->quantity }}<br>
                    <strong>Subtotal:</strong> Rp. {{ number_format($discountedPrice * $detail->quantity, 2) }}
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>    
        <form action="{{ route('processPayment') }}" method="POST" id="payment-form">
            @csrf
            <div class="form-group">
                <label for="shipping_method">Shipping Method</label>
                <select class="form-control" id="shipping_method" name="shipping_method" required>
                    <option value="standard">Standard - Rp. 20,000</option>
                    <option value="express">Express - Rp. 50,000</option>
                </select>
            </div>
            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="cod">Cash on Delivery (COD)</option>
                    <option value="midtrans">Other..</option>
                </select>
            </div>
            <div class="form-group" style="display: none;" id="amount-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" value="{{ $paymentInfo['totalAmount'] }}" required>
            </div>
            <button type="submit" class="btn btn-primary" id="pay-button">Submit Payment</button>
        </form>
    
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    </div>
        
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var paymentMethodSelect = document.getElementById('payment_method');
            var payButton = document.getElementById('pay-button');
            var amountGroup = document.getElementById('amount-group');
            var shippingMethodSelect = document.getElementById('shipping_method');
            var totalAmountElement = document.getElementById('totalAmount');
            var amountInput = document.getElementById('amount');
            var baseAmount = {{ $paymentInfo['totalAmount'] }};
    
            function updateTotalAmount() {
                var shippingCost = 0;
                switch (shippingMethodSelect.value) {
                    case 'standard':
                        shippingCost = 20000;
                        break;
                    case 'express':
                        shippingCost = 50000;
                        break;
                }
                var totalAmount = baseAmount + shippingCost;
                totalAmountElement.textContent = totalAmount.toLocaleString('id-ID', { minimumFractionDigits: 2 });
                amountInput.value = totalAmount;
            }
    
            shippingMethodSelect.addEventListener('change', updateTotalAmount);
    
            paymentMethodSelect.addEventListener('change', function () {
                if (this.value === 'midtrans') {
                    payButton.textContent = 'Pay';
                    amountGroup.style.display = 'block';
                } else {
                    payButton.textContent = 'Submit Payment';
                    amountGroup.style.display = 'none';
                }
            });
    
            // Initial update
            updateTotalAmount();
    
            // Handle form submission
            document.getElementById('payment-form').addEventListener('submit', function (event) {
                if (paymentMethodSelect.value === 'midtrans') {
                    event.preventDefault();
    
                    // Get snap token from the backend
                    fetch('{{ route('processPayment') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            payment_method: 'midtrans',
                            amount: document.getElementById('amount').value,
                            snap_token: '{{ $snapToken }}'
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.snap_token) {
                            snap.pay(data.snap_token, {
                                onSuccess: function(result){
                                    // Save the payment to the database
                                    fetch('{{ route('processPayment') }}', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({
                                            order_id: '{{ $order->id }}',
                                            payment_method: 'other',
                                            amount: '{{ $paymentInfo['totalAmount'] }}'
                                        })
                                    })
                                    .then(() => {
                                        // Clear the cart from the session
                                        fetch('{{ route('success') }}', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            }
                                        }).then(() => {
                                            // Redirect to success page
                                            window.location.href = "{{ route('success') }}?order_id={{ $order->id }}";
                                        });
                                    });
                                },
                                onPending: function(result){
                                    console.log(result);
                                },
                                onError: function(result){
                                    console.log(result);
                                },
                                onClose: function(){
                                    console.log('customer closed the popup without finishing the payment');
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>

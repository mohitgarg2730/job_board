@extends('layouts.app')
@section('content')

<script src="https://js.stripe.com/v3/"></script>

<!-- Success and Error Messages -->
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Main Container -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-5 shadow-lg border-0">
                <div class="text-center">
                    <!-- Payment Title -->
                    <h3 class="mb-4 fw-bold">Complete Your Payment</h3>
                    <p class="text-muted mb-4">You're almost there! Please provide your payment details below.</p>
                </div>

                <!-- Plan Details -->
                <div class="mb-4 text-center bg-light p-3 rounded">
                    <h5 class="fw-bold">Plan Name: <span class="text-success">{{ $plan->plan_name }}</span></h5>
                    <h5 class="fw-bold">Total Price: <span class="text-primary">${{ number_format($price, 2) }}</span></h5>
                </div>

                <!-- Payment Form -->
                <form action="{{ url('payment/store/'.$user_id.'/'.$plan_id.'/'.$type) }}" method="POST" id="payment-form">
                    @csrf

                    <!-- Stripe Card Element -->
                    <div class="mb-3">
                        <label for="card-element" class="form-label fw-bold">Enter Your Card Details</label>
                        <div id="card-element" class="form-control p-3 border rounded"></div>
                        <div id="card-errors" class="mt-2 text-danger" role="alert"></div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="fas fa-lock me-2"></i> Secure Payment ${{ number_format($price, 2) }}
                        </button>
                    </div>
                </form>

                <!-- Footer Message -->
                <div class="text-center mt-4">
                    <small class="text-muted">By clicking 'Secure Payment', you agree to our <a href="#" class="text-decoration-none">Terms & Conditions</a>.</small>
                </div>

                <!-- Stripe Payment Script -->
                <script>
                    var stripe = Stripe("{{ config('services.stripe.key') }}");
                    var elements = stripe.elements();

                    var card = elements.create('card', {
                        hidePostalCode: true,
                        style: {
                            base: {
                                color: '#32325d',
                                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                                fontSmoothing: 'antialiased',
                                fontSize: '16px',
                                '::placeholder': {
                                    color: '#aab7c4'
                                }
                            },
                            invalid: {
                                color: '#fa755a',
                                iconColor: '#fa755a'
                            }
                        }
                    });
                    card.mount('#card-element');

                    card.on('change', function(event) {
                        var displayError = document.getElementById('card-errors');
                        if (event.error) {
                            displayError.textContent = event.error.message;
                        } else {
                            displayError.textContent = '';
                        }
                    });

                    var form = document.getElementById('payment-form');
                    form.addEventListener('submit', function(event) {
                        event.preventDefault();

                        stripe.createToken(card).then(function(result) {
                            if (result.error) {
                                var errorElement = document.getElementById('card-errors');
                                errorElement.textContent = result.error.message;
                            } else {
                                var hiddenInput = document.createElement('input');
                                hiddenInput.setAttribute('type', 'hidden');
                                hiddenInput.setAttribute('name', 'stripeToken');
                                hiddenInput.setAttribute('value', result.token.id);
                                form.appendChild(hiddenInput);

                                form.submit();
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>

@endsection

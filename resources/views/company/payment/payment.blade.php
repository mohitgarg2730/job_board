@extends('company.layouts.afterlogin')
<script src="https://js.stripe.com/v3/"></script>
@if (session('success'))
    <div>{{ session('success') }}</div>
@endif
@if (session('error'))
    <div>{{ session('error') }}</div>
@endif



@section('content')
    <div class="dashboard-content">

        <div class="dashboard-widg-bar d-block">
            <div class="row">

                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <!-- ============================== Price Box =================================== -->
                            <section>
                                <div class="container">
                                    <div class="row gx-4 gy-4">
                                        <div class="col-12">
                                            <form action="{{ route('company.payment.process', ['id' => $plan_id, 'type' => $type]) }}" method="POST" id="payment-form">
                                                @csrf
                                                <div id="card-element"></div>
                                                <button type="submit" class="btn btn-primary mt-3">Pay</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </section>
                            <!-- ============================== Price Box =================================== -->


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        var stripe = Stripe("{{ config('services.stripe.key') }}");
        var elements = stripe.elements();
        var card = elements.create('card');
        card.mount('#card-element');

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Show error in payment form
                } else {
                    // Insert the token ID into the form and submit
                    var tokenInput = document.createElement('input');
                    tokenInput.setAttribute('type', 'hidden');
                    tokenInput.setAttribute('name', 'stripeToken');
                    tokenInput.setAttribute('value', result.token.id);
                    form.appendChild(tokenInput);
                    form.submit();
                }
            });
        });
    </script>
@endsection

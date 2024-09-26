<!DOCTYPE html>
<html lang="en">
<head>
@include('livewire.home.css')
    <style>
        body {
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
            padding: 40px;
        }

        .payment-container {
            max-width: 450px;
            margin: 0 auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .payment-heading {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 8px;
            height: 45px;
        }

        .btn-pay {
            background-color: #007bff;
            color: white;
            border-radius: 8px;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            margin-top: 15px;
        }

        .btn-pay:hover {
            background-color: #0056b3;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .input-group input {
            border-radius: 8px;
        }

        .input-group .input-group-text {
            border-radius: 8px;
        }

        .card-details-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
    </style>
</head>
<body>
    
<div class="payment-container">
    <h1>Your Total amount is : LKR&nbsp;{{$net_total}}</h1>
    <div class="payment-heading">Payment Details</div>
    
    @if (Session::has('success'))
        <div class="alert alert-success text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif

    <form role="form" action="{{ route('stripe.post',$net_total) }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
        @csrf
        <div class="form-group">
            <label for="card-name" class="control-label">Name on Card</label>
            <input class="form-control" size="4" type="text" id="card-name">
        </div>

        <div class="form-group">
            <label for="card-number" class="control-label">Card Number</label>
            <input autocomplete='off' class="form-control card-number" size='20' type='text' id="card-number">
        </div>

        <div class="form-group card-details-row">
            <div>
                <label for="cvc" class="control-label">CVC</label>
                <input class="form-control card-cvc" placeholder='ex. 311' size='4' type='text' id="cvc">
            </div>
            <div>
                <label for="exp-month" class="control-label">Expiration Month</label>
                <input class="form-control card-expiry-month" placeholder='MM' size='2' type='text' id="exp-month">
            </div>
            <div>
                <label for="exp-year" class="control-label">Expiration Year</label>
                <input class="form-control card-expiry-year" placeholder='YYYY' size='4' type='text' id="exp-year">
            </div>
        </div>

        <button class="btn btn-pay" type="submit">Pay NowLKR&nbsp;{{$net_total}}</button>
    </form>
</div>

<script src="https://js.stripe.com/v2/"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                $inputs = $form.find('.required').find('input'),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error').removeClass('hide').find('.alert').text(response.error.message);
            } else {
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
</script>
</body>
</html>

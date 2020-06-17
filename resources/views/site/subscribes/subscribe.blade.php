@extends('site.app')

@section('content')

   <div class="container-fluid "><br>
     
    <div class="hero">
    <img src="{{ asset('img/image.png')}}" alt="" width="100%" height="400">
        <div class="hero-content">
        <h1 style="">Abonnement mensuel pros</h1>
            <h2>Hooray!</h2>
        </div>
    </div>
  </div>

        
   @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif

 <section class="container">
 
    <div class="card card-padded">
   <form action="{{ route('site.subscribes.post')}}" method="post" id="payment-form">
      @csrf

      {{-- subscription info --}}
        <div class="section-header">
            <h2>Subscription Info</h2>
        </div>

    <input type="hidden" name="stripe_token" id="stripe_token">
    <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    
                    <div class="subscription-option">
                        <input type="radio" id="plan-bronze" name="plan" value="bronze" checked>
                        <label for="plan-bronze">
                            <span class="plan-price">5 € <small>/mo</small></span>
                            <span class="plan-name">Bronze</span>
                        </label>
                    </div>

                </div>
                <div class="col-md-4">
                    
                    <div class="subscription-option">
                        <input type="radio" id="plan-silver" name="plan" value="silver">
                        <label for="plan-silver">
                            <span class="plan-price">10 €<small>/mo</small></span>
                            <span class="plan-name">Silver</span>
                        </label>
                    </div>

                </div>
                <div class="col-md-4">
                    
                    <div class="subscription-option">
                        <input type="radio" id="plan-gold" name="plan" value="gold">
                        <label for="plan-gold">
                            <span class="plan-price">15 €<small>/mo</small></span>
                            <span class="plan-name">Gold</span>
                        </label>
                    </div>

                </div>
            </div>
        </div>

        @if (Auth::guest())
        {{-- only show if not logged in --}}
        {{-- user info --}}
        <div class="section-header">
            <h2>User Info</h2>
        </div>

        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('first_name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}">

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('last_name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}">

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                      @endif
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('city') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
             
                        <div class="form-group row">
                                    <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                             <div class="col-md-6">
                                    <select id="country" class="form-control" name="country" required>
                                        <option> Choose...</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="France">France</option>
                                        <option value="United States" selected="">United States</option>
                                    </select>
                                </div>
                            </div>

       <!-- <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="first_name">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
        </div> -->

        {{-- credit card info --}}
        <div class="section-header">
            <h2>Credit Card Info</h2>
        </div>

  <div class="form-group">
    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div><br>
  <button class="btn btn-primary">Submit Payment</button>
   </div>

</form>
</div>
</section>
@endsection

@section('js')
<script src="https://js.stripe.com/v3/"></script>
<script>
  (function(){
// Create a Stripe client.
var stripe = Stripe('pk_test_B221brafzN6MMhwb9yB4SHNg');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
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
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
      $("#payment-form").submit();
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  var stripeToken = token.id;
  $("#stripe_token").val(stripeToken);
 
 }
  // Insert the token ID into the form so it gets submitted to the server
  /*var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
 //alert(token.id);
  form.submit();
}*/


  })();
</script>
@endsection
@extends('site.app')

@section('content')

<section class="container mt-4">
    <div class="card card-padded">

    @if(session('success'))
        <div class="alert alert-success">

        {{ session('success') }}
        </div>
    @endif

    @if(count($errors) > 0)
  <div class="alert alert-danger">
  @foreach($errors->all() as $error)
   <ul>
      <li>{{$error}}</li>
   </ul>
  @endforeach
  </div>
@endif
        <div class="section-header">
            <h2>Your subscription</h2>  <h5 style="text-align:right;" ><a href="{{ route('site.professionnels.index')}}"> Direction AdminPanel</a></h5>
        </div>

       
        {{-- check if user is on their grace period --}}
        @if ($user->subscription('main')->onGracePeriod())
            <div class="alert alert-danger text-center">
                You have cancelled your account.<br>
                You have access to Animgalgram until {{ $user->subscription('main')->ends_at->format('F d, Y') }}.
            </div>
        @endif

        @if(!$user->subscribed('main'))
         <div class="jumbotron text-center">
         <p>You don't have a subscription</p>
         <a href="{{ route('site.comptes.updateSubscription')}}" class="btn btn-success btn-lg">Créer votre abonnement</a>
         </div>
        @else
       <div class="row">
           <div class="col-sm-6">
               <div style="background-color:tomato;height:40px; color:#fff; margin-top:40px; text-align:center; font-size:20px;">
               <strong>Current: </strong>{{ $user->subscription('main')->stripe_plan }}
               </div>
           </div>

           <div class="col-sm-6">
               
                <h2>Update Subscription</h2>

                <form action="{{ route('site.comptes.updateSubscription')}}" method="POST">
                      @csrf 
                      
                        <div class="form-group">
                            <select name="plan" class="form-control">
                                <option value="bronze" 
                                    {{ ($user->onPlan('bronze')) ? 'selected' : '' }}>
                                    Bronze (€5/mois)
                                </option>
                                <option value="silver" 
                                    {{ ($user->onPlan('silver')) ? 'selected' : '' }}>
                                    Silver (€10/mois)
                                </option>
                                <option value="gold" 
                                    {{ ($user->onPlan('gold')) ? 'selected' : '' }}>
                                    Gold (€15/mois)
                                </option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ $user->subscription('main')->onGracePeriod() ? 'Reactivate' : 'Update Plan' }}
                        </button>
                    </form>

           </div>
       </div>

        @endif

        <div class="section-header">
            <h2>Update your card</h2>
            <form action="{{ route('site.comptes.updateCard')}}" method="post" id="payment-form">
              @csrf
              <input type="hidden" name="stripe_token" id="stripe_token">
            <div class="form-group">
                <label for="card-element" style="font-size:20px;font-weight:bold;color:red;">
                Credit or debit card
                </label>
                <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div><br>

              <button class="btn btn-primary">Update Card</button>
    
         </form>
        </div>

        <div class="section-header">
            <h2>Billing Hystory</h2>
        </div>
        @if(count($invoices) > 0)
          <table class="table table-bordered table-striped table-hover">
               @foreach($invoices as $invoice)
                 <tr>
                     <td> {{ $invoice->date()->toFormattedDateString() }}</td>
                     <td>{{ $invoice->total() }}</td>
                     <td style="margin-right:100px;">
                     <a href="{{ route('site.comptes.invoice', $invoice->id) }}" class="btn btn-primary btn-sm">Dowload</a>
                     </td>
                 </tr>
               @endforeach
          </table>

        @else
        <div class="jumbotron text-center">
             <p>No Billing History</p>
        </div>

        @endif

        <div class="section-header">
            <h2>Delete subscription</h2>
        </div>
        <form action="{{ route('site.comptes.deleteSubscription')}}" method="post" class="text-right">
                @csrf
        <input type="hidden" name="_method" value="DELETE"> 
       <button type="submit" class="btn btn-danger">Delete subscription</button>
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
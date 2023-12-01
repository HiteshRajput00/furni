@extends('furni.structure.main_layout')
@section('content')
<div class="container">


 
    <script src="https://js.stripe.com/v3/"></script>

  
    <form id="payment-form">
        <input type="hidden" id="client-secret" name="client-secret" value="{{ $clientsecret }}">
        <input type="hidden" name="orderid" value="{{ $ordernum }}" >
     
       
    </form>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   

   var stripe = Stripe(
            'pk_test_51O7AYgSIRjlSt6h3GKjXiN4vqP0Strd7vltj5qFHdb4eN8URJPGUNPbD00jwI1XiFyoMe50cPWN8lpnIs5AIOgVf002gg6Hlla'
        );


    var clientSecret = document.getElementById('client-secret').value;
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var id = $('input[name="orderid"]').attr('value');
  
   
    stripe.handleCardPayment(clientSecret).then(function(result) {
        if (result.error) {
       
        } else {
            // window.location.href = '/payment-success' + id;
         
    }});
    
    
</script>
@endsection
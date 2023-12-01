@extends('furni.structure.main_layout')
@section('content')
    <div class="untree_co-section">
        <div class="container">


            <form action="/paymentprocess" id="mainform" method="POST" >
             @csrf
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <h2 class="h3 mb-3 text-black">Billing Details</h2>
                        <div class="p-3 p-lg-5 border bg-white">
                            @if ($address->isEmpty())
                                <div class="form-group">
                                    <label for="c_country" class="text-black">Country <span
                                            class="text-danger">*</span></label>
                                    <select id="c_country" class="form-control">

                                        <option value="BHARAT">BHARAT</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">First Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_fname" name="fname">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="c_lname" class="text-black">Last Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_lname" name="lname">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="c_companyname" class="text-black">Company Name </label>
                                        <input type="text" class="form-control" id="companyname" name="c_companyname">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="c_address" class="text-black">Address <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_address" name="address"
                                            placeholder="Street address">
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="house"
                                        placeholder="Apartment, suite, unit etc. (optional)">
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_state_country" class="text-black">State / Country <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_state_country" name="statecountry">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="c_postal_zip" class="text-black">Posta / Zip <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="zip" name="zip">
                                    </div>
                                </div>

                                <div class="form-group row mb-5">
                                    <div class="col-md-6">
                                        <label for="c_email_address" class="text-black">Email Address <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_email_address" name="email">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="c_phone" class="text-black">Phone <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_phone" name="phone"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                            @else
                                @foreach ($address as $addr)
                                    <div class="form-group">
                                        <label for="test1" class="text-black" data-bs-toggle="collapse"
                                            href="#{{ $addr->companyname }}" role="button" aria-expanded="false"
                                            aria-controls="{{ $addr->companyname }}"><input type="radio"
                                                value="{{ $addr->id }}" name="Useraddress" id="test1"><strong
                                                style="font-size: 22px">
                                                {{ $addr->companyname }}
                                                &nbsp;{{ $addr->street }},houseNO. {{ $addr->houseNO }}</strong></label>
                                        <div class="collapse" id="{{ $addr->companyname }}">
                                            <div class="py-2">

                                                <div class="form-group">
                                                    <label for="c_country" class="text-black">Country <span
                                                            class="text-danger">*</span></label>
                                                    <select id="c_country" class="form-control">

                                                        <option value="BHARAT">BHARAT</option>
                                                    </select>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="c_fname" class="text-black">First Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="c_fname"
                                                            value="{{ $addr->fname }}" name="fname">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="c_lname" class="text-black">Last Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="c_lname"
                                                            value="{{ $addr->lname }}" name="lname">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="c_companyname" class="text-black">Company Name
                                                        </label>
                                                        <input type="text" class="form-control" id="companyname"
                                                            value="{{ $addr->companyname }}" name="c_companyname">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="c_address" class="text-black">Address <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="c_address"
                                                            value="{{ $addr->street }}" name="address"
                                                            placeholder="Street address">
                                                    </div>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <input type="text" class="form-control" name="house"
                                                        value="{{ $addr->statecountry }}"
                                                        placeholder="Apartment, suite, unit etc. (optional)">
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="c_state_country" class="text-black">State / Country
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="c_state_country"
                                                            value="{{ $addr->statecountry }}" name="statecountry">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="c_postal_zip" class="text-black">Posta / Zip <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="zip"
                                                            value="{{ $addr->zip }}" name="zip">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-5">
                                                    <div class="col-md-6">
                                                        <label for="c_email_address" class="text-black">Email Address
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="c_email_address"
                                                            value="{{ $addr->email }}" name="email">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="c_phone" class="text-black">Phone <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="c_phone"
                                                            value="{{ $addr->number }}" name="phone"
                                                            placeholder="Phone Number">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <br>

                                <div class="form-group">
                                    <label for="test2" class="text-black" data-bs-toggle="collapse"
                                        href="#ship_different_address" role="button" aria-expanded="false"
                                        aria-controls="ship_different_address"><input type="radio" name="Useraddress"
                                            value="" id="test2"> <strong style="font-size: 22px">Deliver To
                                            A Different Address?</strong></label>
                                    <div class="collapse" id="ship_different_address">
                                        <div class="py-2">

                                            <div class="form-group">
                                                <label for="c_country" class="text-black">Country <span
                                                        class="text-danger">*</span></label>
                                                <select id="c_country" name="country" class="form-control">

                                                    <option value="BHARAT">BHARAT</option>
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="c_fname" class="text-black">First Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="c_fname"
                                                        name="fname">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="c_lname" class="text-black">Last Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="c_lname"
                                                        name="lname">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="c_companyname" class="text-black">Company Name </label>
                                                    <input type="text" class="form-control" id="companyname"
                                                        name="c_companyname">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="c_address" class="text-black">Address <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="c_address"
                                                        name="address" placeholder="Street address">
                                                </div>
                                            </div>

                                            <div class="form-group mt-3">
                                                <input type="text" class="form-control" name="house"
                                                    placeholder="Apartment, suite, unit etc. (optional)">
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="c_state_country" class="text-black">State / Country <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="c_state_country"
                                                        name="statecountry">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="c_postal_zip" class="text-black">Posta / Zip <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="zip"
                                                        name="zip">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-5">
                                                <div class="col-md-6">
                                                    <label for="c_email_address" class="text-black">Email Address <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="c_email_address"
                                                        name="email">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="c_phone" class="text-black">Phone <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="c_phone"
                                                        name="phone" placeholder="Phone Number">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="text text-danger">
                                @error('Useraddress')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="text text-danger">
                                @error('fname')
                                    {{ $message }}
                                @enderror
                            </div>

                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                                <div id="mainform" class="p-3 p-lg-5 border bg-white">

                                    <label for="c_code" class="text-black mb-3">Select your coupon </label>

                                    <div class="input-group w-75 couponcode-wrap">
                                        <select class="form-select" aria-label="Default select example" id="input"
                                            name="code">
                                            <option value="" selected> select coupon</option>
                                            @if ($coupons)
                                                @foreach ($coupons as $c)
                                                    <?php  $order = App\Models\Order::Class::where('Coupon',$c->code)->where('userID',Auth::user()->id)->get(); ?>
                                                    @if ($order->isEmpty())
                                                        <option value="{{ $c->id }}"> {{ $c->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div id="btndiv" class="input-group-append">
                                        <a id="submitButton" class="btn btn-black">Apply</a>
                                        <a id="remove" style="display: none" class="btn btn-black">x </a>

                                    </div>
                                    <div id="btndiv" class="input-group-append">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Your Order</h2>
                                <div class="p-3 p-lg-5 border bg-white">

                                    <table class="table site-block-order-table mb-5">
                                        <thead>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </thead>
                                        <tbody>
                                            @if ($carts->isEmpty())
                                            @else
                                                @foreach ($carts as $cart)
                                                    <tr>
                                                        <td>{{ $cart->products->product }} <strong
                                                                class="mx-2">x</strong>
                                                            {{ $cart->quantity }}</td>
                                                        <?php $data[] = $cart->variations->price * $cart->quantity; ?>
                                                        <td>${{ $cart->variations->price * $cart->quantity }}</td>
                                                    </tr>
                                                    <input type="hidden" id="product" name="cartsproduct[]"
                                                        value="{{ $cart->productID }}">
                                                    <input type="hidden" id="variation" name="productvariation[]"
                                                        value="{{ $cart->variationID }}">
                                                    <input type="hidden" id="variation_qty" name="variation_qty[]"
                                                        value="{{ $cart->quantity }}">
                                                @endforeach
                                                <input type="hidden" id="subtotal" name="subtotal"
                                                    value="{{ array_sum($data) }}">
                                            @endif
                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong>
                                                </td>
                                                <td id="total" class="text-black">{{ $total }} </td>

                                            </tr>
                                            <tr>
                                                <td id="after" class="text-black font-weight-bold">
                                                </td>
                                                <td id="discount" class="text-black"></td>
                                            </tr>
                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>Order Total</strong>
                                                </td>
                                                <td class="text-black font-weight-bold">
                                                    <strong id="final">${{ $total }}</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>



                                    <input type="hidden" id="inputtotal" name="total" value="{{ $total }}">


                                    <div class="border p-3 mb-5">
                                        <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse"
                                                href="#collapseCard" role="button" aria-expanded="false"
                                                aria-controls="collapseCard">By Card</a>
                                        </h3>
                                        <div class="collapse" id="collapseCard">
                                            <br>
                                           
                                            <div class="form-group">

                                                <label for="card-element">Card Details</label>
                                                <div id="card-element" class="form-control">
                                                    <div class="col-md-6">

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-black btn-lg py-3 btn-block" type="submit" id="submit-payment" >Place Order</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $(document).ready(function() {
            const totalprice = document.getElementById('total');
            var productPrice = totalprice.textContent;
            $('#submitButton').on('click', function() {
                var coupon = $("#input option:selected").val();
                // var coupon = $(this).val();
                if (coupon === '') {
                    $('#after').text("");
                    $('#discount').text('');
                    $('#final').text(productPrice);
                    $('#inputtotal').val(productPrice);
                } else {
                    var offer = <?php echo json_encode($discount); ?>[coupon];
                    var dis = offer / 100 * productPrice;
                    const discountedPrice = productPrice - dis;
                    $('#after').text("after discount");
                    $('#discount').text(discountedPrice);
                    $('#final').text(discountedPrice);
                    $('#inputtotal').val(discountedPrice);
                    document.getElementById("remove").style.display = '';
                    $('#submitButton').hide();
                }

            });
        });

        $(document).ready(function() {
            const totalprice = document.getElementById('total');
            var productPrice = totalprice.textContent;
            $('#remove').on('click', function() {
                var coupon = $("#input option:selected").val();
                coupon.selectedIndex = 0;
                $('#after').text("");
                $('#discount').text('');
                $('#final').text(productPrice);
                $('#inputtotal').val(productPrice);
                document.getElementById("submitButton").style.display = '';
                $('#remove').hide();
            });
        });

        /////////////////////// stripe function ///////////////////////////////////////////////
        var stripe = Stripe(
            'pk_test_51O7AYgSIRjlSt6h3GKjXiN4vqP0Strd7vltj5qFHdb4eN8URJPGUNPbD00jwI1XiFyoMe50cPWN8lpnIs5AIOgVf002gg6Hlla'
        );
        var elements = stripe.elements();
        var cardElement = elements.create('card');

        cardElement.mount('#card-element');

        ////////////// generating payment method id ////////////////////////////////////////
        document.getElementById('submit-payment').addEventListener('click', function(event) {
            event.preventDefault();
            const name = document.getElementById('c_fname');
            const zip = document.getElementById('zip');
            const home = document.getElementById('c_address');
            const state = document.getElementById('c_state_country');
            const country = document.getElementById('c_country');
            // Create a Payment Method using Stripe.js
            stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
                billing_details: {
                    name: name,
                    address: {
                        line1: home,
                        state: state,
                        postal_code: zip,
                        country: country
                    }
                }
            }).then(function(result) {
                if (result.error) {

                    alert(result.error.message);
                } else {
                    //   alert(result.paymentMethod.name);
                    var paymentMethodId = result.paymentMethod.id;
                    var form = document.getElementById('mainform');
                    let data = document.createElement('input')
                    data.setAttribute('type', 'hidden')
                    data.setAttribute('name', 'token')
                    data.setAttribute('value', paymentMethodId);
                    form.appendChild(data)
                    form.submit();

                }
            });
        });

        ////////////////// session payment /////////////////////////////
    //     var stripe = Stripe(
    //         'pk_test_51O7AYgSIRjlSt6h3GKjXiN4vqP0Strd7vltj5qFHdb4eN8URJPGUNPbD00jwI1XiFyoMe50cPWN8lpnIs5AIOgVf002gg6Hlla'
    //     );
    //     document.getElementById('submit-payment').addEventListener('click', function () {
    //         var inputValue = $('#inputtotal').val();
    //         // const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
    //     fetch('/checkout-process', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    //         },
    //         body: JSON.stringify({
    //            price : inputValue
    //         }),
    //     })
    //     .then(response => response.json())
    //     .then(session => {
    //         return stripe.redirectToCheckout({ sessionId: session.id });
    //     })
    //     .then(result => {
    //         // Handle the result
    //     })
    //     .catch(error => {
    //         console.error('Error:', error);
    //     });
    // });
    </script>
@endsection

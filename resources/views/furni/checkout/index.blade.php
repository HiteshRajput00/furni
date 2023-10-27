@extends('furni.structure.main_layout')
@section('content')
    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="border p-4 rounded" role="alert">
                        Returning customer? <a href="/furni/login">Click here</a> to login
                    </div>
                </div>
            </div>
           
            <form method="post" action="/billingdetails">
                @if($address->isEmpty())
                @else
                @foreach ($address as $addr )
                <div class="purchase_wreap" style="border: 2px solid black">
                <div class="purchase_hd" >
                    <input type="radio" id="test2" name="radio-group" value="{{ $addr->id }}" />
                    <label for="test2">
                        <div>
                            <h6 style="display: inline">{{ $addr->companyname }}</h6>
                            <p>{{ $addr->street }},houseNO.  {{ $addr->houseNO }}</p>
                        </div>
                        
                    </label>
                </div>
                </div>
                @endforeach
                @endif
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <h2 class="h3 mb-3 text-black">Billing Details</h2>
                        <div class="p-3 p-lg-5 border bg-white">
                            <div class="form-group">
                                <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
                                <select id="c_country" class="form-control">
                                    {{-- <option value="1">Select a country</option> --}}
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

                            {{-- <div class="form-group">
                        <label for="c_create_account" class="text-black" data-bs-toggle="collapse"
                            href="#create_an_account" role="button" aria-expanded="false"
                            aria-controls="create_an_account"><input type="checkbox" value="1"
                                id="c_create_account"> Create an account?</label>
                        <div class="collapse" id="create_an_account">
                            <div class="py-2 mb-4">
                                <p class="mb-3">Create an account by entering the information below. If you are a
                                    returning customer please login at the top of the page.</p>
                                <div class="form-group">
                                    <label for="c_account_password" class="text-black">Account Password</label>
                                    <input type="email" class="form-control" id="c_account_password"
                                        name="c_account_password" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="c_ship_different_address" class="text-black" data-bs-toggle="collapse"
                            href="#ship_different_address" role="button" aria-expanded="false"
                            aria-controls="ship_different_address"><input type="checkbox" value="1"
                                id="c_ship_different_address"> Ship To A Different Address?</label>
                        <div class="collapse" id="ship_different_address">
                            <div class="py-2"> --}}

                            {{-- <div class="form-group">
                                    <label for="c_diff_country" class="text-black">Country <span
                                            class="text-danger">*</span></label>
                                    <select id="c_diff_country" class="form-control">
                                        <option value="1">Select a country</option>
                                        <option value="2">bangladesh</option>
                                        <option value="3">Algeria</option>
                                        <option value="4">Afghanistan</option>
                                        <option value="5">Ghana</option>
                                        <option value="6">Albania</option>
                                        <option value="7">Bahrain</option>
                                        <option value="8">Colombia</option>
                                        <option value="9">Dominican Republic</option>
                                    </select>
                                </div>


                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_diff_fname" class="text-black">First Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_diff_fname"
                                            name="c_diff_fname">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="c_diff_lname" class="text-black">Last Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_diff_lname"
                                            name="c_diff_lname">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="c_diff_companyname" class="text-black">Company Name </label>
                                        <input type="text" class="form-control" id="c_diff_companyname"
                                            name="c_diff_companyname">
                                    </div>
                                </div>

                                <div class="form-group row  mb-3">
                                    <div class="col-md-12">
                                        <label for="c_diff_address" class="text-black">Address <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_diff_address"
                                            name="c_diff_address" placeholder="Street address">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        placeholder="Apartment, suite, unit etc. (optional)">
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_diff_state_country" class="text-black">State / Country <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_diff_state_country"
                                            name="c_diff_state_country">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="c_diff_postal_zip" class="text-black">Posta / Zip <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_diff_postal_zip"
                                            name="c_diff_postal_zip">
                                    </div>
                                </div>

                                <div class="form-group row mb-5">
                                    <div class="col-md-6">
                                        <label for="c_diff_email_address" class="text-black">Email Address <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_diff_email_address"
                                            name="c_diff_email_address">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="c_diff_phone" class="text-black">Phone <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_diff_phone"
                                            name="c_diff_phone" placeholder="Phone Number">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div> --}}

                            {{-- <div class="form-group">
                        <label for="c_order_notes" class="text-black">Order Notes</label>
                        <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                            placeholder="Write your notes here..."></textarea>
                    </div> --}}

                        </div>
                    </div>
                    <div class="col-md-6">
                        {{-- <form id="mainform"> --}}
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                                <div id="mainform" class="p-3 p-lg-5 border bg-white">

                                    <label for="c_code" class="text-black mb-3">Enter your coupon code if you have
                                        one</label>


                                    <div class="input-group w-75 couponcode-wrap">
                                        <select class="form-select" aria-label="Default select example" id="input"
                                            name="code">
                                            <option value="" selected> select coupon</option>
                                            @foreach ($coupons as $c)
                                                <option value="{{ $c->id }}"> {{ $c->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="btndiv" class="input-group-append">
                                        <a id="submitButton"  class="btn btn-black">Apply</a>
                                        
                                    </div>
                                    <div id="btndiv" class="input-group-append">
                                        <a id="remove" style="display: none" class="btn">x </a>
                                     </div>

                                </div>
                            </div>
                            {{-- </form> --}}
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
                                            @foreach ($carts as $cart)
                                                <tr>
                                                    <td>{{ $cart->products->product }} <strong class="mx-2">x</strong>
                                                        {{ $cart->quantity }}</td>
                                                    <?php $data[] = $cart->variations->price * $cart->quantity; ?>
                                                    <td>${{ $cart->variations->price * $cart->quantity }}</td>
                                                </tr>
                                                <input type="hidden" id="product" name="cartsproduct[]"
                                                value="{{ $cart->productID }}">
                                            @endforeach
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


                                    <input type="hidden" id="subtotal" name="subtotal"
                                        value="{{ array_sum($data) }}">
                                        <input type="hidden" id="inputtotal" name="total"
                                        value="{{ $total }}">



                                    <div class="border p-3 mb-3">
                                        <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse"
                                                href="#collapsebank" role="button" aria-expanded="false"
                                                aria-controls="collapsebank">Direct Bank
                                                Transfer</a></h3>

                                        <div class="collapse" id="collapsebank">
                                            <div class="py-2">
                                                <p class="mb-0">Make your payment directly into our bank account. Please
                                                    use
                                                    your Order ID as the payment reference. Your order won’t be shipped
                                                    until
                                                    the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border p-3 mb-3">
                                        <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse"
                                                href="#collapsecheque" role="button" aria-expanded="false"
                                                aria-controls="collapsecheque">Cheque
                                                Payment</a></h3>

                                        <div class="collapse" id="collapsecheque">
                                            <div class="py-2">
                                                <p class="mb-0">Make your payment directly into our bank account. Please
                                                    use
                                                    your Order ID as the payment reference. Your order won’t be shipped
                                                    until
                                                    the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border p-3 mb-5">
                                        <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse"
                                                href="#collapsepaypal" role="button" aria-expanded="false"
                                                aria-controls="collapsepaypal">Paypal</a>
                                        </h3>
                                        <div class="collapse" id="collapsepaypal">
                                            <div class="py-2">
                                                <p class="mb-0">Make your payment directly into our bank account. Please
                                                    use
                                                    your Order ID as the payment reference. Your order won’t be shipped
                                                    until
                                                    the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-black btn-lg py-3 btn-block"
                                            onclick="window.location='/thankyou'">Place Order</button>
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
                    document.getElementById("remove").style.display='block';
                    
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
                    document.getElementById("submitButton").style.display='block';
                    $('#remove').hide();
            });
        });

     

    </script>
@endsection

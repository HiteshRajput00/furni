
@extends('furni.structure.main_layout')
@section('content')

<div class="untree_co-section before-footer-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($carts->isEmpty())
                            @else
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ url('/upload/' . $cart->variations->image) }}"alt="Image"
                                                class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{ $cart->products->product }} </h2>
                                            <a class="btn btn-light"
                                                href="{{ route('product', ['id' => $cart->productID]) }}">More</a>
                                        </td>
                                        <td>{{ $cart->variations->price }}</td>
                                        <td>
                                            <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                                style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    {{-- <button class="btn btn-outline-black decrease" type="button">&minus;</button> --}}
                                                </div>
                                                <input type="text" class="form-control text-center quantity-amount"
                                                    value="{{ $cart->quantity }}" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1">
                                                <div class="input-group-append">
                                                    {{-- <button class="btn btn-outline-black increase" type="button">&plus;</button> --}}
                                                </div>
                                            </div>
                                        </td>
                                        {{-- {{ $p[] = $cart->variations->price * $cart->quantity }} --}}
                                        <td>{{ $cart->variations->price * $cart->quantity }}</td>
                                        <td><a href="{{ route('delcart', ['Cid' => $cart->id]) }}"
                                                class="btn btn-black btn-sm">X</a></td>
                                    </tr>
                                @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <button class="btn btn-black btn-sm btn-block">Update Cart</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-outline-black btn-sm btn-block">Continue Shopping</button>
                    </div>
                </div>
                <form id="mainform">
                    {{-- @csrf --}}
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <label class="text-black h4" id="code">Coupon</label>
                            <p>Enter your coupon code if you have one.</p> --}}
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0">
                            {{-- <input type="text" id="input" name="code" class="form-control py-3" id="coupon"
                                placeholder="Coupon Code"> --}}
                            {{-- <select class="form-select" aria-label="Default select example" id="input"
                                name="code">
                                {{-- <option value="" selected> select coupon</option>
                                @foreach ($coupon as $c)
                                    <option value="{{ $c->id }}"> {{ $c->name }}
                                    </option>
                                @endforeach --}}
                            {{-- </select> --}} 
                        </div>
                        <div class="col-md-4">
                            {{-- <button type="submit" id="submitButton" class="btn btn-black">Apply Coupon</button> --}}
                        </div>
                    </div>
            </div>
            </form>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <span class="text-black">Subtotal</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong id="total" class="text-black"> {{ $total }}</strong>
                                {{-- <strong class="text-black"> {{session('discount')}}</strong> --}}
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Total</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong id="total" class="text-black">{{ $total }}</strong>
                                {{-- <strong class="text-black"> {{session('discount')}}</strong> --}}
                            </div>
                        </div>
                        {{-- @endif --}}
                        <div class="row">
                            <div class="col-md-12">
                                @if($carts->isEmpty())
                                <button class="btn btn-black btn-lg py-3 btn-block"
                                    onclick="window.location='{{ route('shop') }}'">Proceed To Checkout</button>
                                    @else
                                    <button class="btn btn-black btn-lg py-3 btn-block"
                                    onclick="window.location='{{ route('checkout') }}'">Proceed To Checkout</button>
                               
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('furni.structure.main_layout')
@section('content')
    <div class="product-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="mb-4 section-title">Crafted with excellent material.</h2>
                    <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                        vulputate velit imperdiet dolor tempor tristique. </p>
                    <p><a href="/shop" class="btn">Explore</a></p>
                </div>
                <!-- Start Column 2 -->
              
                <div class="product-section">
                    <div class="container">
                       
                            <div class="row">
                                @foreach ($products as $product)
                                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                                    <a class="product-item" href="{{ route('product', ['id' => $product->id]) }}">
                                        <img src="{{ asset('/upload/' . $product->image) }}"
                                            class="img-fluid product-thumbnail" height="500px" width="500px">
                                        <h3 class="product-title">{{ $product->product }}</h3>
                                        <h3 class="product-title">{{ $product->price }}</h3>
                                        <span class="icon-cross">
                                            <img src="{{ url('/asset/images/cross.svg') }}" class="img-fluid">
                                        </span>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

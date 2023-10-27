@extends('furni.structure.main_layout')
@section('content')
    <!-- Start Product Section -->
    <div class="product-section" id="page-container">
        <div class="container">
            <div class="row">
                <br>
                <!-- Start Column 2 -->
                @foreach ($cats as $cat)
                    <?php $products = DB::table('products')
                        ->where('categoryID', $cat->id)
                        ->join('variations', 'productID', '=', 'products.id')
                        ->select('products.id', 'product', 'variations.image', 'variations.price')
                        ->get(); ?>
                     <br>
                    <div class="row">
                        <br>
                        <span>
                            <button id="" type="button" class="btn btn-primary">{{ $cat->furnituretype }}</button>
                        </span>
                        <br>
                        
                        <br>
                        @foreach ($products as $product)
                            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                                <br>
                                <a class="product-item" href="{{ route('product', ['id' => $product->id]) }}">
                                    <img src="{{ asset('/upload/' . $product->image) }}" class="img-fluid product-thumbnail"
                                        height="500px" width="500px">
                                    <h3 class="product-title">{{ $product->product }}</h3>
                                    <h3 class="product-title">{{ $product->price }}</h3>
                                    <span class="icon-cross">
                                        <button id="" type="button"><img
                                                src="{{ url('/asset/images/cross.svg') }}" class="img-fluid"></button>
                                    </span>
                                </a>
                                <a> <i class="far fa-bookmark"></i></a>
                            </div>
                        @endforeach
                        <br>
                        <hr>
                        <br>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

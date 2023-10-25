@include('furni.structure.header')
<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Shop</h1>
                </div>
            </div>
            <div class="col-lg-7">
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->
<!-- Start Product Section -->
<div class="product-section" id="page-container">
    <div class="container">
        <div class="row">
            <!-- Start Column 2 -->
            @foreach ($cats as $cat)
                {{ $products = DB::table('products')->where('categoryID', $cat->id)->join('variations', 'productID', '=', 'products.id')->select('products.id', 'product', 'variations.image', 'variations.price')->get() }}

                <div class="row">
                    <br>
                    <span>
                        <button id="" type="button"
                            class="btn btn-primary">{{ $cat->furnituretype }}</button></span>
                    <br>
                    @foreach ($products as $product)
                        <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                            <br>
                            <hr>
                            {{ $id = $product->id }}
                            {{-- {{$url=url(route( 'product',['id'=>$product->id])) }} --}}
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

                            {{-- <a id="cartlink" class="cart" data-product-id="{{ $product->id }}"><i  class="far fa-bookmark"></i></a> --}}
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
{{-- <script> 
$(document).ready(function() {
$('#add-to-wishlist').click(function () {
    var productId = $(this).data('product-id');
    $.ajax({
        url: '/wishlist',
		type: 'GET',
        data: { product_id: productId },
        success: function (response) {
			alert(response.message)
        },
        	error: function(xhr, status, error) {
        console.log('Ajax request failed');
        console.log('Status:', status);
        console.log('Error:', error);
    }
    });
});
});
</script> --}}

<!-- End Product Section -->
@include('furni.structure.footer')

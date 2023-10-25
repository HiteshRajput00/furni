@include('furni.structure.header')

<!-- Start Product Section -->
<div class="product-section">
	<div class="container">
		<div class="row">
			<!-- Start Column 2 -->
			<div class="row">
			<br>
			<span>
			<a href="#" class="btn btn-primary"> </a></span>
			<br>
			    @foreach ($products as $product )
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<br><hr>
						<a class="product-item" href="{{ route('product', ['id' => $product->id]) }}">
							 <img src="{{asset('/upload/'.$product->image)}}" class="img-fluid product-thumbnail" height="500px" width="500px"> 
							<h3 class="product-title">{{$product->product}}</h3>
							<h3 class="product-title">{{$product->price}}</h3>
							<span class="icon-cross">
								<img src="{{url('/asset/images/cross.svg')}}" class="img-fluid">
							</span>
						</a>
						</div>
						@endforeach
					</div>
					@foreach ($result as $res )
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<br><hr>
						<a class="product-item" href="{{ route('product', ['id' => $res->id]) }}">
							 <img src="{{asset('/upload/'.$res->image)}}" class="img-fluid product-thumbnail" height="500px" width="500px"> 
							<h3 class="product-title">{{$res->product}}</h3>
							<h3 class="product-title">{{$res->price}}</h3>
							<span class="icon-cross">
								<img src="{{url('/asset/images/cross.svg')}}" class="img-fluid">
							</span>
						</a>
						</div>
						@endforeach
					</div>
				
		</div>
	</div>
</div>
@include('furni.structure.footer')
@extends('furni.structure.main_layout')
@section('content')
    @foreach ($var as $v)
        <section style="background-color: hsl(150, 27%, 96%);">
            <div class="container py-5">
                <div class="row">
                    <div class="col">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="{{ asset('/upload/' . $v->image) }}" class=" img-fluid" style="width: 150px;">
                                <h5 class="my-3"></h5>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                       

                                        <h4>{{ $products->product }}</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </table>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p style="color: black" class="mb-0">Price:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $v->price }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p style="color: black" class="mb-0">colour:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $v->colour->colour }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p style="color: black" class="mb-0">Material:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $v->material->type }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p style="color: black" class="mb-0">size:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $v->size }}</p>

                                    </div>
                                </div>
                                {{ session(['productID' => $products->id]) }}
                                <hr>
                                @if ($v->stock === 0)
                                    <h4>sorry this is unavilable</h4>
                                @else
                                    @if (Auth::user())
                                        <a class="btn" id="load-page-button"
                                            href="{{ route('shop.addcart', ['id' => $v->id]) }}">add to cart</a>
                                        <hr>
                                       <?php $wishlist = App\Models\Wishlist::class::where('variationID', $v->id)
                                       ->where('userID', Auth::user()->id)->get();?>
                                        @if ($wishlist->isEmpty())
                                            <button type="button" class="load-button" data-status="add"
                                                data-id="{{ $v->id }}"><img height="30px" width="30px"
                                                    id="{{ $v->id }}" src="{{ url('/asset/images/love.png') }}"></button>
                                        @else
                                            <button type="button" class="remove" data-status="remove"
                                                data-id="{{ $v->id }}"><img height="30px" width="30px"
                                                    id="{{ $v->id }}" src="{{ url('/asset/images/filllove.png') }}"></button>
                                        @endif
                                    @else
                                        <a class="btn" id="load-page-button" href="/furni/login">add to cart</a>
                                        <hr>
                                        <a id="load-page-button" href="/furni/login"><img height="30px" width="30px"
                                                id="{{ $v->id }}" src="{{ url('/asset/images/love.png') }}"></a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    <div id="ajax-content"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.load-button').on('click', function() {
                // e.preventDefault();
                var ID = $(this).data("id");
                const img = document.getElementById(ID);
                var status = $(this).data("status");
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('addwishlist') }}",
                    type: 'POST',
                    data: {
                        productid: ID,
                        status: status,
                        _token: csrfToken,
                    },
                    dataType: 'json',
                    success: function(data) {
                     
                        img.src= data.img;
                        // $("#load-button").attr('',data.btn)
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });

            });
        });

        $(document).ready(function() {
            $('.remove').on('click', function() {
                var ID = $(this).data("id");
                const img = document.getElementById(ID);
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('removewishlist') }}",
                    type: 'POST',
                    data: {
                        productid: ID,
                        _token: csrfToken,
                    },
                    dataType: 'json',
                    success: function(data) {
                       
                        img.src= data.img;
                        // $("#remove").attr('id',data.btn)
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection

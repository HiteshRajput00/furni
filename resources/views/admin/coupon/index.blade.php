@extends('admin.structure.master_layout')
@section('content')
    <div class="login-form-bg h-100 ">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-11">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <a class="text-center" href="/home">
                                <h2>Add Coupon</h2>
                            </a>
                            <br><br>
                            <div>
                                <h2> </h2>
                                <br><br>
                            </div>
                            <!--form 1 start-->
                            <div>
                                <form id="mainform" method="post" action="/savecoupon" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="enter coupon name"
                                            name="couponname" value="{{ old('couponname') }}" required>
                                    </div>
                                   
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="enter coupon code"
                                            name="couponcode" value="{{ old('couponcode') }}" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="material" id="">product type:</label>
                                        <select class="form-select" aria-label="Default select example" id="ptype"
                                            name="type">
                                            <option selected> select type</option>
                                            <option value="fixed"> fixed</option>
                                            <option value="discount"> discount</option>
                                        </select>
                                    </div>

                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="enter value" name="value"
                                            required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="expiredate" required>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="material" id="">product type:</label>
                                        <select class="form-select" aria-label="Default select example" id="ptype"
                                            name="status">
                                            <option selected> select status</option>
                                            <option value="1">auto expire</option>
                                            <option value="2"> by admin</option>
                                        </select>
                                    </div>
                                    <br>

                                    <button class="btn login-form__btn submit w-100" type="submit"
                                        name="save">add</button>


                                </form>
                                <br>
                         
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                               
                                <th scope="col">Sno.</th>
                                <th scope="col">coupon</th>
                                <th scope="col">code</th>
                                <th class="W-25" scope="col">couponTYPE</th>
                                <th>expiredate</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                               
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td> {{ $coupon->name }}</td>
                                    <td>{{ $coupon->code }}</td>
                                    <td scope="row">{{ $coupon->type }}</td>
                                    <td>{{ $coupon->expiredate }}</td>
                                    <td><a class="btn btn-primary" href="{{ route('delete', ['id' => $coupon->id]) }}">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
@endsection

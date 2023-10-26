@extends('furni.structure.main_layout')
@section('content')
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">

                                <a class="text-center" href="">
                                    <h4>sign up</h4>
                                </a>

                                <form class="mt-5 mb-5 login-input" method="post" action="/store">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name" name="name"
                                            required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" name="email"
                                            required>
                                        <div class="text text-danger">
                                            @error('email')
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password"
                                            required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="number" name="number"
                                            required>
                                        <div class="text text-danger">
                                            @error('number')
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <br>
                                    <button class="btn login-form__btn submit w-100" name="save" type="submit">Sign
                                        up</button>
                                </form>
                                <h4 style="color: black">Have account ?<a href="/furni/login" class="btn btn-primary">Sign
                                        in </a> </h4>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

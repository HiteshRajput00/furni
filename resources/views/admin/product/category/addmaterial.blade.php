@extends('admin.structure.master_layout')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="/home">
                                    <h4>add material</h4>
                                </a>

                                <form class="mt-5 mb-5 login-input" method="post" action="/addmaterial">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="enter material type"
                                            name="type">
                                        @if ($errors->has('type'))
                                            <div class="text-danger">{{ $errors->first('type') }}</div>
                                        @endif
                                    </div>



                                    <button class="btn login-form__btn submit w-100" type="submit">add</button>
                                </form>
                                <a class="btn btn-primary" href="/index">back</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection

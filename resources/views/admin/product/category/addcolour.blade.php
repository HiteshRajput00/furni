@extends('admin.structure.master_layout')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="input-group mb-3">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="/home">
                                    <h4>add colour</h4>
                                </a>

                                <form class="mt-5 mb-5 login-input" method="post" action="/addcolour">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="" placeholder="enter colour" name="colour">

                                        @if ($errors->has('colour'))
                                            <div class="text-danger">{{ $errors->first('colour') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="color" id="colourfeild" placeholder="enter colour" name="colourcode">
                                        {{-- <span><input type="text" class="" placeholder=" colour code" name="colour"></span> --}}
                                    </div>
                                    <button class="btn btn-primary submit w-100" type="submit">add</button>
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

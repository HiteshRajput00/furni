@extends('admin.structure.master_layout')
@section('content')
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-10">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">

                                <a class="text-center" href="/home">
                                    <h4>edit product</h4>
                                </a>

                                <form class="mt-5 mb-5 login-input" id="mainform" method="post"
                                    action="{{ route('savevar', ['id' => $data->id]) }}" enctype="multipart/form-data">
                                    @csrf

                                    <br>
                                    <div id="loop">
                                        <div class="form-group">
                                            <img src="{{ url('/upload/' . $data->image) }}"
                                                class="img-fluid product-thumbnail" height="500px" width="500px">
                                            <input type="file" class="form-control" placeholder="add" name="image"
                                                required>
                                        </div>
                                        <br>
                                        <div class="form-group">

                                            <input type="text" class="form-control" placeholder="price" name="price"
                                                value="{{ $data->price }}" required>
                                        </div>

                                        <label for="col">colour:</label>
                                        <select class="form-select" aria-label="Default select example" id="col"
                                            name="colour">

                                            <option value="{{ $data->colourID }} " selected>{{ $data->colour->colour }}
                                            </option>
                                            @foreach ($posts as $post)
                                                <option value="{{ $post->id }}">{{ $post->colour }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <label for="mat">material:</label>
                                        <select class="form-select" aria-label="Default select example" id="mat"
                                            name="material">
                                            <option value="{{ $data->materialID }}" selected>{{ $data->material->type }}
                                            </option>
                                            @foreach ($materialss as $materials)
                                                <option value="{{ $materials->id }}">{{ $materials->type }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <label for="s">size:</label>
                                        <input type="text" name="size" class="form-control" id="s" value="{{ $data->size }}" >
                                             
                                        <br>

                                        <br>
                                    </div>


                                    <br><br>

                                    <br><br>
                                    <div id="display"></div>
                                    <br>
                                    <button class="btn login-form__btn submit w-100" type="submit"
                                        name="up">save</button>
                                </form>
                                <a href="{{ route('edit', ['id' => $data->productID]) }}" class="btn btn-pimary">back </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection

@extends('admin.structure.master_layout')
@section('content')
    <div class="login-form-bg h-100 ">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-11">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <a class="text-center" href="/home">
                                <h2>change Blog</h2>
                            </a>
                            <br><br>
                            <div>
                                <h2> </h2>
                                <br><br>
                            </div>
                            <form action="{{ url('/updateblog/'.$blog->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                               
                                <div class="row gy-4">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label" for="title">Blog Title</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="title" id="title"
                                                    placeholder="Blog Title" value="{{ $blog->title ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label" for="title">Blog Slug</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="slug" id="slug"
                                                    placeholder="Blog slug" value="{{ $blog->slug ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label" for="sub-title">Sub Title</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="subtitle" id="sub-title"
                                                    placeholder="Blog Title" value="{{ $blog->sub_title ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label" for="image">Blog Image</label>
                                            <div class="form-control-wrap">
                                                <input type="file" class="form-control" name="image" id="image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="{{ asset('blog_images') }}/{{ $blog->image ?? '' }}" alt="">
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="short-description">Short Description</label>
                                            <div class="form-control-wrap">
                                                <textarea name="short_description" class="form-control" id="short-description">{{ $blog->short_description ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="description">Description</label>
                                            <div class="form-control-wrap">
                                                <textarea name="description" class="form-control" id="description">{{ $blog->description ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label" for="title">Writer Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="Wname" id="title"
                                                    placeholder="Name " value="{{ $blog->name ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group" id="save">
                                            <button type="submit" class="btn btn-primary"> update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
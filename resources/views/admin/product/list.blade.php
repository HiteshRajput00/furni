@extends('admin.structure.master_layout')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="W-25" scope="col">sno</th>
                <th scope="col">Sno.</th>

                <th scope="col">image</th>
                <th scope="col">name</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td></td>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td><img src="{{ url('/upload/' . $product->image) }}" class="img-fluid product-thumbnail" height="100px"
                            width="100px"></td>
                    <td>{{ $product->products->product }}</td>
                    <td><a class="btn btn-primary" href="{{ route('edit', ['id' => $product->productID]) }}">edit</a></td>
                    <td><a class="btn btn-primary" href="{{ route('delete', ['id' => $product->products->id]) }}">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

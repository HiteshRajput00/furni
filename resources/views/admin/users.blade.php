@extends('admin.structure.master_layout')
@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Sr no.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>

                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->number }}</td>
                    <td><a href="">edit</a></td>
                    <td><a href="">delete</a></td>

                </tr>
            @endforeach

        </tbody>
    </table>
    <br>
    <a class="btn btn-primary" href="/index">back</a>
@endsection

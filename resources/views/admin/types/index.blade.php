@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <h1>Project Index</h1>
        <article class="col-12">
            @if (session("message"))
                <div class="alert alert-danger">
                    {{ session("message") }}
                </div>
            @endif
            <table class="table align-middle table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Color</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($types as $type)
                        <tr>
                            <td>{{ $type->id }}</td>
                            {{-- @if ($type->type)
                            <td >{{$type->type->name}}</td>
                            @else
                            <td >No type</td> --}}
                            <td >
                                <span class="badge p-2" style="background-color : {{$type->color}}">{{ $type->name }}</span><!-- Ternario dell'if che precede  -->
                            </td>
                            <td>{{ $type->color }}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-primary btn-sm me-1" href="{{route('admin.types.show' , $type)}}">View</a>
                                    <a class="btn btn-warning btn-sm me-1" href="{{route('admin.types.edit' , $type)}}">Edit</a>
                                    <form action="{{ route('admin.types.destroy', $type) }}" method="POST" class="delete-form">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </article>
    </div>
</div>
@endsection

@section('custom-scripts')
    @vite('resources/js/delete-confirm.js')
@endsection

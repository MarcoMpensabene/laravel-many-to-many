@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <h1>Technology Index</h1>
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
                    @foreach ($technologies as $technology)
                        <tr>
                            <td>{{ $technology->id }}</td>
                            <td >
                                <span class="badge p-2" style="background-color : {{$technology->color}}">{{ $technology->name }}</span><!-- Ternario dell'if che precede  -->
                            </td>
                            <td>{{ $technology->color }}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-primary btn-sm me-1" href="{{route('admin.technologies.show' , $technology)}}">View</a>
                                    <a class="btn btn-warning btn-sm me-1" href="{{route('admin.technologies.edit' , $technology)}}">Edit</a>
                                    <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST" class="delete-form">
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

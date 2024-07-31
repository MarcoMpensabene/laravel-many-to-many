@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <h1> Deleted Project Index</h1>
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
                        <th scope="col">Type</th>
                        <th scope="col">Project Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Author</th>
                        <th scope="col">Image URL</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td >
                                <span class="badge p-2" style="background-color : {{$project->type->color}}">{{ $project->type ? $project->type->name : 'No type' }}</span><!-- Ternario dell'if che precede  -->
                            </td>
                            <td>{{ $project->title }}</td>
                            <td>{{ Str::limit($project->description, 50) }}</td> <!-- Limita la lunghezza -->
                            <td>{{ $project->user->name }}</td>
                            <td>{{ Str::limit($project->image_url, 20) }}</td> <!-- Limita la lunghezza -->
                            <td>
                                <div class="d-flex">
                                    <form action="{{route("admin.projects.restore" , $project)}}" method="POST" class="me-2">
                                        @method("PATCH")
                                        @csrf
                                        <button type="submit" class="btn btn-success">Restore</button>
                                    </form>
                                    <form action="{{route("admin.projects.permanent-delete" , $project )}}" method="POST" class="delete-form">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
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

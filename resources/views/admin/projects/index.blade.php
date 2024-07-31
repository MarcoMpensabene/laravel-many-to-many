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
                        <th scope="col">Type</th>
                        <th scope="col">Project Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Author</th>
                        <th scope="col">Image URL</th>
                        <th scope="col">Stack</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            {{-- @if ($project->type)
                            <td >{{$project->type->name}}</td>
                            @else
                            <td >No type</td> --}}
                            <td >
                                <span class="badge p-2" style="background-color : {{$project->type->color}}">{{ $project->type ? $project->type->name : 'No type' }}</span><!-- Ternario dell'if che precede  -->
                            </td>
                            <td>{{ $project->title }}</td>
                            <td>{{ Str::limit($project->description, 50) }}</td> <!-- Limita la lunghezza -->
                            <td>{{ $project->user->name }}</td>
                            <td>{{ Str::limit($project->image_url, 20) }}</td> <!-- Limita la lunghezza -->
                            {{-- <td>{{ Str::limit($project->stack, 20) }}</td> <!-- Limita la lunghezza --> --}}
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-primary btn-sm me-1" href="{{ route('admin.projects.show', $project) }}">View</a>
                                    <a class="btn btn-warning btn-sm me-1" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="delete-form">
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

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
                    </tr>
                </thead>
                <tbody class="table-group-divider">
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

                        </tr>
                </tbody>
            </table>
        </article>
    </div>
</div>
@endsection

@section('custom-scripts')
    @vite('resources/js/delete-confirm.js')
@endsection

@extends('layouts.admin')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Project  Index </h1>
            <div class="container">
                <div class="row">
                    <article class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Project : {{$project->title}}</h5>
                                <h4 class="badge text-bg-primary" >{{ $project->type ? $project->type->name : 'No type' }}</h4>
                                <p class="card-text">Description : {{$project->description}}</p>
                                <p class="card-text"><small class="text-body-secondary">Autore : {{$project->user->name}}</small></p>
                                <p>
                                    @forelse ($project->technologies as $technology)
                                        <span class="badge rounded-pill" style="background-color: {{$technology->color}}">{{ Str::limit($technology->name , 20) }}</span> @if (!$loop->last) | @endif
                                        {{--  ! if che serve a inserire quasiasi cosa fino a che non arriva all'ultimo elemento --}}
                                    @empty
                                            <td>No Technology used </td>
                                    @endforelse
                                </p>
                            </div>
                            @if (str_starts_with($project->image_url , "http"))
                                <img src="{{ $project->image_url}}" class="card-img-bottom object-fit-cover" style="height: 30rem"  alt="{{$project->title}}">
                            @else
                                <img src="{{asset('storage/' . $project->image_url) }}" class="card-img-bottom object-fit-cover" style="height: 30rem"  alt="{{$project->title}}">
                            @endif

                        </div>
                    </article>
                </div>
            </div>
            {{-- @dump($projects) --}}
        </div>
    </div>
</main>

@endsection

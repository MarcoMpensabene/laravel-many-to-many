@extends('layouts.admin')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <h1>CREATE PROJECT </h1>
                <form action="{{route('admin.projects.store')}}" method="POST" id="add-form" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="title">Project title</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Project title" aria-label="Project title" name="title" id="title" required>
                        @error('title')
                        <div class="alert alert-danger mt-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type_id">Type</label>
                        <select class="form-select" aria-label="Default select example" name="type_id">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{$type->name}}</option>
                            @endforeach
                        </select>
                        @error('type')
                        <div class="alert alert-danger mt-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control form-control-sm" type="text" placeholder="Description" aria-label="Description" name="description" id="description" required></textarea>
                        @error('description')
                        <div class="alert alert-danger mt-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image_url">URL Immagine</label>
                        <input class="form-control form-control-sm" type="file" placeholder="URL" aria-label="URL" name="image_url" id="image_url">
                        @error('image_url')
                        <div class="alert alert-danger mt-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

                            @foreach ($technologies as $technology)
                            @if ($errors->any())
                                <input type="checkbox" class="btn-check" name="technologies[]" id="technology-check-{{$technology->id}}" autocomplete="off" value="
                                {{$technology->id}}" {{in_array($technology->id, old('technologies' , [])) ? "checked" : ""}}>
                            @else
                                <input type="checkbox" class="btn-check" name="technologies[]" id="technology-check-{{$technology->id}}" autocomplete="off" value="
                                {{$technology->id}}" {{$project->technologies->contains($technology) ? "checked" : ""}}>
                            @endif
                            <label class="btn btn-outline-primary" for="technology-check-{{$technology->id}}">{{$technology->name}}</label>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3 d-flex justify-content-between p-2">
                        <input type="submit" value="Create new Project" class="btn btn-primary" >
                        <input type="reset" value="Reset" class="btn btn-danger">
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</main>

@endsection

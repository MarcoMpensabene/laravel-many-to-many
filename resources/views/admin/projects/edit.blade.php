@extends('layouts.admin')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <h1>CREATE PROJECT </h1>
            <form action="{{route('admin.projects.update' , $project)}}" method="POST" id="add-form">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="title">Project title</label>
                    <input class="form-control form-control-sm" type="text" placeholder="Project name" aria-label="Project Title" name="title" id="title"  value={{old('title' ,$project->title)}} required>
                    @error('title')
                    <div class="alert alert-danger mt-2">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="type_id">
                        @foreach ($types as $type)
                        <option value="{{$type->id}}"
                            {{$type->id == old('type_id' , $project->type_id) ? "selected" : ""}}
                            > {{$type->name}}</option>
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
                    <textarea class="form-control form-control-sm" type="text" placeholder="Description" aria-label="Description" name="description" id="description" required>{{old('description' ,$project->description)}}</textarea>
                    @error('description')
                    <div class="alert alert-danger mt-2">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image_url">URL Immagine</label>
                    <input class="form-control form-control-sm" type="text" placeholder="URL" aria-label="URL" name="image_url" id="image_url" value={{old('imamge_url' ,$project->image_url)}}>
                    @error('image_url')
                    <div class="alert alert-danger mt-2">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="stack">Stack</label>
                    <input class="form-control form-control-sm" type="text" placeholder="stack" aria-label="Stack " name="stack" id="stack" value={{old('stack' ,$project->stack)}}>
                    @error('stack')
                    <div class="alert alert-danger mt-2">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 d-flex justify-content-between p-2">
                    <input type="submit" value="Edit Project" class="btn btn-primary" >
                    <input type="reset" value="Reset" class="btn btn-danger">
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
</main>

@endsection

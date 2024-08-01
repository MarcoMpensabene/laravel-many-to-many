@extends('layouts.admin')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <h1>Update Technology </h1>
                <form action="{{route('admin.technologies.store')}}" method="POST" id="add-form" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="name">Technology name</label>
                        <input class="form-control form-control-sm" type="text" placeholder="name" aria-label="Type name" name="name" id="name" required value="{{old('name' , $technology->name)}}">
                        @error('name')
                        <div class="alert alert-danger mt-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="color">Technology color</label>
                        <input class="form-control form-control-sm" type="color" placeholder="color" aria-label="Type color" name="color" id="color" required value="{{old('color' , $technology->color)}}">
                        @error('color')
                        <div class="alert alert-danger mt-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3 d-flex justify-content-between p-2">
                        <input type="submit" value="Update Technology" class="btn btn-primary" >
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

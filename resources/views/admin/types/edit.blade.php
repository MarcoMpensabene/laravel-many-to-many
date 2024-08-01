@extends('layouts.admin')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <h1>EDIT TYPE </h1>
                <form action="{{route('admin.types.store')}}" method="POST" id="add-form" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="name">Type name</label>
                        <input class="form-control form-control-sm" type="text" placeholder="name" aria-label="Type name" name="name" id="name" required value="{{old('name' , $type->name)}}">
                        @error('name')
                        <div class="alert alert-danger mt-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="color">Type color</label>
                        <input class="form-control form-control-sm" type="color" placeholder="color" aria-label="Type color" name="color" id="color" required value="{{old('color' , $type->color)}}">
                        @error('color')
                        <div class="alert alert-danger mt-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3 d-flex justify-content-between p-2">
                        <input type="submit" value="Edit Type" class="btn btn-primary" >
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

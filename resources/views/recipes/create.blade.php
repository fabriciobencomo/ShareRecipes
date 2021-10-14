@extends('layouts.app')

@section('buttons')
    <a href={{ route('recipes.index') }} class="btn btn-primary mr-2">Back</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Create a Recipe</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form action="{{ route('recipes.store')}}" method="POST" novalidate>
                @csrf
                <div class="form-group">
                    <label for="title">Recipe Title</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Recipe Title" value={{ old('title') }}>
                    @error('title')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" value="Add Recipe" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
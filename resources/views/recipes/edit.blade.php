@extends('layouts.app')

@section('styles')  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('buttons')
    @include('templates.back')
@endsection

@section('content')
    <h2 class="text-center mb-5">Edit Recipe</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form action="{{ route('recipes.update', ['recipe' => $recipe->id])}}" method="POST" novalidate enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Recipe Title</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Recipe Title" value={{ $recipe->title }}>
                    @error('title')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $recipe->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="preparation">Preparation</label>
                    <input type="hidden" id="preparation" name="preparation" value="{{$recipe->preparation}}">
                    <trix-editor input="preparation" class="form-control @error('category') is-invalid @enderror"></trix-editor>
                    @error('preparation')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="ingredients">Ingredients</label>
                    <input type="hidden" id="ingredients" name="ingredients" value="{{$recipe->preparation}}">
                    <trix-editor input="ingredients" class="form-control @error('category') is-invalid @enderror"></trix-editor>
                    @error('ingredients')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="img">Choose an Image</label>
                    <input type="file" name="img" id="img" class="form-control @error('img') is-invalid @enderror" value={{ old('img') }}>
                    @error('img')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <p>Current Image</p>
                    <img src="/storage/{{$recipe->img}}" alt="Recipe Image" class="w-25">
                </div>
                <div class="form-group mt-3">
                    <input type="submit" value="Add Recipe" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection
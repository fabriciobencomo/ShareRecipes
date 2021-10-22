@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-5 title-category mt-4">{{$categoryRecipe->name}}</h2>

        <div class="row">
            @foreach($recipes as $recipe)
                @include('templates.recipes')
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $recipes->links()}}
        </div>
    </div>
@endsection
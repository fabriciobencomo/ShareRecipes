@extends('layouts.app')

@section('buttons')
    <a href={{ route('recipes.index') }} class="btn btn-primary mr-2">Back</a>
@endsection

@section('content')
    <article class="content-recipe bg-white p-3 shadow">
        <h1 class="text-center mb-5">{{$recipe->title}}</h1>
        <div class="recipe-img mb-3">
            <img src="/storage/{{ $recipe->img }}" alt="recipe" class="w-100" >
        </div>
        <div class="recipe-meta mt-3">
            <p>
                <span class="font-weigth-bold text-primary">Category:</span>
                <a class="text-dark" href="{{route('categories.show', ['categoryRecipe' => $recipe->category->id ])}}">{{$recipe->category->name}}</a>
            </p>
            <p>
                <span class="font-weigth-bold text-primary">Author:</span>
                <a class="text-dark" href="{{route('profiles.show', ['profile' => $recipe->user->id ])}}">{{$recipe->user->name}}</a>
            </p>
            <p>
                <span class="font-weigth-bold text-primary">Published Date:</span>
                @php
                    $time = $recipe->created_at;
                @endphp
                <time-component time="{{ $time }}"></time-component>
            </p>
        </div>
        <div class="ingredients">
            <h2 class="text-primary my-3">Ingredients</h2>
            {!! $recipe->ingredients !!}
        </div>
        <div class="preparation">
            <h2 class="text-primary my-3">Preparation</h2>
            {!! $recipe->preparation !!}
        </div>
        <div class="justify-content-center row text-center">
            <like-component recipe-id="{{$recipe->id}}" liked="{{$like}}" likes="{{$likes}}"></like-component>
        </div>

    </article>
@endsection
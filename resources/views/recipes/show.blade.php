@extends('layouts.app')

@section('buttons')
    <a href={{ route('recipes.index') }} class="btn btn-primary mr-2">Back</a>
@endsection

@section('content')
    <article class="content-recipe">
        <h1 class="text-center mb-5">{{$recipe->title}}</h1>
        <div class="recipe-img mb-3">
            <img src="/storage/{{ $recipe->img }}" alt="recipe" class="" style="width: 1100px">
        </div>
        <div class="recipe-meta">
            <p class="text-center">
                <span class="font-weigth-bold text-primary">Category:</span>
                {{$recipe->category->name}}
            </p>
            <p class="text-center">
                <span class="font-weigth-bold text-primary">Author:</span>
                {{$recipe->user_id}}
            </p>
            <p class="text-center">
                <span class="font-weigth-bold text-primary">Author:</span>
                {{$recipe->user_id}}
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
    </article>
@endsection
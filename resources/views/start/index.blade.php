@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('hero')
    <div class="hero-categories">
        <form action="{{ route('search.show')}}" class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-4 text-search">
                    <p class="display-4">Search a Recipe</p>
                    <input type="search" name="search" id="search" class="form-control" placeholder="search">
                </div>
            </div>
        </form>
    </div>
@endsection
@section('content')
    <h2 class="title-category mb-4">Latest Recipes</h2>
    <div class="container latest-recipes">
        <div class="owl-carousel owl-theme">
            @foreach($latest as $recipe)
                <div class="card">
                    <img src="/storage/{{ $recipe->img }}" alt="Recipe Image">
                    <div class="card-body">
                        <h3>{{$recipe->title}}</h3>
                        <p>{{ Str::words(strip_tags($recipe->preparation), 15 )}}</p>
                        <a href="{{ route('recipes.show', ['recipe' => $recipe->id ])}}" class="d-block btn btn-primary font-weight-bold text-capitalize">See More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <h2 class="title-category my-5 text-capitalize">Most Likes</h2>
    <div class="container">
        <div class="row">
            @foreach ($mostLiked as $recipe)
                <div class="col-md-4 mt-4">
                    <div class="card shadow">
                        <img src="/storage/{{ $recipe->img }}" alt="Recipe Image">
                        <div class="card-body">
                            <h3 class="text-capitalize">{{$recipe->title}}</h3>
                            <div class="meta-recipe d-flex justify-content-between">
                                @php
                                    $time = $recipe->created_at
                                @endphp
                                <p class="date"><time-component time="{{$time}}"></time-component></p>
                                <p>{{count($recipe->likes)}} Like This Recipe</p>
                            </div>
                            <p>{{ Str::words(strip_tags($recipe->preparation), 15 )}}</p>
                            <a href="{{ route('recipes.show', ['recipe' => $recipe->id ])}}" class="d-block btn btn-primary font-weight-bold text-capitalize btn-recipe">See More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @foreach($recipes as $key => $category)
        <h2 class="title-category my-5 text-capitalize">{{str_replace('-', ' ', $key)}}</h2>
        <div class="container">
            <div class="row">
                @foreach($category as $recipes)
                    @foreach ($recipes as $recipe)
                        @include('templates.recipes')
                    @endforeach
                @endforeach
            </div>
        </div>
    @endforeach
@endsection


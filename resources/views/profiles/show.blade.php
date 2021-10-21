@extends('layouts.app')

@section('buttons')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                @if($profile->img)
                    <img src="/storage/{{$profile->img}}" alt="Profile Image" class="w-75 rounded-circle">
                @endif
            </div>
            <div class="col-md-7 mt-5 mt-md-0">
                <h2 class="mb-2 text-primary">{{ $profile->user->name}}</h2>
                @if(Auth::user()->id === $profile->user_id)
                    <a href={{ route('profiles.edit', Auth::user()->id ) }} class="btn btn-outline-primary mr-2"> <svg class="icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>Edit Profile</a>
                @endif
                @if($profile->user->url)
                    <a href="{{ $profile->user->url }}" >Visit My Website</a>
                @endif
                <p class="bio">{!! $profile->bio !!}</p>
            </div>
        </div>
    </div>

    <h2 class="text-center my-5">Recipes</h2>
    <div class="container">
        <div class="row mx-auto bg-white p-4">
            @if(count($recipes) > 0)
                @foreach($recipes as $recipe)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="/storage/{{$recipe->img}}" class="card-img-top" alt="img Recipe">
                            <div class="card-body">
                                <h3 class="text-center">{{$recipe->title}}</h3>
                                <a href="{{ route('recipes.show', ['recipe' => $recipe->id]) }}" class="btn btn-primary d-block">See Recipe</a>
                            </div>
                        </div>
                    </div>
                @endforeach            
            @else
                <p class="text-center w-100">No recipes yet..</p>
            @endif
        </div>
        <div class="d-flex justify-content-center">
            {{ $recipes->links()}}
        </div>
    </div>
@endsection
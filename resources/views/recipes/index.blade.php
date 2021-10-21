@extends('layouts.app')

@section('buttons')
    <a href={{ route('recipes.create') }} class="btn btn-outline-success"><svg class="icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>Create a Recipe</a>
    <a href={{ route('profiles.show', Auth::user()->id ) }} class="btn btn-outline-info"> <svg class="icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>My Profile</a>
@endsection

@section('content')
    <h1 class="text-center mb-5">Recipes</h1>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Title</th>
                    <th scole="col">Category</th>
                    <th scole="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recipes as $recipe)
                    <tr>
                        <td>{{ $recipe->title }}</td>
                        <td>{{ $recipe->category->name }}</td>
                        <td>
                            {{--<form action="{{ route('recipes.destroy', ['recipe' => $recipe->id ])}}" method="POST"> --}}
                                @csrf
                                @method('DELETE')
                                <delete-component recipe-id="{{ $recipe->id }}"></delete-component>
                            {{--</form>--}}
                            <a href="{{ route('recipes.edit', ['recipe' => $recipe->id ])}}" class="btn btn-dark mb-2 d-block">Edit</a>
                            <a href="{{ route('recipes.show', ['recipe' => $recipe->id ])}}" class="btn btn-success d-block mb-2">Check</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-12 mt-4 d-flex justify-content-center">
            {{ $recipes->links() }}
        </div>
        <h2 class="text-center my-5">Recipes You Like</h2>
        @if(count($user->likes)>0)
            <div class="mx-auto col-md-10 bg-white p-3">
                <ul class="list-group">
                    @foreach($user->likes as $recipe)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <p>{{ $recipe->title }}</p>
                            <a class="btn btn-outline-success d-block mb-2" href="{{ route('recipes.show', ['recipe' => $recipe->id ]) }}">Check</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <p class="text-center my-5">You still don't Like any Recipe...</p>
        @endif
@endsection
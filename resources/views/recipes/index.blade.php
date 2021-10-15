@extends('layouts.app')

@section('buttons')
    <a href={{ route('recipes.create') }} class="btn btn-primary mr-2">Create a Recipe</a>
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
                            <a href="" class="btn btn-danger mr-2">Delete</a>
                            <a href="" class="btn btn-dark mr-2">Edit</a>
                            <a href="" class="btn btn-success mr-2">Check</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
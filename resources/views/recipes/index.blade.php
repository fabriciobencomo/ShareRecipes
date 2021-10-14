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
                <tr>
                    <td>pizza</td>
                    <td>pizzas</td>
                </tr>
            </tbody>
        </table>
@endsection
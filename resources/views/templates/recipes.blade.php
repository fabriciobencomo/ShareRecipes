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
@extends('layouts.app')

@section('styles')  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('buttons')
    <a  href="{{route('recipes.index')}}" class="btn btn-primary mr-2">Back</a>
@endsection

@section('content')
    <h2 class="text-center">Edit Your Profile</h2>
    <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-white p-3">
            <form action="{{ route('profiles.update', ['profile' => $profile->id ])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="full name" value="{{$profile->user->name}}">
                    @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror" placeholder="full url" value="{{$profile->user->url}}">
                    @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="bio">Biography</label>
                    <input type="hidden" id="bio" name="bio" value="{{$profile->bio}}">
                    <trix-editor input="bio" class="form-control @error('category') is-invalid @enderror"></trix-editor>
                    @error('bio')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="img">Choose an Image</label>
                    <input type="file" name="img" id="img" class="form-control @error('img') is-invalid @enderror"  {{--value={{ old('img') }}--}}>
                    @error('img')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                @if($profile->img)
                    <div class="form-group mt-4">
                        <p>Current Image</p>
                        <img src="/storage/{{$profile->img}}" alt="Recipe Image" class="w-25">
                    </div>
                @endif
                <div class="form-group mt-3">
                    <input type="submit" value="Save Changes" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection
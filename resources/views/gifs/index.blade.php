@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-3 col-lg-3 sidebar mb-4">
        <div class="card">
            <div class="card-body">
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim delectus maxime, quis illo commodi corrupti consequuntur doloribus aspernatur ipsum dolor minus, labore quibusdam odio cupiditate? Quam nesciunt vero architecto. Eius!</p>
                <a type="button" class="btn btn-primary" href="{{ route('gifs.create') }}">upload</a>
            </div>
        </div>
    </div>

    <div class="col-md-9 col-lg-9 gif-list">
        @if(count($gifs))
            <div class="card-columns">
                @foreach ($gifs as $gif)
                    <div class="card">
                        <a href="{{ route('gifs.show', $gif->id) }}">
                            <img src="{{ $gif->imageUrl('path') }}" class="card-img img-fluid">
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <h3 class="text-center alert alert-info">Empty!</h3>
        @endif

        <div class="align-content-center">
            {!! $gifs->render("pagination::bootstrap-4") !!}
        </div>
    </div>
</div>

@endsection
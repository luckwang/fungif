@extends('layouts.app')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <img src="{{ $user->imageUrl() }}" class="card-img">
                    <h4>{{ $user->name }}</h4>
                    <p>{{ $user->introduction }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card-columns">
                @foreach($user->gifs as $gif)
                    <div class="card">
                        <a href="{{ route('gifs.show', $gif->id) }}">
                            <img src="{{ $gif->imageUrl('path') }}" class="card-img">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

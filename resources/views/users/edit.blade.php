@extends('layouts.app')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-3 col-md-offset-2">
            <div class="card">
                <div class="card-body">
                    <img class="media-object" src="{{ $user->imageUrl() }}" class="card-img">
                </div>
            </div>
        </div>

        <div class="col-md-8">
            @include('common.error')
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="name-field">Name</label>
                            <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $user->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="email-field">Email</label>
                            <input class="form-control" type="text" id="email" name="email" value="{{ old('email', $user->email) }}">
                        </div>

                        <div class="form-group">
                            <label for="introduction-field">Introduction</label>
                            <textarea class="form-control" type="text" id="introduction" name="introduction" style="height: 200px">{{ old('introduction', $user->introduction) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="avatar-field">Avatar</label>
                            <input type="file" id="avatar" name="avatar">
                        </div>

                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
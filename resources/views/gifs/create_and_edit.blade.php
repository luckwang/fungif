@extends('layouts.app')

@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-4">
        <div class="media">
            @if ($gif->id)
                <img class="card-img" src="{{ $gif->imageUrl('path') }}" />
            @endif
        </div>
    </div>

    <div class="col-md-6 col-lg-8">
        @include('common.error')
        <div class="card">
            <div class="card-header">
                <h3>
                    <i class="glyphicon glyphicon-edit"></i> Gif /
                    @if($gif->id)
                        Edit #{{ $gif->id }}
                    @else
                        Create
                    @endif
                </h3>
            </div>

            <div class="card-body">
                @if($gif->id)
                    <form action="{{ route('gifs.update', $gif->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ method_field('PUT') }}

                @else
                    <form action="{{ route('gifs.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                @endif
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title-field">title</label>
                        <input class="form-control" type="text" name="title" value="{{ old('title', $gif->title) }}" />
                    </div>

                    <div class="form-group">
                        <label for="tags-field">tags</label>
                        <select class="form-control" multiple="multiple" id="tags" name="tag_list[]">
                            @foreach($gif->tags as $tag)
                                <option value="{{ $tag->name }}" selected="selected">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description-field">description</label>
                        <textarea class="form-control" name="description" style="height: 200px;">{{ old('description', $gif->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="file-field">Image</label>
                        <input type="file" name="path" />
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('gifs.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/select2/4.0.6-rc.1/css/select2.css">
@endsection


@section('scripts')
    <script src="https://cdn.bootcss.com/select2/4.0.6-rc.1/js/select2.js"></script>
    <script>
    $(document).ready(function () {
        $('#tags').select2({
            tags: true,
            tokenSeparators: [","],
            dataType: 'json',
            ajax: {
                url: "{{ config('app.url') }}/tags"
            }
        });
    })
    </script>
@endsection
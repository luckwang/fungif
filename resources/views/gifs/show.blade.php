@extends('layouts.app')

@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-4 col-lg-4">
        <div class="card">
            <img src="{{ $gif->imageUrl('path') }}" class="card-img"/>
        </div>
    </div>

    <div class="col-md-6 col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h5>{{ $gif->title }}</h5>
                    <span class="pull-right" aria-hidden="true">
                        @for($i = 1; $i <= $gif->getAvgScore(); $i++)
                            <i class="fas fa-star" aria-hidden="true"></i>
                        @endfor
                        @for($i = 1; $i <= 5-$gif->getAvgScore(); $i++)
                            <i class="fas fa-star-o" aria-hidden="true"></i>
                        @endfor
                    </span>
                </div>

                <div class="card-text">
                    <p>{{ $gif->description }}</p>
                    <div class="pull-right">
                    @foreach($gif->tags->pluck('name') as $tags)
                        <span class="badge badge-secondary">{{ $tags }}</span>
                    @endforeach
                    </div>

                    @auth()
                        <div id="score"></div>
                    @endauth()
                </div>

                @can('update', $gif)
                <hr>
                <a class="btn btn-primary" href="{{ route('gifs.edit', $gif->id) }}">
                    <i class="glyphicon glyphicon-edit"></i> Edit
                </a>

                <form class="pull-right" action="{{ route('gifs.destroy', $gif->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit">
                        <i class="glyphicon glyphicon-trash"></i> Delete
                    </button>
                </form>
                @endcan
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                @includeWhen(Auth::check() ,'gifs._reply_box')
                <hr>
                @include('gifs._reply_list', ['replies' => $gif->replies()->with('user')->get()])
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')

    <link href="https://cdn.bootcss.com/raty/2.8.0/jquery.raty.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="https://cdn.bootcss.com/raty/2.8.0/jquery.raty.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#score').raty({
                number : 5,//星星个数
                path : 'https://cdn.bootcss.com/raty/2.8.0/images/',//图片路径
                starOn : 'star-on.png',
                starOff : 'star-off.png',
                score : '{{ $gif->getScore() }}',
                click: function (point) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('gif.score', $gif->id) }}',
                        data: { point: point }
                    })
                }
            });

        })
    </script>
@endsection
@if(count($replies))

    @foreach($replies as $reply)
        <div class="media">
            <div class="mr-3">
                <a href="#">
                    <img class="rounded-circle" style="height: 50px; width: 50px;" src="{{ $reply->user->imageUrl() }}">
                </a>
            </div>
            <div class="media-body">
                <h6>
                    <a href="#">{{ $reply->user->name }}</a>
                    <span> • </span>
                    <span class="meta"> {{ $reply->updated_at->diffForHumans() }} </span>
                </h6>
                <p>{{ $reply->content }}</p>
            </div>

            @can('destroy', $gif)
            <div class="media-right">
                <form action="{{ route('replies.destroy', $reply->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-trash"></i>
                    </button>
                </form>
            </div>
            @endcan
        </div>
        <hr>
    @endforeach

@endif
<form action="{{ route('replies.store') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" value="{{ $gif->id }}" name="gif_id">

    <div class="form-group">
        <textarea class="form-control" name="content" id="" rows="10"></textarea>
    </div>

    <button class="btn btn-primary" type="submit">Submit</button>
</form>

<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Score;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyRequest;

class RepliesController extends Controller
{

	public function store(ReplyRequest $request, Reply $reply)
	{
		$reply = $reply->fill($request->all());
		$reply->user_id = \Auth::id();
		$reply->save();
		return redirect()->route('gifs.show', $reply->gif_id)->with('message', 'Created successfully.');
	}

	public function destroy(Reply $reply)
	{
		$this->authorize('destroy', $reply);
		$reply->delete();

		return redirect()->route('gifs.show', $reply->gif_id)->with('message', 'Deleted successfully.');
	}
}
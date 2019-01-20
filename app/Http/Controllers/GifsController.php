<?php

namespace App\Http\Controllers;

use App\Models\Gif;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GifRequest;

class GifsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$gifs = Gif::paginate(36);
		return view('gifs.index', compact('gifs'));
	}

    public function show(Gif $gif)
    {
        return view('gifs.show', compact('gif'));
    }

	public function create(Gif $gif)
	{
		return view('gifs.create_and_edit', compact('gif'));
	}

	public function store(GifRequest $request, Gif $gif)
	{
		$tags = $request->tag_list;
        $gif->fill($request->except('tag_list'));
		$gif->user_id = \Auth::id();
        $gif->save();
        // sync tag
        $gif->syncTags($tags);
		return redirect()->route('gifs.show', $gif->id)->with('message', 'Created successfully.');
	}

	public function edit(Gif $gif)
	{
        $this->authorize('update', $gif);
		return view('gifs.create_and_edit', compact('gif'));
	}

	public function update(GifRequest $request, Gif $gif)
    {
        $this->authorize('update', $gif);
//		设置 tag
        $tags = $request->tag_list;
        $gif->syncTags($tags);
        $gif->update($request->except('tag_list'));

		return redirect()->route('gifs.show', $gif->id)->with('message', 'Updated successfully.');
	}

    public function storeScore(Request $request, Gif $gif)
    {
        $gif->storeScore($request->point);
        return response('done' , 200);
    }

	public function destroy(Gif $gif)
	{
		$this->authorize('destroy', $gif);
		$gif->delete();

		return redirect()->route('gifs.index')->with('message', 'Deleted successfully.');
	}
}
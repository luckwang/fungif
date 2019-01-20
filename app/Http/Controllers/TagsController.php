<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Gif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;

class TagsController extends Controller
{
    public function index()
    {
        $data = [];
        $tags = Tag::all()->pluck('name');

        foreach ($tags as $tag) {
            $data[] = ["id" => $tag, "text" => $tag];
        }
        return response()->json(['results' => $data]);
    }
}
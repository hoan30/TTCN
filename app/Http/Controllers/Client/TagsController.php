<?php

namespace App\Http\Controllers\Client;

use Exception;
use App\Models\Tag;
use App\Models\Articles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    public function index(Request $request)
    {
        try {
            if(!$request->tag){
                abort(404);
            }
            $slug = $request->tag;
            $data = Articles::whereHas('tags', function ($query) use ($slug) {
                $query->where('slug','=',$slug);
            })->with(['user','category','tags'])->latest()->paginate(15);

            return view('client.tags.index',[
                'data' => $data,
                'tag' => $slug,
            ]);
        }catch(Exception $e){
            dd($e);
            abort(404);
        }
    }
}

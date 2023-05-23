<?php

namespace App\Http\Controllers\Client;

use App\Models\Comment;
use App\Models\Articles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        try {
            Comment::create([
                'content' => $request->content,
                'comment_id' => $request->comment_id,
                'user_id' => $request->user_id,
                'article_id' => $request->article_id,
            ]);
        }catch (Exception $e){
            dump($e);
        }

        $data = Articles::find($request->article_id)->load(['user','category','tags','parentComments.childComments']);

        $returnHTML = view('client.show.comments')->with('comments', $data->parentComments)->render();

        return response()->json(['data' => $returnHTML]);
    }
}

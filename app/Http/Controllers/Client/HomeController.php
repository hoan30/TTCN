<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = Articles::with(['user','category'])->latest()->take(5)->get();

        $random = Articles::inRandomOrder()->with(['user','category','tags'])
                ->limit(12)
                ->get();

        return view('client.home.index',[
            'news' => $news,
            'random' => $random,
        ]);
    }

    public function show($slug)
    {
        try {
            $data = Articles::findBySlugOrFail($slug)->load(['user','category','tags','parentComments.childComments']);

            if($data->status == 0) {
                return redirect()->route('home')->with(["mess"=>"Trang bạn truy cập bị chặn"]);
            }

            return view('client.show.index',[
                'data' => $data,
            ]);
        }catch(Exception $e){
            dd($e);
            abort(404);
        }
    }

    public function get_all_blogs()
    {
        try {
            $data = Articles::with(['user','category','tags'])->latest()->paginate(15);

            return view('client.news.index',[
                'data' => $data,
            ]);
        }catch(Exception $e){
            abort(404);
        }
    }

    public function search(Request $request)
    {
        try {
            $keyword = $request->keyword;
            if(!$keyword) {
                $data = Articles::with(['user','category','tags'])->latest()->paginate(25);
            }

            $data = Articles::with(['user','category','tags'])->where('title','like', '%' . $keyword . '%')->latest()->paginate(25);

            return view('client.search.index',[
                'data' => $data,
                'keyword' => $keyword ?? null,
            ]);
        }catch(Exception $e){
            abort(500);
        }
    }
}

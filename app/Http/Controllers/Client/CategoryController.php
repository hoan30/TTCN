<?php

namespace App\Http\Controllers\Client;

use Exception;
use App\Models\Articles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        try {
            if(!$request->category){
                abort(404);
            }
            $id =  Category::findBySlugOrFail($request->category);
            $data = Articles::where('category_id','=',$id->id)->with(['user','category','tags'])->latest()->paginate(15);
            return view('client.category.index',[
                'data' => $data,
                'category' => $request->category,
            ]);
        }catch(Exception $e){
            abort(404);
        }
    }
}

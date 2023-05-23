<?php

namespace App\Http\Controllers\Client;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Articles;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
        $data = Articles::where('user_id','=',auth()->user()->id)->with(['user','category','tags'])->latest()->paginate(15);

            return view('client.articles.index',[
                'data' => $data,
            ]);
    }

    public function create()
    {
        $tags = Tag::all();

        return view('client.articles.create',[
            'tags' => $tags,
        ]);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $destinationPath = storage_path('app/public/admin/articles/') ;
            $fileName = Str::slug(pathinfo($fileName, PATHINFO_FILENAME)) . '-' . Carbon::now()->timestamp;
            $fileExt = $file->getClientOriginalExtension();
            $file->move($destinationPath,$fileName . "." . $fileExt);
            $data['image'] = "articles/".$fileName . "." . $fileExt;

            $data = array_merge(
                $request->only([
                    'title',
                    'description',
                    'content',
                    'category_id',
                ]),
                [
                    'image' => $data['image'],
                    'user_id' => Auth()->user()->id,
                    'status' => 0,
                ]
            );

            $article = Articles::create($data);

            $article->tags()->sync($request->tags);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('articles')->with('mess', $e->getMessage());
        }

        return redirect()->route('articles')->with('mess', 'Đã thêm 1 bài viết mới');
    }

    public function edit($id)
    {
        try {
            $data = Articles::find($id)->load(['user','category','tags']);
            $tags = Tag::all();
        } catch (\Exception $e) {
            return redirect()->route('articles')->with('error', $e->getMessage());
        }

        return view('client.articles.edit', [
            'data'=>$data,
            'tags'=>$tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $data = array_merge(
                $request->only([
                    'title',
                    'description',
                    'content',
                    'category_id',
                ]),
                [
                    'user_id' => Auth()->user()->id,
                    'status' => 0,
                ]
            );

            if($request->has("image")){
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $destinationPath = storage_path('app/public/admin/articles/') ;
                $fileName = Str::slug(pathinfo($fileName, PATHINFO_FILENAME)) . '-' . Carbon::now()->timestamp;
                $fileExt = $file->getClientOriginalExtension();
                $file->move($destinationPath,$fileName . "." . $fileExt);
                $data['image'] = "articles/".$fileName . "." . $fileExt;
            }

            $article = Articles::find($id);
            $article->update($data);
            $article->tags()->sync($request->tags);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->route('articles')->with('mess', $th->getMessage());
        }

        return redirect()->route('articles')->with('mess', 'Đã sửa bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $data = Articles::find($id);
            $data->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->route('articles')->with('mess', $th->getMessage());
        }

        return redirect()->back()->with('mess', 'Đã xóa bài viết');
    }
}

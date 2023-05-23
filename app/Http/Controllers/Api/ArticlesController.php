<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        return Articles::where('title', 'like', "%$q%")
            ->paginate(30, ['id', 'title as text']);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        return Tag::where('name', 'like', "%$q%")
            ->paginate(30, ['id', 'name as text']);
    }
}

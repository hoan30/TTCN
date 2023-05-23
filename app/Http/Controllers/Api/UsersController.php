<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        return User::where('name', 'like', "%$q%")
            ->paginate(30, ['id', 'name as text']);
    }
}

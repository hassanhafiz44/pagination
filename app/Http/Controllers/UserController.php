<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = User::latest();
        if ($request->has('search') && !empty($request->input('search'))) {
            $query->where('email', 'like', '%' . $request->input('search') . '%');
        }
        $users = $query->paginate(30)->withQueryString();

        return view('users.index', compact('users'));
    }
}

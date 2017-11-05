<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function __construct()
    {

        $this->middleware('auth');
    }

    public function index() {
        return view('users.index', [
            "users" => User::all()
        ]);
    }

    public function view($user_id) {
        $user = User::find($user_id);

        return view('users.user', [
            "user" => $user
        ]);
    }
}

<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{McqQuestion, McqResponse, User};
use Illuminate\Support\Facades\View;


class UserController extends Controller
{
    public function index()
    {
        $users = User::where('user_type', 'student')->get();
        return view('back.report.list', ['users' => $users]);
    }
}

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

        foreach ($users as $user) {
            // dd($user->mcqResult['correct_answers'], $user->mcqResult['total_questions'], $user->mcqResult['percentage']);
        }
        return view('back.report.list', ['users' => $users]);
    }
}

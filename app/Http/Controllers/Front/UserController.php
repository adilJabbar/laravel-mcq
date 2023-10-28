<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{McqQuestion, McqResponse, User};
use Illuminate\Support\Facades\View;


class UserController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);

        if ($user->attempt->count() > 0) {
            $userResponses = McqResponse::where('user_id', $user->id)->get();
            $totalQuestions = McqQuestion::count();
            $userScore = $userResponses->filter(function ($response) {
                $question = $response->question; // Get the associated question
                if ($question && $response->selected_option === $question->correct_option) {
                    return true;
                }
                return false;
            })->count();
            $percentage = ($userScore / $totalQuestions) * 100;
            return view('mcq_result', ['percentage' => $percentage,'totalQuestions'=>$totalQuestions,'userScore'=>$userScore]);
        }

        $mcqs = McqQuestion::all();
        return view('mcq_attempt', ['mcqs' => $mcqs]);


        return view('back.question.create');
    }
    public function QuestionPost(Request $request)
    {
        $formattedData = array_map(function ($question) {
            return [
                'question_text' => $question['text'],
                'options' => json_encode($question['options']),
                'correct_option' => $question['correct_option']
            ];
        }, $request->get('questions'));
        McqQuestion::insert($formattedData);
        return redirect()->back();
    }
    public function QuestionGenerate(Request $request)
    {
        $html = View::make('back.question.generate', ['numQuestions' => $request->get('num_questions')])->render();
        return ['success' => true, 'html' => $html];
    }
    public function mcqAttempPost(Request $request)
    {
        $userAnswers = $request->input('answers');
        foreach ($userAnswers as $questionId => $selectedOption) {
            $userResponse = new McqResponse();
            $userResponse->question_id = $questionId;
            $userResponse->selected_option = $selectedOption;
            $userResponse->user_id = auth()->user()->id;
            $userResponse->save();
        }
        return redirect()->back();
    }
}

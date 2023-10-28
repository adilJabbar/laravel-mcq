<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\McqQuestion;
use Illuminate\Support\Facades\View;


class McqQuestionController extends Controller
{
    public function index()
    {
        if(McqQuestion::count() > 0)
        {
            $mcqs = McqQuestion::all(); // Fetch all MCQs
            return view('back.question.list',['mcqs' => $mcqs]);
        }
       
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
        return ['success' => true,'html'=>$html];
    }
}

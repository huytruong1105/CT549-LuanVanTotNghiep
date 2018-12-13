<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Question;
use App\SurveySession;
use App\Survey;
use App\User;
class SurveyExports implements FromView
{

    public function view(): View
    {
        $questions = Question::get()->where('status', 1)->all();
        $users = User::all();
        return view('survey', compact('questions', 'users'));
    }
}

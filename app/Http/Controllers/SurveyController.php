<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\SurveySession;
use App\Survey;
use App\User;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::get()->where('status', 1)->all();
        $survey = SurveySession::where('started', '>', NOW())->orWhere('started', '<=', NOW())->where('ended', '>=', NOW())->orderBy('started','ASC')->first();
        return view('survey/index', compact('questions', 'survey'));
    }
    public function index2(){
        $questions = Question::get()->where('status', 1)->all();
        $users = User::all();
        return view('survey', compact('questions', 'users'));
    }


   public function saveSurvey(Request $request){
    $questions = Question::get()->where('status', 1)->all();
    $survey_session = SurveySession::where('started', '>', NOW())->orWhere('started', '<=', NOW())->where('ended', '>=', NOW())->orderBy('started','ASC')->first();
    foreach ($questions as $question) {
        $survey = new Survey();
        $survey->question_id = $request->input('question_id_' . $question->id );
        if ($request->input('answer_' . ($question->id)) == null){
            $survey->answer = "0";
        }
        else $survey->answer = $request->input('answer_' . ($question->id));
        $survey->student_id = request('student_id');
        $survey->survey_session_id = $survey_session->id;
        $survey->save();
    }
    return redirect('/khaosat')->with('status', 'Thực hiện khảo sát thành công');

    }

    public function updateSurvey(Request $request, $student_id){
        for ($i = 1; $i <= Survey::where('student_id', $student_id)->count(); $i++){
            $survey = Survey::where('student_id', $student_id)->where('id',$request->input('survey_' . $i ))->first();
            if ($request->input('answer_' . $i) == null){
                $survey->answer = "0";
            }
            else $survey->answer = $request->input('answer_' . $i);
            $survey->save();
        }
        return redirect('/khaosat')->with('status', 'Sửa khảo sát thành công');

    }

}

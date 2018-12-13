<?php
namespace App\Http\Controllers;
use App\Exports\SurveyExports;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class AnotherController extends Controller 
{
    public function export() 
    {
        return Excel::download(new SurveyExports, 'surveyexport.xlsx');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    //
    public function studentGrade(){
        // dd(auth()->user()->studentLoad());
        $grade = DB::table('users')
            ->join('subject_loads', 'users.id', '=', 'subject_loads.students_id')
            ->join('subjects', 'subjects.id', '=', 'subject_loads.subjects_id')
            ->join('grades', 'subject_loads.id', '=', 'grades.subjectLoads_id')
            ->select('grades.*', 'subjects.name')
            ->get();
        return view('students.grades.index', [
            'grades' => $grade,
            'ave' => '0'
        ]);
    }
}

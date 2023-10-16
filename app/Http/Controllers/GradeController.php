<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\User;
use App\Models\Subject;
use App\Models\SubjectLoad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
    public function facultyGrading(Subject $subject){

        $facultyID = Auth::user()->id;
        $teacherload = DB::table('users')
            ->join('subject_loads', 'users.id', '=', 'subject_loads.students_id')
            ->join('subjects', 'subjects.id', '=', 'subject_loads.subjects_id')
            ->join('strands', 'users.strands_id', '=', 'strands.id')
            ->where('subjects.id', '=', $subject->id)
            ->where('subject_loads.faculties_id', '=', $facultyID)
            ->select('users.*', 'strands.acronym as strand', 'subject_loads.id as subjectLoad' );
        
            
        if (request('year') ?? false) {
            $teacherload = $teacherload->where('users.year_level', '=', request('year'));
        }
        if(request('strand') ?? false){
            $teacherload = $teacherload->where('users.strands_id', '=', request('strand'));
        }
        $teacherload = $teacherload->get();


        // $teacherload = User::findorFail($facultyID)->teacherLoad;
        
        // dd($teacherload);
        return view('faculty.grade',[
            'students' => $teacherload,
            'subjects' => SubjectLoad::where('faculties_id', '=', auth()->user()->id)->get(),
            'actSubject' => $subject,
        ]);
        
        
    }
    public function postGrade(Request $request){
        // dd($request);

        $validated = $request   ->validate([
            'subjectLoads_id' => 'required|array',
            'subjectLoads_id.*' => 'exists:subject_loads,id',
            'final_grade' => 'required|array',
            'final_grade.*' => 'numeric|max:100|min:60',
        ]);

        Grade::where('subjectLoads_id', $validated['subjectLoads_id'])->delete();
        for ($i=0; $i < count($validated['subjectLoads_id']); $i++) { 
            # code...
            $studentGrade = new Grade();
            $studentGrade->grade = $validated['final_grade'][$i];
            $studentGrade->subjectLoads_id = $validated['subjectLoads_id'][$i];
            $studentGrade->quarter = 1;
            $studentGrade->save();
        }
        $studentGrade = new Grade();
        return redirect()->back()->with('message', 'Grades Added Successfully.');
    }
}

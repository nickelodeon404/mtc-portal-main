<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Section;
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
            ->join('student_section', 'users.id', '=', 'student_section.student_id')
            ->join('section', 'student_section.section_id', '=', 'section.id')
            ->join('strands', 'section.strand_id', '=', 'strands.id')
            ->where('subjects.id', '=', $subject->id)
            ->where('subject_loads.faculties_id', '=', $facultyID)
            ->select('users.*', 'strands.acronym as strand', 'subject_loads.id as subjectLoad', 'section.year_level', 'section.name as section' );
        
            
        if (request('year') ?? false) {
            $teacherload = $teacherload->where('section.year_level', '=', request('year'));
        }
        if(request('strand') ?? false){
            $teacherload = $teacherload->where('strands.id', '=', request('strand'));
        }
        if(request('section') ?? false){
            $teacherload = $teacherload->where('section.name', '=', request('section'));
        }
        $teacherload = $teacherload->get();


        // $teacherload = User::findorFail($facultyID)->teacherLoad;
        
        // dd(Section::distinct()->pluck('name'));
        return view('faculty.grade',[
            'students' => $teacherload,
            'subjects' => SubjectLoad::where('faculties_id', '=', auth()->user()->id)->get(),
            'actSubject' => $subject,
            'sections' => Section::distinct()->pluck('name')
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
    public function export_grade_pdf()
    {
        $enrolledData = Enrolled::all();
        $pdf = Pdf::loadView('pdf.enrolled', compact('gradeData'));
        return $pdf->stream('grade.pdf');
    }
}

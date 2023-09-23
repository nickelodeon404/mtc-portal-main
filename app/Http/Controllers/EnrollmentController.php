<?php

namespace App\Http\Controllers;

use App\Models\Enrolled;
use App\Models\Admission;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnrollmentController extends Controller
{
   	public function index()
    {
        $data = DB::table('admission')->orderBy('id')->get();

        // Fetch data for Enrollment section as well
        $enrollmentData = DB::table('enrollment')->orderBy('grade_level')->get();

        $enrolledData = DB::table('enrolled')->orderBy('grade_level')->get();

        return view('registrar.index', ['data' => $data, 'enrollmentData' => $enrollmentData, 'enrolledData' => $enrolledData]);

    }

    public function create()
    {
        return view('/student/enrollment.index'); //index is located at students -> its the folder name/"index.blade.php" -> its the index in /students/enrolment.index
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
    		'lrn' => 'required',
    		'email' => 'required',
        	'first_name' => 'required|max:50',
        	'middle_name' => 'nullable|max:50',
        	'last_name' => 'required|max:50',
        	'extension' => 'nullable|max:5',
        	'birthday' => 'required|date',
        	'age' => 'required|integer',
        	'mobile_number' => 'required|digits:11',
        	'facebook' => 'nullable',
        	'region' => 'required',
        	'province' => 'required',
        	'barangay' => 'required',
        	'city_municipality' => 'required',
        	'status' => 'required',
        	'grade_level' => 'required',
        	'junior_high' => 'required',
        	'graduation_type' => 'required',

    	]);

    	$enrollment = Enrollment::create($validatedData);

    	// Optionally, you can redirect to a success page or perform additional actions

        return redirect()->back()->with('success', 'Success!! Your enrollment was submitted!!');
    }

    public function show(string $id)
    {
        // Fetch data for editing using a Model
        // $item = YourModelName::findOrFail($id);

        // or, fetch data for editing using query builder
        $item = DB::table('enrollment')->where('id', $id)->first();

        return view('/registrar/show', ['item' => $item]); //'show' in the code is the show.blade.php.
    }

    public function view()
    {
        $enrollmentData = DB::table('enrollment')->orderBy('grade_level')->get()->toArray();//ordered by strand alphabetically

        $data = DB::table('admission')->orderBy('id')->get()->toArray();//ordered by strand alphabetically

        $enrolledData = DB::table('enrolled')->orderBy('grade_level')->get()->toArray();

        return view('registrar.enrollment_table', ['data' => $data, 'enrollmentData' => $enrollmentData, 'enrolledData' => $enrolledData]);
    }


    //ADD TO ENROLLED
    public function addToEnrolled($id)
{
    try {
        // Fetch the enrollment data using the provided $id
        $enrollment = Enrollment::findOrFail($id);

        // Store the data into the enrolled table
        Enrolled::create([
            'lrn' => $enrollment->lrn,
            'email' => $enrollment->email,
            'first_name' => $enrollment->first_name,
            'middle_name' => $enrollment->middle_name,
            'last_name' => $enrollment->last_name,
            'extension' => $enrollment->extension,
            'birthday' => $enrollment->birthday,
            'age' => $enrollment->age,
            'mobile_number' => $enrollment->mobile_number,
            'facebook' => $enrollment->facebook,
            'region' => $enrollment->region,
            'province' => $enrollment->province,
            'barangay' => $enrollment->barangay,
            'city_municipality' => $enrollment->city_municipality,
            'status' => $enrollment->status,
            'grade_level' => $enrollment->grade_level,
            'junior_high' => $enrollment->junior_high,
            'graduation_type' => $enrollment->graduation_type,
        ]);

        // Delete the data from the enrollment table
        $enrollment->delete();

        return redirect()->back()->with('success', 'Student added to enrolled successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An error occurred while transferring the student to enrolled.');
    }
}
    
    public function destroy($id)
    {
        $enrollment = Enrollment::find($id);

        if (!$enrollment) {
            // Handle the case where admission is not found, return a response, etc.
        }

        // Perform the deletion logic, for example:
        $enrollment->delete();

        // Optionally, redirect to a different route after successful deletion.
        return redirect('/enrollment_table-table');
    }

    public function studentIndex(){
        $userid = auth()->user()->id;
        // dd(Admission::where("users_id", "=", $userid)->first());
        return view("students.enrollment.index", [
            "admission" => Admission::where("users_id", "=", $userid)->first()
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrolled;
use Illuminate\Support\Facades\DB;

class EnrolledController extends Controller
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
    	$validatedData = $request->all();

    	$enrolled = Enrolled::create($validatedData);

    	// Optionally, you can redirect to a success page or perform additional actions

        return redirect()->back()->with('success', 'Success!! Your enrollment was submitted!!');
    }

    public function show(string $id)
    {
        // Fetch data for editing using a Model
        // $item = YourModelName::findOrFail($id);

        // or, fetch data for editing using query builder
        $item = DB::table('enrolled')->where('id', $id)->first();

        return view('/registrar/show', ['item' => $item]); //'show' in the code is the show.blade.php.
    }

    public function view()
    {
        $enrollmentData = DB::table('enrollment')->orderBy('grade_level')->get()->toArray();//ordered by strand alphabetically

        $data = DB::table('admission')->orderBy('id')->get()->toArray();//ordered by strand alphabetically

        $enrolledData = DB::table('enrolled')->orderBy('grade_level')->get()->toArray();

        return view('registrar.enrolled_table', ['data' => $data, 'enrollmentData' => $enrollmentData, 'enrolledData' => $enrolledData]);
    }

    public function destroy($id)
    {
        $enrolled = Enrolled::find($id);

        if (!$enrolled) {
            // Handle the case where admission is not found, return a response, etc.
        }

        // Perform the deletion logic, for example:
        $enrolled->delete();

        // Optionally, redirect to a different route after successful deletion.
        return redirect('/enrolled_table-table');
    }


 
}

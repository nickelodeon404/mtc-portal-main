<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrolled;
use App\Models\Strand;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

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
        // Assuming you have a variable $enrolled representing your model
        $enrolled->section = $request->input('section');
        // Other assignment of values
        $enrolled->save();


        // Optionally, you can redirect to a success page or perform additional actions

        return redirect()->back()->with('success', 'Success!! Your enrollment was submitted!!');
    }

    public function show(string $id)
    {
        // Fetch data for editing using a Model
        // $item = YourModelName::findOrFail($id);

        // or, fetch data for editing using query builder
        
        //$item = DB::table('enrolled')->where('id', $id)->first();

        //return view('/registrar/show_enrolled', ['item' => $item]); //'show' in the code is the show.blade.php.
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
        return redirect()->back()->with('success', 'Student data deleted successfully.');
    }

    public function export_user_pdf(Request $request)
    {
        // Get the filter criteria from the request
        $strandFilter = $request->input('strand');
        $sectionFilter = $request->input('section');
        $gradelevelFilter = $request->input('grade_level');
    
        // Start with a base query
        $query = Enrolled::query();
    
        // Apply filters based on the provided criteria
        if ($strandFilter) {
            $query->where('strand', $strandFilter);
        }
    
        if ($sectionFilter) {
            $query->where('section', $sectionFilter);
        }
    
        if ($gradelevelFilter) {
            $query->where('grade_level', $gradelevelFilter);
        }
    
        // Fetch filtered data
        $enrolledData = $query->get();
    
        // Load the view for PDF
        $pdf = PDF::loadView('pdf.enrolled', compact('enrolledData'));
    
        // Return the PDF file for download/streaming
        return $pdf->stream('enrolled.pdf');
    }

 
}

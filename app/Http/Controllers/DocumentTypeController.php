<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AcademicRecordDocuments;
use App\Models\DocumentType; // Make sure to import the RecordRequest model
//use App\Models\Admission; //NEWLY ADD
use Illuminate\Support\Facades\Http;
//use Twilio\Rest\Client; //NEWLY ADDED

class DocumentTypeController extends Controller
{
    public function index()
    {
        // dd("hello");
        $data = DB::table('admission')->orderBy('strand')->get();
        $G11 = DB::table('users')
            ->join('student_section', 'student_section.student_id', '=', 'users.id')
            ->join('section', 'student_section.section_id', '=', 'section.id')
            ->join('strands', 'strands.id', '=', 'section.strand_id')
            ->where('section.year_level', '=', '11')
            ->where('users.role_id', '=', 3)
            ->selectRaw('strands.acronym as acronym, COUNT(*) as users_count')
            ->groupBy('strands.acronym')
            ->get();
        $G12 = DB::table('users')
        ->join('student_section', 'student_section.student_id', '=', 'users.id')
        ->join('section', 'student_section.section_id', '=', 'section.id')
        ->join('strands', 'strands.id', '=', 'section.strand_id')
        ->where('section.year_level', '=', '12')
        ->where('users.role_id', '=', 3)
        ->selectRaw('strands.acronym as acronym, COUNT(*) as users_count')
        ->groupBy('strands.acronym')
        ->get();
        // Fetch data for Enrollment section as well
        $enrollmentData = DB::table('enrollment')->orderBy('grade_level')->get();

        $enrolledData = DB::table('enrolled')->orderBy('grade_level')->get();

        $reqDocument = DB::table('document_types')->get();

        return view('registrar.index', [
            'data' => $data,
            'enrollmentData' => $enrollmentData,
            'enrolledData' => $enrolledData,
            'reqDocument' => $reqDocument,
            'G11' => $G11,
            'G12' => $G12
        ]);
    }

    public function create()
    {
        // return view('/students/academic/index');
    }

    public function view()
    {
        $data = DB::table('admission')->orderBy('strand')->get()->toArray(); //ordered by strand alphabetically

        $enrollmentData = DB::table('enrollment')->orderBy('grade_level')->get()->toArray(); //ordered by strand alphabetically

        $enrolledData = DB::table('enrolled')->orderBy('grade_level')->get()->toArray();

        $reqDocument = DB::table('document_types')->get()->toArray();

        return view('registrar.academic_record_request_table', ['data' => $data, 'enrollmentData' => $enrollmentData, 'enrolledData' => $enrolledData, 'reqDocument' => $reqDocument]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student' => 'required',
            'transaction_number' => 'required',
            'mobile_number' => 'required',
            'document_type' => 'required|array',
            'purpose' => 'required'
        ]);
/*
        //NEWLY ADDED
        Admission::create([
            "mobile_number" => $validatedData['mobile_number'],
        ]);
        
        //END OF NEWLY ADDED
*/
        $ard = $validatedData['document_type']; //$ard means academic record documents

        // Loop through the selected document types and save them
        foreach ($ard as $ard) {
            // Create a new DocumentType instance and save it
            $documentType = new DocumentType();
            $documentType->student = $validatedData['student'];
            $documentType->transaction_number = $validatedData['transaction_number'];
            $documentType->mobile_number = $validatedData['mobile_number'];
            $documentType->document_type = $ard;
            $documentType->purpose = $validatedData['purpose'];
            $documentType->save();

            //$this->sendSmsAcademicRecordRequest($ard, $validatedData['mobile_number']);//NEWLY ADD
        }

        return redirect()->back()->with('success', 'Success!! Your request was submitted!!');
    }

    public function destroy($id)
    {
        $ard = DocumentType::find($id);

        if (!$ard) {
            // Handle the case where admission is not found, return a response, etc.
        }

        // Perform the deletion logic, for example:
        $ard->delete();

        // Optionally, redirect to a different route after successful deletion.
        return redirect('/academic_record_request_table-table');
    }
}
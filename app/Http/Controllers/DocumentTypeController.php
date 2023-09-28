<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AcademicRecordDocuments;
use App\Models\DocumentType; // Make sure to import the RecordRequest model

class DocumentTypeController extends Controller
{
    public function index()
    {
        $data = DB::table('admission')->orderBy('strand')->get();
        $G11 = DB::table('users')
            ->join('strands', 'users.strands_id', '=', 'strands.id')
            ->where('users.role_id', '=', 3)
            ->where('users.year_level', '=', '11')
            ->selectRaw('strands.acronym, COUNT(*) as studentsCount')
            ->groupBy('strands.acronym')
            ->get();
        $G12 = DB::table('users')
            ->join('strands', 'users.strands_id', '=', 'strands.id')
            ->where('users.role_id', '=', 3)
            ->where('users.year_level', '=', '12')
            ->selectRaw('strands.acronym, COUNT(*) as studentsCount')
            ->groupBy('strands.acronym')
            ->get();
            // dd($G12);
        // $G12 = User::where('role_id', '=', '3')->where('year_level', '=', '12')->get();
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
            'name' => 'required',
            'document_type' => 'required|array',
        ]);

        $ard = $validatedData['document_type']; //$ard means academic record documents

        // Loop through the selected document types and save them
        foreach ($ard as $ard) {
            // Create a new DocumentType instance and save it
            $documentType = new DocumentType();
            $documentType->name = $validatedData['name'];
            $documentType->document_type = $ard;
            $documentType->save();
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
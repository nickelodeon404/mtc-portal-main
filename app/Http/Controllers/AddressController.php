<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function getMunicipalities(Request $request)
    {
        $municipalities = DB::table('municipalities')
            ->where('province_id', $request->province_id)
            ->get();

        return response()->json($municipalities);
    }

    public function getBarangays(Request $request)
    {
        $barangays = DB::table('barangay') // Assuming your table is named "barangays"
            ->where('municipality_id', $request->municipality_id)
            ->get();

        return response()->json($barangays);
    }
}

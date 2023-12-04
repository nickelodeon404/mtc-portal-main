<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Municipality;
use App\Models\Barangay;
use App\Models\Province;

class AddressController extends Controller
{
    public function getMunicipalities(Request $request)
    {
        $municipalities = Municipality::where('name', $request->name)
            ->with('province') // Load related province data
            ->get();

        return response()->json($municipalities);
    }

    public function getBarangays(Request $request)
    {
        $barangays = Barangay::where('municipality_id', $request->municipality_id)
            ->with('municipality') // Load related municipality data
            ->get();

        return response()->json($barangays);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function getMunicipalities(Request $request)
{
    $provinceName = $request->province_id;
    $province = \App\Models\Province::where('name', $provinceName)->first();

    if (!$province) {
        return response()->json([]);
    }

    $municipalities = \App\Models\Municipality::where('province_id', $province->id)->get(['name']);

    return response()->json($municipalities);
}

public function getBarangays(Request $request)
{
    $municipalityName = $request->municipality_id;
    $municipality = \App\Models\Municipality::where('name', $municipalityName)->first();

    if (!$municipality) {
        return response()->json([]);
    }

    $barangays = \App\Models\Barangay::where('municipality_id', $municipality->id)->get(['name']);

    return response()->json($barangays);
}

}

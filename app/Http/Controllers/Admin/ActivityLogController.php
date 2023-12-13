<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    public function index()
    {
        $activityLogs = ActivityLog::latest()->get(); // Retrieving all logs without pagination
        return view('registrar.activity_log', compact('activityLogs'));
    }

    public function destroy($id)
    {

        $actlog = ActivityLog::find($id);

        if (!$actlog) {
            // Handle the case where admission is not found, return a response, etc.
        }

        // Perform the deletion logic, for example:
            $actlog->delete();

        // Optionally, redirect to a different route after successful deletion.
        return redirect()->back()->with('success', 'Success!! Log successfully deleted');
    }
}

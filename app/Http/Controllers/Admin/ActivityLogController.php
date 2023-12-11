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
}

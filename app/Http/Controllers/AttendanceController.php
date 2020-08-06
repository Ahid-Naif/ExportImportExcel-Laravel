<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\AttendanceImport;
use App\Exports\AttendanceExport;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    public function import(Request $request) 
    {
        // first, upload the file to the storage
        $request->file->storeAs('Attendance', 'attendance.xlsx');

        Excel::import(new AttendanceImport, '../storage/app/Attendance/attendance.xlsx');
        
        return redirect('/')->with('success', 'All good!');
    }

    public function export() 
    {
        return Excel::download(new AttendanceExport, 'attendance.xlsx');
    }
}
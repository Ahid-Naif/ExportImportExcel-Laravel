<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\AttendanceImport;
use App\Exports\AttendanceExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function import(Request $request) 
    {
        // first, upload the file to the storage
        $request->file->storeAs('Attendance', 'attendance.xlsx');

        Excel::import(new AttendanceImport, '../storage/app/Attendance/attendance.xlsx');
        
        return redirect('/');
    }

    public function exportView(Request $request)
    {
        switch($request['action'])
        {
            case 'save':
                $this->export();
            break;

            case 'export':

            default:
                if(isset($_GET['from-date']) && isset($_GET['to-date']))
                {
                    $attendances = Attendance::whereBetween('date', [new Carbon($_GET['from-date']), new Carbon($_GET['to-date'])])->get();
                }
                else
                {
                    $attendances = Attendance::get();
                }
        
                return view('exportview', compact('attendances'));
            break;
        }
    }

    public function export() 
    {
        return Excel::download(new AttendanceExport, 'attendance.xlsx');
    }
}
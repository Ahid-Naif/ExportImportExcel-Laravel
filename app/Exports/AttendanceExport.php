<?php

namespace App\Exports;

use App\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Attendance::get(['EmpID','Date', 'Time']);
    }
}
<?php

namespace App\Exports;

use App\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class AttendanceExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // if(isset($_GET['from-date']) && isset($_GET['to-date']))
        // {
        //     $attendances = Attendance::whereBetween('date', [new Carbon($_GET['from-date']), new Carbon($_GET['to-date'])])->get(['empID','date', 'time']);
        // }
        // else
        // {
            $attendances = Attendance::get(['empID','date', 'time']);
        // }

        return $attendances;
    }
}
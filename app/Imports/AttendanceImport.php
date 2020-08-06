<?php

namespace App\Imports;

use App\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;

class AttendanceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $empID = $row[0];
        $date  = explode(' ', $row[2])[0];
        $time  = explode(' ', $row[2])[1];

        return new Attendance([
            'empID' => $empID,
            'date'  => $date,
            'time'  => $time,
        ]);
    }
}
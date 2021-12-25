<?php

namespace App\Imports;

use App\Models\CSVImport;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new CSVImport([
            'employee_id'     => $row['employee_id'],
            'employee_name'    => $row['employee_name'],
            'relation'    => $row['relation'],
            'doj'    => $row['doj'],
            'dob'    => $row['dob'],
            'gender'    => $row['gender'],
            'age'    => $row['age'],
            'email_id'    => $row['email_id'],
            'mobile_no'    => $row['mobile_number'],
        ]);
    }
}

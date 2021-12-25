<?php

namespace App\Exports;

use App\Models\CSVImport;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CSVImport::all();
    }
}

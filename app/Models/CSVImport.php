<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CSVImport extends Model
{
    use HasFactory;

    protected $table = 'csvimports';

    protected $fillable = [
        'title',
        'quote_no',
        'employee_id',
        'employee_name',
        'relation',
        'doj',
        'dob',
        'gender',
        'age',
        'email_id',
        'mobile_no',
    ];
}

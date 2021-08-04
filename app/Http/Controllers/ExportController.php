<?php

namespace App\Http\Controllers;
use App\Exports\TimekeepExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    //
    public function export_timekeep()
    {
        return Excel::download(new TimekeepExport, 'chamcongNV.xlsx');
    }
}

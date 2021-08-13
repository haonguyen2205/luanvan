<?php

namespace App\Http\Controllers;
use App\Exports\TimekeepExport;
use App\Exports\StaffExport;
use App\Exports\RoomondayExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    //
    public function export_timekeep()
    {
        return Excel::download(new TimekeepExport, 'chamcongNV.xlsx');
    }

    public function export_staff()
    {
        return Excel::download(new RoomondayExport,'songuoio.xlsx');
    }
}

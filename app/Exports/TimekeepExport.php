<?php

namespace App\Exports;

use App\Models\timekeep;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TimekeepExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return timekeep::all();
    }

    public function headings(): array {
        return [
            'timekeep_id',
            'users_id',
            'time_in',    
            "time_out",
            
        ];
    }
 
    public function map($timekeep): array {
        return [
            $timekeep->timekeep_id,
            $timekeep->users_id,
            $timekeep->time_in,
            $timekeep->time_out,
        ];
    }
}

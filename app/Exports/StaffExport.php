<?php

namespace App\Exports;

use App\Models\users;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StaffExport implements FromCollection,WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return users::where('role',1)->where('status',1)->get();
    }

    public function headings(): array {
        return [
            'users_id',
            'name',
            'email',    
            "position", 
            
        ];
    }
 
    public function map($users): array {
        return [
            $users->users_id,
            $users->name,
            $users->email,
            $users->,
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\users;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use App\Models\type; 
use App\Models\room;
use App\Models\image;
use App\Models\order_detail;
use App\Models\order;
use DB;

class StaffExport implements FromCollection,WithHeadings, WithMapping
{
    // 
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function collection()
    {
        
    }

    public function headings(): array {
        return [
            'tenphong',
            'loaiphong',
            'giaphong',    
            'songuoilon',
            'sotreem',
        ];
    }
 
    public function map($r): array {
        return [
            $r->room_name,
            $r->type_id,
            $r->room_price,
            
        ];
    }
}

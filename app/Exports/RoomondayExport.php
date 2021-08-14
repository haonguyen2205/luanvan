<?php

namespace App\Exports;

use App\Models\room;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

use DB;
use App\Models\image;
use App\Models\order_detail;
use App\Models\order;
class RoomondayExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection,
    */
    public function collection()
    {
        // return room::all();
        $mytime = date("Y-m-d");
        $order=DB::table('order')->where('status',3)->where('dayat','<=',$mytime)
        ->where('dayout','>=',$mytime)
        ->get();


        // print_r($order); exit;
        $detail = array();
        foreach ($order as $key => $val) {
            // echo $val->order_id; 
            $detail[]=DB::table('order_details')->where('order_id',$val->order_id)->get();
        }
        $r=array();
        // print_r($detail);exit;
        $songuoilon=0;
        $sotreem=0;
        foreach($order as $o)
        {  
            if($mytime >= $o->dayat && $mytime <= $o->dayout)
            {
                $songuoilon =$songuoilon+ $o->adults;
                $sotreem=$sotreem+ $o->children;
            }
        }  
            // if($mytime >= $o->dayat && $mytime <= $o->dayout) //dayat ngày vào nhận
            // {
        foreach($detail as $od)
        {
                $s=$od[0]->room_id;
                // echo $s;
                 $r[]=room::select('room_name','type_id','room_price')->where('room_id',$s)
                 ->get()->all();  
        }   

        // foreach($r as $rs)
        // {
        //     echo $rs[0]->room_name;
        // }
        // exit;



        return collect($r,$sotreem,$songuoilon);
        
    }
    public function headings(): array {
        return [
            'tenphong',
            'loaiphong',
            'giaphong',    
            'songuoilon = 4',
            'sotreem = 1',
        ];
    }
 
    public function map($r): array {
        return [
           [$r[0]->room_name,
        
           $r[0]->type_id,
           $r[0]->room_price, 
        ],
            
        ];
    }
}

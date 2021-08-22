<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class XuLyPhongController extends Controller
{
    function index(Request $request){
        $timein=Carbon::create($request->dayat);
        $now= Carbon::now('Asia/Ho_Chi_Minh')->toDateString(); 
        if($timein->toDateString() <= $now) return redirect('rooms'); //điều kiện để kiểm tra ngày
        $timeout=Carbon::create($request->dayout);
        if($timeout<$timein) return redirect('rooms');
        $timein=$timein->year."-".$timein->month."-".$timein->day;
        $timeout=$timeout->year."-".$timeout->month."-".$timeout->day;
        $t=DB::table('order')->where('dayout','>=',$timein)->where('dayat','<=',$timeout)->where([['status','<>',4],['status','<>',-1],['status','<>',0]])->get();
    

        $r=DB::table('room')->get();
        $viewData=[
            'room'=>$r,
            'order'=>$t,
            'dayat'=>$timein,
            'dayout'=>$timeout
        ];
       
        return view('layout.ro',$viewData);






        $ngaytrong = array();
        do{
            $ngaytrong[]=
                $timein->year."-".$timein->month."-".$timein->day
            ;
            $timein->addDay();
        }while($timein->day!=$timeout->day);
        
        
        $ngaytrong[]=$timein->year."-".$timein->month."-".$timein->day;
        $trongvl=array();
       
        //foreach($ngaytrong as $s)
        //{
          //$trongvl[]=DB::table('order')->where('dayout','>=',$s)->orWhere('dayat',$s)->where('order_status_id','<>',0)->first();

        //}
        
    $idoder=array();
    foreach($trongvl as $vl){
        if($vl!=null){
        $idoder[]=DB::table('order_details')->where('order_id',$vl->order_id)->first();
        }
    }
    $room=array();

        $room=DB::table('room')->get();


    $test=array();
    
    foreach($room as $r){
        foreach($idoder as $d){
            if($d!=null){
                if($r->room_id == $d->room_id)
                {
                    //$4d->order_id
                    foreach($trongvl as $vl){
                        if($vl!=null){
                            if($vl->order_id == $d->order_id ){
                                $image = DB::table('image')->where('room_id',$r->room_id)->first();
                                $test[]=[
                                    'dayat'=>$vl->dayat,
                                    'dayout'=>$vl->dayout,
                                    'room_id'=>$r->room_id,
                                    'room_name'=>$r->room_name,
                                    'room_price'=>$r->room_price,
                                    'room_image'=>$r->image
                                    
                                ];
                            }
                        }

                    }
                }
            }
        }
    }
   
    $check=array();
    foreach($room as $r){
        $temp=array();
        foreach($test as $t){
            if($r->room_id==$t['room_id'])
            {
                $temp[]=$t;
            }
        }
        $check[]=$temp;
    }
   
   for($i=0;$i<100;$i++){
      if(empty($check[$i])){
          foreach($room as $r){
              if($r->room_id  == $i+1){
                    $check[$i]=$r;
              }
          }
      }
   }


$roomkhac=array();
$hinhanh=DB::table('image')->get();
foreach($room as $r){
    foreach($check as $i){

        if(empty($i)==false || $r->room_id == $i[0]['room_id'])
        {
            break;

        }
        else {

            
            $roomkhac[]=[
                'room_id'=>$r->room_id,
                'room_name'=>$r->room_name,
                'room_price'=>$r->room_price,
                'image'=>$r->image
               
            ];
        }
        break;
    }
}

for( $i = 0 ; $i < count($roomkhac);$i++){
    foreach($test as $t){
        if(isset($roomkhac[$i])){
        if($roomkhac[$i]['room_id']==$t['room_id'])
            unset($roomkhac[$i]);
    }}
}

    
    $viewData=[
        'result'=>$check,
        'dsngay'=>$ngaytrong,
        'roomkhac'=>$roomkhac,
        'dayat' => $request->dayat,
        'dayout' =>$request->dayout,
        'hinhanh'=>$hinhanh
    ];

    return view('layout.ro',$viewData);

        /*
        $trong=DB::table('order')->where('dayat','>=',
        $timein->year."-".$timein->month."-".$timein->day)->where('dayout',
        '<=',$timeout->year."-".$timeout->month."-".$timeout->day)->get();
        $sin=Carbon::create($request->dayat);
        $sout=Carbon::create($request->dayout);
        $cin=Carbon::create($request->dayat);
        $cout=Carbon::create($request->dayout);
        do{
            $dat=DB::table('order')->where('dayat',
            $timein->year."-".$timein->month."-".$timein->day)->first();

            if($dat){
                $sin->addDay();
            }
            else{

            }
            $sin=$timein->addDay();
            echo $sin->day;
        }while($timein->day!=$timeout->day);
        dd($timein->addDay(2)->day,$timein->year);
*/
    }
}

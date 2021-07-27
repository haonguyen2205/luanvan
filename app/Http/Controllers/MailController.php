<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Mail;

class MailController extends Controller
{
    //
    public function send_mail()
    {
        $to_name="AUTO_MAIL";
        $to_email="haonguyen.sign99@gmail.com";

        $data= array("name"=>"mail gửi từ khách sạn","body"=>"đơn đặt phòng của bạn");

        Mail::send('Admin.mail.verify',$data,function($message)use ($to_name,$to_email)
        {
            $message->to($to_email)->subject('ktra gửi thư');
            $message->from($to_email,$to_name);
        });

        return redirect('/')->with('messs','');
    }
}

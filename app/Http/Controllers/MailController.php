<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function send_mail(Request $request){
        $name=$request->name;
        $email=$request->email;
        $phone=$request->phone;
        $msg=$request->msg;
    Mail::to('siminchenko@gmail.com')->send(new ContactMail($name,$email,$phone,$msg));
        return redirect()->back();
    }



}

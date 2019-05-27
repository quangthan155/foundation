<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMailRegisterSuccessfully;
use Mail; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        return view('admin');
    }

    public function testSendingMail()
    {
        $comment = 'Hi, This test feedback.';
        $toEmail = "quangthan155@gmail.com";
        Mail::to($toEmail)->send(new SendMailRegisterSuccessfully($comment));

        return 'Email has been sent to ' . $toEmail;
    }
}

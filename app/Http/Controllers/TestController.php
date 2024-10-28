<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

class TestController extends Controller
{


public function index()
{
    Mail::to('mohitdevlpoer@gmail.com')->send(new TestEmail());

    return 'Email sent successfully!';
}

    //
}

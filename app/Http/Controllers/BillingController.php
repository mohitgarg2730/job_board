<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    //
    public function index()
    {
        return view('company.plans.index');
    }
    public function list()
    {
        $id = Auth::id();
        $p = Payment::where('user_id', $id)->with('plan')->get()->toArray();
        return view('company.billing.table', ['p' => $p]);
    }
}

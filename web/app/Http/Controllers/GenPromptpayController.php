<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenPromptpayController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {
        $pp = new \KS\PromptPay();
        
        $target = '0856270889';
        if ($request->input('target')) {
            $target = $request->input('target');
        }
        $amount = 0;
        if ($request->input('amount')) {
            $amount = $request->input('amount');
        }

        $width = 400;
        $name = $target.'-'.$amount;
        $pp->generateQrCode("qr-promptpay/$name.png", $target, $amount, $width);

        return "<img src='qr-promptpay/$name.png' >";
    }
}

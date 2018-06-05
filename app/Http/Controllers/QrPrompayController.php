<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrPrompayController extends Controller
{
    public function index(Request $request)
    {
        // return 1;
        $pp = new \KS\PromptPay();
        $width = 400;

        //Generate PromptPay Payload
        $target = '0899999999';
        if ($request->input('target')) {
            $target = $request->input('target');
        }

        $amount = 0;
        if ($request->input('amount')) {
            $amount = $request->input('amount');
        }

        $qrname = $target .'-'. $amount;

        $pp->generateQrCode("qr-prompay/$qrname.png", $target, $amount, $width);

        return "<img src='/qr-prompay/$qrname.png' alt='$qrname'>";
    }
}

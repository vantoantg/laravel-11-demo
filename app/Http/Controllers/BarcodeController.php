<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Milon\Barcode\Facades\DNS1DFacade;
use Milon\Barcode\Facades\DNS2DFacade;

class BarcodeController extends Controller
{
    public function generate()
    {
        $barcode = DNS1DFacade::getBarcodeHTML('123456789012', 'EAN13');
        $qrcode = DNS2DFacade::getBarcodeHTML('https://codetuthub.com', 'QRCODE');

        return view('barcode', compact('barcode', 'qrcode'));
    }
}

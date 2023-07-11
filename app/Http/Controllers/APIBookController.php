<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIBookController extends Controller
{
    public function cetak($judulbaru)
    {
        return $judulbaru;
    }
}

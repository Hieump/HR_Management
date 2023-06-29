<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChamcongController extends Controller
{
     public function getchamcong()
    {
        return view('Chamcong.chamcong');
    }
}

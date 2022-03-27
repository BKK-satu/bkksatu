<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function cek(Request $request)
    {
        $mytime = Carbon::now('Asia/Jakarta');
        echo $mytime->toDateTimeString();
        dd($request->all());
    }
}

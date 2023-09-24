<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ConnectController
{

    public function index():View
    {
        return view('connect.index');
    }

}

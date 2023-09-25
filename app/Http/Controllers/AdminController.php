<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class AdminController
{

    function index():View
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

}

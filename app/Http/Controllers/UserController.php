<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function manageStaff()
    {
        return view('admin.manage');
    }
}

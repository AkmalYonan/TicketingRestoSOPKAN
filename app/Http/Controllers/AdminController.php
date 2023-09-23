<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexMeja()
    {
        return view('admin.meja');
    }
    public function indexMenu()
    {
        return view('admin.menu');
    }
}

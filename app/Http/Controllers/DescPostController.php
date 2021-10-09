<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DescPostController extends Controller
{
    public function index()
    {
        return view('desc/desc_add');
    }
}

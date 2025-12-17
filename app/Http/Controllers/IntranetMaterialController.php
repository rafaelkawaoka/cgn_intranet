<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntranetMaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('intranet.material.index');
    }
}

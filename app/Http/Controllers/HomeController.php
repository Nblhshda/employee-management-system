<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resources\Views\welcome;
use App\Resources\Views\index;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function homepage()
    {
        return view('index');
    }
}

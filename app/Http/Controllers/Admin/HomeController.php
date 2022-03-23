<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Restaurant;

class HomeController extends Controller
{
    public function index(){
        return view('admin.home');
    }
}

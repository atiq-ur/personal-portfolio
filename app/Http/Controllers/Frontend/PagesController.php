<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('frontend.pages.home.index');
    }
    public function portfolio(): string
    {
        return 'success';
    }
}

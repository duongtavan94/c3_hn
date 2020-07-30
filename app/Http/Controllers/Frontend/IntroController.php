<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Intro;
use App\Models\Bill;

class IntroController extends Controller
{
    public function index()
    {
        $intro = Bill::first();

        return view('frontend.intro', compact('intro'));
    }
}

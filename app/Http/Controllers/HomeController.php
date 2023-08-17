<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    function IndexPage():View{
        $featurEvents = Event::where()->inRandomOrder()->take(3)->get();
        return view('frontend.pages.index-page',compact('featurEvents'));
    }
}

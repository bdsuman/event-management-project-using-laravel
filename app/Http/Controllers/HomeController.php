<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    function IndexPage():View{
        $featurEvents = Event::where('type','Feature')->inRandomOrder()->take(4)->get();
        $recentEvents = Event::where('type','Recent')->inRandomOrder()->latest()->paginate(6);
        return view('frontend.pages.index-page',compact('featurEvents','recentEvents'));
    }
}

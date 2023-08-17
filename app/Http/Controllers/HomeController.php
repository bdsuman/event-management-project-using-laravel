<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\View\View;
use App\Models\Registration;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function IndexPage():View{
        $featurEvents = Event::where('type','Feature')->inRandomOrder()->latest()->take(4)->get();
        $recentEvents = Event::where('type','Recent')->inRandomOrder()->latest()->paginate(6);
        return view('frontend.pages.index-page',compact('featurEvents','recentEvents'));
    }

    public function PostPage($id){

        $post=Event::find($id);
        $raletedEvents = Event::where('type','Recent')->where('categorie_id',$post->categorie_id)->inRandomOrder()->take(3)->get();
        return view('frontend.pages.post-page',compact('post','raletedEvents'));
    }
    function EventRegistration (Request $request){
       Registration::create([
            'name'=>$request->input('name'),
            'mobile'=>$request->input('mobile'),
            'email'=>$request->input('email'),
            'remark'=>$request->input('remark'),
            'event_id'=>$request->input('event_id'),
            'user_id'=>$request->input('user_id')
        ]);

        return redirect()->back()->with('success', 'Your Registration Confirm'); 
    }
}

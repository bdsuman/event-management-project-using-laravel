<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    function EventPage(){
        $categories = Category::select('id','name')->orderBy('name', 'asc')->get();
        return view('backend.pages.dashboard.event-page',compact('categories'));
    }

    function EventList(Request $request){
        $user_id=auth()->id();
        return Event::with('category')->where('user_id',$user_id)->get();
    }

    function EventCreate(Request $request){
        $user_id=auth()->id();
        return Event::create([
            'date'=>$request->input('date'),
            'amount'=>$request->input('amount'),
            'description'=>$request->input('description'),
            'categorie_id'=>$request->input('categorie_id'),
            'user_id'=>$user_id
        ]);
    }

    function EventDelete(Request $request){
        $event_id=$request->input('id');
        $user_id=auth()->id();;
        return Event::where('id',$event_id)->where('user_id',$user_id)->delete();
    }


    function EventByID(Request $request){
        $event_id=$request->input('id');
        $user_id=auth()->id();;
        return Event::where('id',$event_id)->where('user_id',$user_id)->first();
    }



    function EventUpdate(Request $request){
        $event_id=$request->input('id');
        $user_id=auth()->id();;
        return Event::where('id',$event_id)->where('user_id',$user_id)->update([
            'date'=>$request->input('date'),
            'amount'=>$request->input('amount'),
            'description'=>$request->input('description'),
            'categorie_id'=>$request->input('categorie_id'),
            'user_id'=>$user_id
        ]);
    }
}

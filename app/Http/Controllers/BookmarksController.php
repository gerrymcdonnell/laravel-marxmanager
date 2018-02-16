<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;

class BookmarksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'name'=>'required',
            'url'=>'required'
        ]);

        //create
       $bookmark=new Bookmark;

        //get the input
        $bookmark->name=$request->input('name');
        $bookmark->url=$request->input('url');
        $bookmark->description=$request->input('description');

        $bookmark->user_id=auth()->user()->id;


        //save it
        $bookmark->save();

        //flash message and redirect
        return redirect('/dashboard')
            ->with('success','Saved Listing');
    }


}

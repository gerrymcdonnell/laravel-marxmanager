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
        $bookmarks=Bookmark::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();

        return view('home')->with('bookmarks',$bookmarks);
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
        return redirect('/home')
            ->with('success','Saved Listing');
    }


    public function show($id)
    {
        //get the record
        $bookmark=Bookmark::find($id);
        //return the view and pass in the todo variable
        return view('bookmarks.show')
            ->with('bookmark',$bookmark);
    }


    public function destroy($id)
    {
        $bookmark=Bookmark::find($id);
        $bookmark->delete();

        //flash message and redirect
        return redirect('/dashboard')
            ->with('success','Listing deleted');
    }




    //show the edit form
    public function edit($id)
    {
        $bookmark=Bookmark::find($id);
        return view('listings.edit')
            ->with('listing',$bookmark);
    }



    //update the data from the edit form
    public function update(Request $request, $id)
    {
        //validation
        $this->validate($request,[
            'name'=>'required',
            'url'=>'required'
        ]);

        $bookmark=Bookmark::find($id);
        //get the input
        $bookmark->name=$request->input('name');
        $bookmark->url=$request->input('url');

        $bookmark->user_id=auth()->user()->id;

        //save it
        $bookmark->save();

        //flash message and redirect
        return redirect('/dashboard')
            ->with('success','Updated Listing');
    }


}

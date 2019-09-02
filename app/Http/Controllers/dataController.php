<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use Session;

class dataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //we will store all the records in a variable $posts
        $posts = data::paginate(5);
        //send the $posts variable to the index view
        return view('index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the form data e.g title
        $this->validate($request,array('title'=>'required|max:255'));

        // create an instance of the data model
        $post = new data;
        // storing the title
        $post->title = $request->title;
        // saving the data to database
        $post->save();

        // setting a session message -  flash message
        Session::flash('success', 'Record created successfully');
        // redirect to show url
        return redirect()->route('data.show', $post->id);
        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // extract the title from the database table
        $post = data::find($id);
        return view('show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // extract the record from the database table
        $post = data::find($id);
        return view('edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the input title field
        $this->validate($request, array('title' => 'required|max:255'));
        //get the record to update from DB
        $post = data::find($id);
        //update the record
        $post->title = $request->title;
        $post->save();

        // setting a session message -  flash message
        Session::flash('success', 'Record updated successfully');
        // redirect to show url
        return redirect()->route('data.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get the record
        $post = data::find($id);
        // perform delete action
        $post->delete();
        // set flash message
        Session::flash('success', 'The record was successfully delete');
        return redirect()->route('data.index');
    }
}

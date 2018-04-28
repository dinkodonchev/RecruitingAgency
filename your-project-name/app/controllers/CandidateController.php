<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Candidate;


class CandidateController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all the blogposts in it from the database
        $candidates = Candidate::orderBy('id', 'desc')->paginate(2);

        //return a view and pass in the above variable
        return view('candidates.index')->withCandidates($candidates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $offers = JobOffer::all();

        return view('candidates.create')->withOffers($offers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
                'name' => 'required|max:255',
                'experience' => 'required|integer',
                'id'   => 'required|integer'
                
            ));
        //store in the database
        $candidate = new Candidate;

        $post->name = $request->name;
        $post->slug = $request->slug;
        $candidate->category_id = $request->category_id;
        


        $candidate->save();

        Session::flash('success', 'The candidate was successfully saved!');

        //redirect to another page or action
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the db and save it as a variable
        $post = Post::find($id);
        //return the view and pass that info in the var we previously created
        return view('posts.edit')->withPost($post);


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
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug){
            $this->validate($request, array(
                'title'=>'required|max:255',
                'body'=>'required'
            ));
        }
        else{
        //validate the data 
        $this->validate($request, array(
                'title'=>'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body'=>'required'
            ));
        }

        //save the data to the db
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');

        $post->save();

        //set flash with success message
        Session::flash('success', 'This post was successfully saved!');

        //redirect with flash to show request
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'The post was successfully deleted.');
        return redirect()->route('posts.index');
    }
}

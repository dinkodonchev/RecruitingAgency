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

        $candidate->name = $request->name;
        
        $candidate->experience = $request->experience;
        


        $candidate->save();

        Session::flash('success', 'The candidate was successfully saved!');

        //redirect to another page or action
        return redirect()->route('candidates.show', $candidate->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidate = Candidate::find($id);
        return view('candidates.show')->withCandidate($candidate);
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
        //find the candidate in the db and save it as a variable
        $candidate = Candidate::find($id);
        //return the view and pass that info in the var we previously created
        return view('$candidates.edit')->withCandidate($candidate);


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
        $candidate = Candidate::find($id);
       
        //save the data to the db
        

        $candidate->name = $request->input('name');
        $candidate->experience = $request->input('experience');
        

        $candidate->save();

        //set flash with success message
        Session::flash('success', 'This candidate was successfully saved!');

        //redirect with flash to show request
        return redirect()->route('candidates.show', $candidate->id);
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
        $candidate = Candidate::find($id);

        $candidate->delete();

        Session::flash('success', 'The candidate was successfully deleted.');
        return redirect()->route('candidates.index');
    }
}

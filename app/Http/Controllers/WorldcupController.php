<?php

namespace App\Http\Controllers;
use App\Worldcup;
use App\Winner;
use App\Participant;
use Illuminate\Http\Request;

class WorldcupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Worldcup::all();
        return view('worldcup',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
       $request->validate([
           'team1' => 'required|digits_between:0,10',
           'team2' => 'required|digits_between:0,10',
           'name' => 'required',
           'contact' => 'required',
           ]);
           
           $data = [
               'team1' => $request->team1,
               'team2' => $request->team2,
               'name' => $request->name,
               'contact' => $request->contact,
               'team1_name' => $request->team1_name,
               'team2_name' => $request->team2_name,
               ];
              
               Participant::create($data);
               return redirect()->back()->with('success','Your prediction is successfully submitted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        //
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
        //
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
    }
    
    public function winner(){
        $winners = Winner::all();
        return view('winner',compact('winners'));
    }
}

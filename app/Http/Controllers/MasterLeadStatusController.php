<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterLeadStatus;

class MasterLeadStatusController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $leadstatuses = MasterLeadStatus::all();
        return view("Prop_leadforms/leadstatus",compact('leadstatuses'));
    }


 /*public function tale()
    {
        $states = State::all();
        return view("Prop_propertyforms/state",compact('states'));
    }*/
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
        MasterLeadStatus::create([
            'leadstatus'=>$request->lead_status,
            ]);
            return response()->json(['success'=>'done']);
    }


      /*  public function store1(Request $request)
    {
        State::create([
            'State_Name'=>$request->state_name,
            ]);
            return response()->json(['success'=>'done']);
    }*/

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
        $leadstatus = MasterLeadStatus::find($id);
        return response()->json($leadstatus);
    }



/*
  public function edit1($id)
    {
        $state = State::find($id);
        return response()->json($state);
    }
*/



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        MasterLeadStatus::whereId($id)->update($request->except(['_token']));

        return response()->json(['success' => 'Lead Status is Successfully Updated']);
    }


   /*  public function update1(Request $request, $id)
    {
        State::whereId($id)->update($request->except(['_token']));

        return response()->json(['success' => 'State is Successfully Updated']);
    }
*/



    public function categoryActive(Request $request, $id)
    {
       
        MasterLeadStatus::where('id',$id)->update($request->all());

        return response()->json(['success' => 'Data is Successfully Updated']);
    }


    /*  public function stateActive1(Request $request, $id)
    {
       
        State::where('id',$id)->update($request->all());

        return response()->json(['success' => 'Data is Successfully Updated']);
    }*/


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
}

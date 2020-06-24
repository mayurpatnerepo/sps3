<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterPropCategory;

class MasterPropCategoryController extends Controller
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
        $propcategories = MasterPropCategory::all();
        return view("Prop_propertyforms/prop_category",compact('propcategories'));
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
        MasterPropCategory::create([
            'category_name'=>$request->category_name,
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
        $category = MasterPropCategory::find($id);
        return response()->json($category);
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
        MasterPropCategory::whereId($id)->update($request->except(['_token']));

        return response()->json(['success' => 'Category is Successfully Updated']);
    }


   /*  public function update1(Request $request, $id)
    {
        State::whereId($id)->update($request->except(['_token']));

        return response()->json(['success' => 'State is Successfully Updated']);
    }
*/



    public function categoryActive(Request $request, $id)
    {
       
        MasterPropCategory::where('id',$id)->update($request->all());

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

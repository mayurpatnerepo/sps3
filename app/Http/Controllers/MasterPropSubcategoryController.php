<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterPropSubcategory;
use App\MasterPropCategory;


class MasterPropSubcategoryController extends Controller
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
        $sub_categories = MasterPropSubcategory::all();
        $prop_categories= MasterPropCategory::where('is_active','1')->get();
        return view("Prop_propertyforms/prop_subcategory",compact('sub_categories','prop_categories'));
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
        MasterPropSubcategory::create([
            'category_name'=>$request->category_name,
            'subcategory_name'=>$request->subcategory_name,
            ]);
            return response()->json(['success'=>'done']);
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
        $subcategory = MasterPropSubcategory::find($id);
        return response()->json($subcategory);
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
        MasterPropSubcategory::whereId($id)->update($request->except(['_token']));

        return response()->json(['success' => 'Sub Category is Successfully Updated']);
    }

    public function subcategoryactive(Request $request, $id)
    {
       
        MasterPropSubcategory::where('id',$id)->update($request->all());

        return response()->json(['success' => 'Data is Successfully Updated']);
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
}

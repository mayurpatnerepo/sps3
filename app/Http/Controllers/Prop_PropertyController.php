<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DB;
use App\Property;
use App\State;
use App\Project;
use App\MasterPropertyType;
use File;

class Prop_PropertyController extends Controller
{
    //
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {  $id= "0";
       $states = State::where('is_active','1')->get();
       $projects =Project::all();
       $prop_categories= MasterPropertyType::orderBy('property_category')->get()->groupBy('property_category');
      
        return view('Prop_property/add_property',compact('states','projects','prop_categories'))->with('id',$id);;
    }

    /*function fetch(Request $request)
    {
      $select = $request->get('select');
      $value = $request->get('value');
      $dependent = $request->get('dependent');
      $data = DB::table('master_prop_subcategories')
              ->where($select, $value)
              //->groupBy($dependent)
              ->get();
      $output = '<option value="">Select '.ucfirst($dependent).'</option>';
      foreach($data as $row)
      {
        $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
      }
      echo $output;
    }*/


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

  public function store(Request $request)
	    {   

           $property = new Property;     

        if($request->hasfile('property_image'))
        {
          $image_array=$request->file('property_image');
          $array_len=count($image_array);
        for ($i=0; $i < $array_len ; $i++)
         { 
          $image_size=$image_array[$i]->getClientSize();
           $image_ext=$image_array[$i]->guessExtension();
          $new_image_name=rand(1234567,9999999).".".$image_ext;
          $destination_path=public_path('images/prop_images');
          $image_array[$i]->move($destination_path,$new_image_name);

          }
            
          }
 $property->prop_property_owner_name = $request->property_owner_name;
$property->prop_property_code = $request->property_code;
$property->prop_property_name = $request->property_name;
$property->prop_property_category = $request->property_category;
$property->prop_listing_type = $request->listing_type;
$property->prop_listing_category = $request->listing_category;
$property->prop_property_type = $request->property_type;
$property->prop_area_sqft = $request->area_sqft;
$property->prop_bedroom = $request->bedroom;
$property->prop_bathroom = $request->bathroom;
$property->prop_parking_space = $request->Parking_space;
$property->prop_project_name = $request->Project_name;
$property->prop_floor = $request->floor;
$property->prop_property_status = $request->property_status;
$property->prop_property_action = $request->property_active;
$property->prop_property_image = $new_image_name;
$property->prop_street = $request->street;
$property->prop_city_town = $request->city_town;
$property->prop_zip_code = $request->postal_code;
$property->prop_state = $request->state;
$property->prop_country = $request->country;
$property->prop_unit_price = $request->unit_price;
$property->prop_deposite_money = $request->deposite_money;
$property->prop_Listing_Owner_Landloard_Company = $request->listing_owner_lanlord_company;
$property->prop_listing_landloard_contact = $request->listing_owner_lanloard_contact;
$property->prop_new_owner_landloard_company = $request->new_owner_lanloard_company;
$property->prop_new_owner_contact = $request->new_owner_landloard_contact;
$property->prop_description_note = $request->description;

       
       

                    $property->save();
                   
                    return response()->json(['success'=>'done']);
              

            }
  

public function display()
    {
       $Properties=property::all();
        return view('Prop_property/list_of_property')->with('Properties',$Properties);
    }

    
}


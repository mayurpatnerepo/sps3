<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\MasterPropCp;
use App\User;
use Validator;
use DB;
use File;

class MasterPropCpController extends Controller
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
        $channelpartners = MasterPropCp::all();
        return view('ChannelPartner/list_of_cp')->with('channelpartners',$channelpartners);
    }

    public function cpActive(Request $request, $id)
    {
       
        MasterPropCp::whereId($id)->update($request->all());

        return response()->json(['success' => 'Data is Successfully Updated']);
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
    public function display(Request $request)
    {   
        $id=DB::table('master_prop_cps')->max('id');
        return view('ChannelPartner/add_newcp')->with('id',$id);
    }


    public function store(Request $request)
    {   
 
       
        $validator = Validator::make($request->all(), [
            'image_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
 
        
        if(!empty($_POST['image'])){
            $encoded_data = $_POST['image'];
            $binary_data = base64_decode( $encoded_data );
            $image = time().".png";
            $result = file_put_contents( 'emp_photos/'.$image, $binary_data );
        }else if($_POST['image'] == ""){
          //  $upload_image = time().'.'.$request->image_photo->getClientOriginalExtension();
            //$request->image_photo->move(public_path('emp_photos'), $upload_image);
            $image = "emp".".png";
           // $image =  'emp_photos/'.$image;
        }

       $pass = $request->input('password');
        $password = Hash::make($pass);

        $cp = new MasterPropCp;
        $cp->cp_id = $request->input('cp_id');
        $cp->first_name= $request->input('first_name');
        $cp->last_name= $request->input('last_name');
        $cp->cp_username= $request->input('cp_username');
        $cp->password= $password ;
        $cp->cp_email= $request->input('cp_email');
        $cp->cp_contact= $request->input('cp_contact');
        $cp->gender= $request->input('gender');
        $cp->Marital_status=$request->input('Marital_status');
        $cp->dob=$request->input('dob');
        $cp->designation=$request->input('designation');
        $cp->address=$request->input('address');
        $cp->blood_group=$request->input('blood_group');
        $cp->relative_name=$request->input('relative_name');
        $cp->relation=$request->input('relation');
        $cp->relative_contact=$request->input('relative_contact');
        $cp->relative_address=$request->input('relative_address');
        $cp->cp_photo= $image;
        $cp->upload_cp_photo = $image;
        
        $cp->save();
        $user = new User;
        $user->name =$request->input('first_name');
        $user->email =$request->input('cp_email');
        $user->password =$password ;
        $user->designation =$request->input('designation');
        $user->save();

        


        // User::create([
        //     'first_name'=>$request->first_name,
        //     'email'=>$request->emp_email,
        //     'password'=>$password,
        //     'designation'=>$request->designation
        //     ]);

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

    public function updateForm($id , $image )
    {

        return view('ChannelPartner/add_newcp',compact('image'))->with('id',$id);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $channelpartner = MasterPropCp::find($id);
        return response()->json($channelpartner);
        //return view('Employee/update_employee')->with('employee',$employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id , $image)
    {

        $channelpartner = MasterPropCp::where('id',$id)->first();
       
       //echo $request->input('password');
        
        if(!empty($_POST['image'])){
            
            $encoded_data = $_POST['image'];
            $binary_data = base64_decode( $encoded_data );
            $image_name = time().".png";
            $result = file_put_contents( 'emp_photos/'.$image_name, $binary_data );
            $filename = public_path().'/emp_photos/'.$image;
            File::delete($filename);
            $channelpartner->cp_photo= $image_name;
            $channelpartner->upload_cp_photo= $image_name;
        }else if($_POST['image'] == ""){
            //$upload_image = time().'.'.$request->image_photo->getClientOriginalExtension();
            //$request->image_photo->move(public_path('emp_photos'), $upload_image);
            //$image_name =  $upload_image ;
            $image_name = "emp".".png";
            $channelpartner->cp_photo= $image_name;
            $channelpartner->upload_cp_photo= $image_name;

        }

        $channelpartner->cp_id = $request->input('cp_id');
        $channelpartner->first_name= $request->input('first_name');
        $channelpartner->last_name= $request->input('last_name');
        $channelpartner->cp_username= $request->input('cp_username');
       
        $dpass=$request->input('password');
        if($dpass=="1234567"){

        }else {
        $dpass=$request->input('password');
        $password = Hash::make($dpass);
        $channelpartner->password= $password;
        }

        $channelpartner->cp_email= $request->input('cp_email');
        $channelpartner->cp_contact= $request->input('cp_contact');
        $channelpartner->gender= $request->input('gender');
        $channelpartner->Marital_status=$request->input('Marital_status');
        $channelpartner->dob=$request->input('dob');
        $channelpartner->designation=$request->input('designation');
        $channelpartner->address=$request->input('address');
        $channelpartner->blood_group=$request->input('blood_group');
        $channelpartner->relative_name=$request->input('relative_name');
        $channelpartner->relation=$request->input('relation');
        $channelpartner->relative_contact=$request->input('relative_contact');
        $channelpartner->relative_address=$request->input('relative_address');
        
        $channelpartner->save();
        
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

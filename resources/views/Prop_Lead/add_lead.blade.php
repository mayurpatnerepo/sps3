@extends('layouts.master')


@section('content')
<style>
.required:after {color: #e32;content:'*';display:inline;}
#container_div {
    background:orange;

}
#headername {
 background:#6495ed;
 color:white;
}
</style>

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card bg-primary" id="container_div">
              <div class="card-header" id="headername">
                  <h3 class="card-title text-center"><b>ADD LEAD</b></h3>
              </div> 
              <!--my code-->
               </div>
               
       <!--my code-->
               
              <!-- /.card-header -->
              <div class="card-body">
                <form id="lead_form" >
               
                <p class="card-title"><font color="green"><b>LEAD INFORMATION</b></font></p>
               <br>      
                  <!-- text input -->
                    <div class="form-group row">
                     
                        <div class="col-3">
                            <label for="Lead_Name" class="form-label required">Lead Name</label>
                            <input type="text" name="Lead_Name" id="Lead_Name" class="form-control" placeholder="Lead Name" maxlength="180">
                        </div>
                        <div class="col-3">
                            <label for="Mobile_Number" class="form-label required">Mobile Number</label>
                            <input type="text" name="Mobile_Number" id="Mobile_Number" class="form-control" placeholder="Mobile Number" maxlength="15" onkeypress="return Validate(event)" >
                        </div>
                        <div class="col-3">
                            <label for="Phone" class="form-label ">Phone</label>
                            <input type="text" name="Phone" id="Phone" class="form-control" placeholder="Phone " maxlength="15" onkeypress="return Validate(event)">
                        </div>
                        <div class="col-3">
                          <label>Email Id</label>
                          <input type="text" name="Email_Id" id="Email_Id" class="form-control" placeholder="Email Id" maxlength="180"  >
                      </div>
                       
                    </div>
               
                  
                     <!-- text input -->

                     <div class="form-group row">
                        <div class="col-3">
                            <label>Secondary Email</label>
                            <input type="text" name="Secondary_Email" id="Secondary_Email" class="form-control" placeholder="Secondary Email" maxlength="180" onkeypress="return Validate(event)">
                        </div>
                    <div class="col-3">
                          <label>Skype Id</label>
                          <input type="text" name="Skype_Id" id="Skype_Id"  class="form-control" placeholder="Skype Id " maxlength="100">
                      </div>    
                      <div class="col-3">
                          <label>Twitter</label>
                          <input type="text" name="Twitter" id="Twitter" class="form-control" placeholder="Twitter" maxlength="180"  >
                      </div>
                        <div class="col-3">
                            <label>Lead Status</label>
                            
                            <input list="LeadStatus" name="Lead_Status" id="Lead_Status" placeholder="Lead Status"  class="form-control">
                                  <datalist id="LeadStatus">                                 
                                  @foreach($leadstatuses as $leadstatus)
                                      <option  value="{{$leadstatus->leadstatus}}"></option>
                                  @endforeach
                                  </datalist>
                        </div>
                                       
                    </div>
                    <!-- text input -->
                     

                      <div class="form-group row">
                       <div class="col-3">
                            <label>Lead Source</label>
                            <input list="LeadSource" name="Lead_Source" id="Lead_Source" placeholder="Lead Source"  class="form-control">
                                  <datalist id="LeadSource">                                 
                                  @foreach($leadsources as $leadsource)
                                      <option  value="{{$leadsource->leadsource}}"></option>
                                  @endforeach
                                  </datalist>
                        </div>
                        <div class="col-3">
                          <label>Modified By</label>
                          <?php 
                            $user = auth()->user();
                            $user_name=$user->name;
                            ?>
                          <input type="text" name="Modified_By" id="Modified_By" class="form-control" value="{{$user_name}}" placeholder="Modified By" maxlength="180" disabled>
                      </div>
                        <div class="col-3">
                            <label>Created By</label>
                            <input type="text" name="Created_By" id="Created_By" class="form-control" value="{{$user_name}}" placeholder="Created By" maxlength="180" disabled>
                        </div>
                                     
                    </div>
                    <hr>
                        
                <p class="card-title"><font color="green"><b>REQUIREMENT INFORMATION</b></font></p>
               <br>      
                    <div class="form-group row">
                        <div class="col-3">
                          <label>Requirement Type</label>
                          <input list="LeadReqType" name="Requirement_Type" id="Requirement_Type" placeholder="Requirement Type"  class="form-control">
                                  <datalist id="LeadReqType">                                 
                                  @foreach($leadreqtypes as $leadreqtype)
                                      <option  value="{{$leadreqtype->reqtype}}"></option>
                                  @endforeach
                                  </datalist> 
                      
                        </div>
                        <div class="col-3">
                            <label>Requirement Category</label>
                            <select class="form-control" name="Requirement_Category" id="Requirement_Category" >
                                <option>New</option>
                                <option>Resale</option>
                                </select>
                        
                        </div>
                        <!--Add Master-Propertyform-category will fetch in Propertyform-category and Leadsource-Propertytype
                        same will reflect in add property and add lead page-->

                        <div class="col-3">
                            <label>Property Category</label>
                           
                          <!--  <select class="form-control" name="Property_Category" id="Property_Category" placeholder="Property Category">
                                <option>Residential</option>
                                <option>Commercial</option>
                                </select>-->

                                <input list="propertycategory" name="Property_Category" id="Property_Category" placeholder="Property Category"  class="form-control dynamic" data-dependent="property_type">
                                  <datalist id="propertycategory">                                 
                                  @foreach($propertycategories as $propertycategory)
                                      <option  value="{{$propertycategory[0]->property_category}}"></option>
                                  @endforeach
                                  </datalist> 
                        
                        </div>
                        <div class="col-3">
                          <label>Property Type</label>
                        
                          <select class="form-control" name="property_type" id="property_type" placeholder="Property Type">
                                <option>Select Property Type</option>
                                
                                </select>

                                <!--<input list="propertytype" name="property_type" id="property_type" placeholder="Property Type"  class="form-control">
                                  <datalist id="propertytype">                                 
                                      <option  value="select type"></option>
                                  </datalist> -->
                      </div>
                                         
                    </div>

                    <div class="form-group row">
                         <div class="col-3">
                          <label>Price (Minimum)</label>
                          <input type="text" name="Price_Min" id="Price_Min" class="form-control" placeholder="Price (Minimum)" maxlength="20" >
                      </div>

                       <div class="col-3">
                          <label>Price (Maximum)</label>
                          <input type="text" name="Price_Max" id="Price_Max" class="form-control" placeholder="Price (Maximum)" maxlength="20" >
                      </div>
                      <div class="col-3">
                          <label>Area (Minimum SQFT)</label>
                          <input type="text" name="Area_Min" id="Area_Min" class="form-control" placeholder="Area  (Minimum SQFT)" maxlength="20" >
                      </div>
                      <div class="col-3">
                          <label>Area (Maximum SQFT)</label>
                          <input type="text" name="Area_Max" id="Area_Max" class="form-control" placeholder="Area (Maximum SQFT)" maxlength="20" >
                      </div>
                                           
                    </div>

                    <div class="form-group row">
                       <div class="col-3">
                          <label>Bathroom (Maximum)</label>
                          <input type="text" name="Bath_Max" id="Bath_Max" class="form-control" placeholder="Bathroom (Maximum)" maxlength="20" >
                      </div>
                       <div class="col-3">
                          <label>Bathroom (Minimum)</label>
                          <input type="text" name="Bath_Min" id="Bath_Min" class="form-control" placeholder="Bathroom (Minimum)" maxlength="20" >
                      </div>
                       <div class="col-3">
                          <label>Parking Sapce</label>
                          <input type="text" name="Parking_Sapce" id="Parking_Sapce" class="form-control" placeholder="Parking Sapce" maxlength="20" >
                      </div>
                       <div class="col-3">
                          <label>Location </label>
                          <input type="text" name="Location" id="Location" class="form-control" placeholder="Location" maxlength="20" >
                      </div>           

                    </div>

                    <hr>
                    <p class="card-title"><font color="green"><b>IF SOURCE = BROKERAGE AGENCY</b></font></p>
                <br>
                    
                     <div class="form-group row">
                       <div class="col-4">
                          <label>Brokerage Agency Name</label>
                          <input type="text" name="Brokerage_Agency_Name" id="Brokerage_Agency_Name" class="form-control" placeholder="Brokerage Agency Name" maxlength="15" >
                      </div>
                        <div class="col-4">
                            <label>Broker Name</label>
                            <input type="text" name="Broker_Name" id="Broker_Name" class="form-control" placeholder="Broker Name" maxlength="15">
                        </div>
                                         
                    </div>
                    
                    <hr>
                    <p class="card-title"><font color="green"><b>ADDRESS INFORMATION</b></font></p>
                <br>
                     <!-- text input -->
                     <div class="form-group row">
                       <div class="col-3">
                            <label>Street</label>
                            <input type="text" name="street" id="street" class="form-control" placeholder="Street" maxlength="180">
                        </div>
                        <div class="col-3">
                            <label>City/Town</label>
                            <input type="text" name="city_town" id="city_town" class="form-control" placeholder="City/Town" maxlength="180">
                        </div>
                      <div class="col-3">
                            <label>Zip Code</label>
                            <input type="text" name="postal_code" id="postal_code" class="form-control" placeholder="Zip Code" maxlength="15" onkeypress="return isNumber(event)" >
                        </div>   
                      <div class="col-3">
                      <label>State</label>
                          <input list="state" name="state" id="state" placeholder="State"  class="form-control">
                        </div>
                                      
                    </div>

                     <div class="form-group row">
                          <div class="col-3">
                          <label>Country</label>
                          <input list="country" name="country" id="country" placeholder="Country"  class="form-control">
                            </div>      

                    </div>
                
                    <hr>
                    <p class="card-title"><font color="green"><b>DESCRIPTION INFORMATION</b></font></p>
                <br>

                        <div class="form-group row">                                                                     
                            <div class="col-12" style="align-items: center;">
                                    <label>Description/Note</label>
                                    <textarea class="form-control" name="description" rows="5" id="comment" maxlength="500"></textarea>
                                </div>
                        </div>
                    
                        <hr>
                    <p class="card-title"><font color="green"><b>VISIT SUMMARY</b></font></p>
                <br>

                    <div class="form-group row">
                       <div class="col-4">
                            <label>Average Time spend</label>
                            <input type="text" name="Average_Time_spend" id="Average_Time_spend" class="form-control" placeholder="Average Time spend In HRs" maxlength="180">
                        </div>
                        <div class="col-4">
                            <label>Visited Date</label>
                            <input type="date" name="Visited_Date" id="Visited_Date" class="form-control" placeholder="Visited Date" maxlength="180">
                        </div>
                      <div class="col-4">
                            <label>Visited Time</label>
                            <input type="time" name="Visited_Time" id="Visited_Time" class="form-control" placeholder="Visited Time" maxlength="15"  >
                        </div>                                         
                    </div>
                   
                    <br>
                
                    <div class="form-group row">
                       <div class="col-12" style="justify-content: center;display: flex; padding-bottom: 10px;">
                           <input type="submit" name="saveBtn" id="saveBtn" class="btn btn-success">
                       </div>
                    </div>

                </form>
              </div>
           
              <!-- /.card-body -->
        
@endsection

@section('javascript')

<!-- CK Editor -->
<script src="{{asset('admin-lte/plugins/ckeditor/ckeditor.js')}}"></script>
<script>

$( document ).ready(function() {
    $('.dynamic').change(function(){
  if($(this).val()!='')
  {
    var select = "property_category";
    var value = $(this).val();
    var dependent = "property_type";
    var _token = $('input[name="_token"]').val();
    $.ajax({
      url:"{{route('dynamicdependent.fetch')}}",
      method:"POST",
      data:{select:select, value:value, _token:_token, dependent:dependent},
      success : function(result)
      {
        $('#property_type').html(result);
      
          //echo (result);
          
        }
    })
  }
  
});
})

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function validate_email2()  
{  
var x=  document.getElementById('Email_Id').value;
var atposition=x.indexOf("@");  
var dotposition=x.lastIndexOf(".");  
if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
  swal("Error", "Please enter valid email", "warning")  
  return false;  
  }  
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}


 function Validate(event) {
        var regex = new RegExp("^[0-9-!+@#$%*?]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }      


 $('#saveBtn').click(function (e) {
      e.preventDefault();
      $(this).html('Sending..'); 
      //debugger;
      var myForm = document.getElementById('lead_form');
      var formData = new FormData(myForm);
      var test=validate();

      if(test==true){
       $.ajax({
        data: formData,
        url: "/add_lead/store",
        type: "POST",
        processData:false,
        contentType:false,
        cache:false,
        success: function (data) {

         
          swal("Lead Successfully Created.","","success");
          //setTimeout(function() { location.reload(); }, 2000); 

        },


      });
     }


   });

  function validate()
  {
    var name = document.getElementById('Lead_Name').value;
    var mobile_no = document.getElementById('Mobile_Number').value;
      
    if(name==""){
        swal("Required", "Please Enter Lead Name", "warning") 
        document.getElementById('Lead_Name').focus();
        return false;
    }else if(mobile_no==""){
        swal("Required", "Please Enter Mobile Number", "warning") 
        document.getElementById('Mobile_Number').focus();
        return false;
    }
  
   else{
        return true;
    }   

  }
   
</script>
@endsection
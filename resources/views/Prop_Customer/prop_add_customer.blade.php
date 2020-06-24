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
                  <h3 class="card-title text-center"><b>ADD CUSTOMER</b></h3>
              </div> 
          </div>
               
              <!-- /.card-header -->
              <div class="card-body">
                <form id="cust_form" >
                <p class="card-title"><font color="green"><b>CUSTOMER INFORMATION</b></font></p>
               <br>  
                  <!-- text input -->
                    <div class="form-group row">
                      <div class="col-3">
                            <label for="First_name" class="form-label required">Customer First Name     </label>
                            <input type="text" name="Customer_name" id="Customer_name" class="form-control" placeholder="First Name" maxlength="180">
                        </div>
                        <div class="col-3">
                            <label for="Last_name" class="form-label required">Customer Last Name </label>
                            <input type="text" name="Last_name" id="Last_name" class="form-control" placeholder="Last name" maxlength="180">
                        </div>
                        <div class="col-3">
                            <label for="Mobile_Number" class="form-label ">Mobile Number</label>
                            <input type="text" name="Mobile_Number" id="Mobile_Number" class="form-control" placeholder="Mobile Number" maxlength="15" onkeypress="return Validate(event)">
                        </div>
                        <div class="col-3">
                          <label>Email Id</label>
                          <input type="text" name="Email_Id" id="Email_Id" class="form-control" placeholder="Email Id" maxlength="15" >
                      </div>
                      
                    </div>

                    <hr>  
                    <p class="card-title"><font color="green"><b>PROPERTY INFORMATION</b></font></p>
               <br>                     <!-- text input -->
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
                                <select class="form-control" name="Requirement_Category" id="Requirement_Category" placeholder="Requirement Category">
                                  <option>New</option>
                                  <option>Resale</option>
                                </select>
                        </div>                    
                        <div class="col-3">
                            <label>Property Category</label>
                                <select class="form-control" name="property_category" id="property_category">
                                  <option>Residential</option>
                                  <option>Commercial</option>
                                </select>
                        </div>                  
                        <div class="col-3">
                            <label>Property Type</label>
                                <select class="form-control" name="property_type" id="property_type">
                                  <option>Residential </option>
                                  <option>Commercial</option>
                                </select>
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
                          <label>Location </label>
                          <input type="text" name="Location" id="Location" class="form-control" placeholder="Location" maxlength="20" >
                      </div>           
                      <div class="col-3">
                          <label>Intrested Property</label>
                          <input type="text" name="Intrested_Property" id="Intrested_Property" class="form-control" placeholder="Intrested Property" maxlength="20" >
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
/*
$( document ).ready(function() {
    document.getElementById("sub-Priority").disabled = true;
});*/

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

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
      var myForm = document.getElementById('cust_form');
      var formData = new FormData(myForm);
      var test=validate();

      if(test==true){
       $.ajax({
        data: formData,
        url: "prop_add_customer/store",
        type: "POST",
        processData:false,
        contentType:false,
        cache:false,
        success: function (data) {

         
          swal("Customer Successfully Created.","","success");
          //setTimeout(function() { location.reload(); }, 2000); 

        },


      });
     }


   });

  function validate()
  {
    var name = document.getElementById('Customer_name').value;
    var Customer_name = document.getElementById('Last_name').value;
      var type = document.getElementById('property_type').value;
    if(name==""){
        swal("Required", "Please enter Customer First Name", "warning") 
        document.getElementById('Customer_name').focus();
        return false;
    }else if(Customer_name==""){
        swal("Required", "Please enter Customer Last name", "warning") 
        document.getElementById('Last_name').focus();
        return false;
    }
  
   else{
        return true;
    }   

  }
   
</script>
@endsection
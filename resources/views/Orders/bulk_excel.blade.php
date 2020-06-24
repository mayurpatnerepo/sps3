@extends('layouts.master')

@section('content')
<br>


<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Set Reminder</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form id="followupform" name="followupform" enctype="multipart/form-data">
                  <!-- text input -->
                    <div class="form-group row">
                      <div class="col-6">
                            <label>Download sample</label>
                            <br>
                            
                               <input type="file" id="file" name="file" class="form-control">
                             
                      </div>
                      <div class="col-6">
                            <label>Upload sample</label>
                            <input type="time" id="rem_time" name="rem_time" class="form-control">
                       </div>
                     </div>
                    <div class="form-group row">
                    
                        
                    </div>
                    <div class="form-group row">
                          
                    </div>
                    
               
                        <br>
                        <input class="btn btn-success" type="button" id="download_excel" name="download_excel" value="Download Sample" >
<input class="btn btn-success" type="button" id="savebtn" name="savebtn" value="Save" >
                     <input class="btn btn-danger"
                     type="button"
                     value="Close">
                </form>
              </div>
              
            </div>
              <!-- /.card-body -->
            </div>
            

@endsection

@section('javascript')
<!-- CK Editor -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js">
  </script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js">
  </script>
  <script>
   $(document).ready(function() {
    //   toastr.options.hideMethod = 'noop';
    //   toastr.options.timeOut = 0; 
    //    toastr.options.extendedTimeOut = 0;
    //   toastr.options.closeButton = true;
    //    setInterval(function(){ toastr.success('You have a meeting today'); }, 3000);

     });

    
  </script>
<script>
$("#download_excel").click(function(){
    debugger;
    window.location.href ="{{URL::to('a/a.xlsx')}}";
});
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
   $('#savebtn').click(function (e) {
       debugger
        e.preventDefault();
        $(this).html('Sending..'); 
       // debugger;
        var myForm = document.getElementById('followupform');
        var formData = new FormData(myForm);
        //var test=validate_form();
        var test=true;
        if(test==true){

              
             $.ajax({
          data: formData,
          url: "/bulk_orders/store",
          type: "POST",
          processData:false,
          contentType:false,
          cache:false,
          success: function (data) {
     
            swal("Follow Up Created successfully.");
            $('#followupform').trigger("reset");
          },
          
         
      });
        }
        
       
    });
    function validate_form(){

      var rem_date = document.getElementById('rem_date').value;
    var rem_time = document.getElementById('rem_time').value;
    var subject = document.getElementById('subject').value;
    var remark = document.getElementById('remark').value;
    var nature = document.getElementById('nature').value;
    if(rem_date==""){
        swal("Enter Follow up date");
        return false;
    }
    else if(rem_time==""){
        swal("Enter Follow up time");
        return false;
    }
    else if(subject==""){
        swal("Enter Product Price");
        return false;
    }
    else if(remark==""){
        swal("Enter Product Price");
        return false;
    }
    else if(nature==""){
        swal("Enter Product Price");
        return false;
    }
    else{

      return true;
    }
      
    }
    var timepicker = new TimePicker('rem_time', {
  lang: 'en',
  theme: 'dark'
});
timepicker.on('change', function(evt) {
  
  var value = (evt.hour || '00') + ':' + (evt.minute || '00');
  evt.element.value = value;

});
</script>
@endsection
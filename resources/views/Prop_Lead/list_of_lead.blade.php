@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>    
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"/>    
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.5.1/css/colReorder.dataTables.min.css"/>
<link rel="stylesheet" href="{{asset('css/datatableCutstom.css')}}"/>
<link rel="stylesheet" href="{{asset('css/swal.css')}}"/> 
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}"/> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<style>
a {
  -webkit-transition: .25s all;
  transition: .25s all;
}
/*.card {
  overflow: hidden;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  -webkit-transition: .25s box-shadow;
  transition: .25s box-shadow;
}

.card:focus,
.card:hover {
  box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
}

.card-inverse .card-img-overlay {
  background-color: rgba(51, 51, 51, 0.85);
  border-color: rgba(51, 51, 51, 0.85);
}
.accord{
    width: -webkit-fill-available;
    width:100%;
    border-radius: 0px;}
#accordion .panel{padding:5 0 5 0;}
#accordion .panel-body{padding:5px;border-style: none ridge none ridge;margin: 0 8 0 8;}
#accordion .panel-body-last{padding:5px;border-style: none ridge ridge ridge;margin: 0 8 0 8;}

.panel-default>.panel-heading a:after {
  content: "";
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: 400;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  float: right;
  transition: transform .25s linear;
  -webkit-transition: -webkit-transform .25s linear;
}

.panel-default>.panel-heading a[aria-expanded="true"] {
  /*background-color: #eee;
}

.panel-default>.panel-heading a[aria-expanded="true"]:after {
  content: "\2212";
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
}

.panel-default>.panel-heading a[aria-expanded="false"]:after {
  content: "\002b";
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}*/

thead input {
        width: 100%;
    }


.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
#container_div {
    background:#FAFAFA;

}
#headername {
 background:#6495ed;
 color:white;
}

.modal {
  position: absolute;
  top: 40%;
  left: 60%;
  transform: translate(-50%, -60%);
}
button.dt-button, div.dt-button, a.dt-button {
  background-image: linear-gradient(to bottom, #F08080   0%, #F08080 100%);!important
  border-radius: 15px;
  color: white;
  font-size: 12px;
  margin: 10px 0px;
}
.text-wrap{
    white-space:normal;
}
.width-200{
    width:110px;
}
div.dt-button-collection button.dt-button.active:not(.disabled) {
background-image: linear-gradient(to bottom, #9cbbc7 0%, #4CAF50 100%)!important;
}
#data_table tbody tr.even:hover {
       background-color: cadetblue;
       cursor: pointer;
   }
 
   #data_table tr.odd:hover {
       background-color: cadetblue;
       cursor: pointer;
   }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card" id="container_div">
<div class="card-header" id="headername" style="font-weight:solid">
    List of Customers
</div>
<div class="card-body">
<div class="cc_wrapper">

</div>
    <table class=" table nowrap data-table table-responsive display " style="width:100%" cellspacing="0"  id="data_table">
       
        <thead class="table_head">
            
            <tr >
              <th>Action</th>
              <th>Id</th>
              <th>Lead Name</th>
              <th>Mobile Number</th>
              <th>Phone</th>
               <th>Nature</th>
              <th>Email Id</th>
              <th>Secondary Email</th>
              <th>Skype Id<</th>
              <th>Twitter</th>
              <th>Lead Status</th>
              <th>Lead Source</th>
              <th>Modified By</th>
              <th>Created By</th>
              <th>Requirement Type</th>
              <th>Requirement Category</th>
              <th>Property Category</th>
              <th>Property Type</th>
              <th>Price (Minimum)</th>
              <th>Price (Maximum)</th>
              <th>Area (Minimum SQFT)</th>
              <th>Area (Maximum SQFT)</th>
              <th>Bathroom (Maximum)</th>
              <th>Bathroom (Minimum)</th>
              <th>Parking Sapce</th>
              <th>Location</th>
              <th>Brokerage Agency Name</th>
              <th>Broker Name</th>
              <th>Street</th>
              <th>City/Town</th>
              <th>Zip Code</th>
              <th>State</th>
              <th>Country</th>
              <th>Description</th>
              <th>Average Time spend</th>
              <th>Visited Date</th>
              <th>Visited Time</th>
              <th>Created At</th>

             
              
            
            </tr>
        </thead>
        <thead class="theadx">
            
            <tr>
          <th>Action</th>
            <th>Id</th>
              <th>Lead Name</th>
              <th>Mobile Number</th>
              <th>Phone</th>
               <th>Nature</th>
              <th>Email Id</th>
              <th>Secondary Email</th>
              <th>Skype Id</th>
              <th>Twitter</th>
              <th>Lead Status</th>
              <th>Lead Source</th>
              <th>Modified By</th>
              <th>Created By</th>
              <th>Requirement Type</th>
              <th>Requirement Category</th>
              <th>Property Category</th>
              <th>Property Type</th>
              <th>Price (Minimum)</th>
              <th>Price (Maximum)</th>
              <th>Area (Minimum SQFT)</th>
              <th>Area (Maximum SQFT)</th>
              <th>Bathroom (Maximum)</th>
              <th>Bathroom (Minimum)</th>
              <th>Parking Sapce</th>
              <th>Location</th>
              <th>Brokerage Agency Name</th>
              <th>Broker Name</th>
              <th>Street</th>
              <th>City/Town</th>
              <th>Zip Code</th>
              <th>State</th>
              <th>Country</th>
              <th>Description</th>
              <th>Average Time spend</th>
              <th>Visited Date</th>
              <th>Visited Time</th>
             
         
              
            
            </tr>
        </thead >
        <tbody class="tbody">
        @foreach ($Lead as $Lead)
              <tr>
                <td>
                <input type="hidden" name="id" value="{{$Lead->id}}" id="delete_id">
                 
                 @can('isAdmin')
                <button  title="Edit Lead!" class="btn btn-success editlead" name="edit" data-lead_id="{{$Lead->id}}"><i class="fas fa-edit"></i></button>

                <button title="Delete Enquiry!" class="btn btn-danger deleteenquiry" data-enquiry_id="{{$Lead->id}}" name="delete"><i class="fas fa-trash-alt"></i></button>
                @endcan
            
                <!--<button data-target="#follow_up_modal" data-toggle="modal" class="btn btn-info followenquiry" ><i class="fas fa-phone-square"></i></button>-->


                 <button title="Create Follow up!"  data-leadtrueid="{{$Lead->id}}" onclick="set_follow_up(this);" class="btn btn-info followlead" name="FollowUp" data-nature1="{{$Lead->nature}}" data-follow_up_id="{{$Lead->id}}"><i class="fas fa-phone-square"></i></button>

               

               
                 
               </td> 
              <td>{{$Lead->id}}</td>
              <td>{{$Lead->Lead_Name}}</td>
              <td>{{$Lead->Mobile_Number}}</td>
              <td>{{$Lead->Phone}}</td>
              <td> {{$Lead->nature}}</td> 
              <td>{{$Lead->Email_Id}}</td>
              <td>{{$Lead->Secondary_Email}}</td>
              <td>{{$Lead->Skype_Id}}</td>
              <td>{{$Lead->Twitter}}</td>
              <td>{{$Lead->Lead_Status}}</td>
              <td>{{$Lead->Lead_Source}}</td>
              <td>{{$Lead->Modified_By}}</td>
              <td>{{$Lead->Created_By}}</td>
              <td>{{$Lead->Requirement_Type}}</td>
              <td>{{$Lead->Requirement_Category}}</td>
              <td>{{$Lead->Property_Category}}</td>
              <td>{{$Lead->Property_Type}}</td>
              <td>{{$Lead->Price_Min}}</td>
              <td>{{$Lead->Price_Max}}</td>
              <td>{{$Lead->Area_Min}}</td>
              <td>{{$Lead->Area_Max}}</td>
              <td>{{$Lead->Bath_Max}}</td>
              <td>{{$Lead->Bath_Min}}</td>
              <td>{{$Lead->Parking_Sapce}}</td>
              <td>{{$Lead->Location}}</td>
              <td>{{$Lead->Brokerage_Agency_Name}}</td>
              <td>{{$Lead->Broker_Name}}</td>
              <td>{{$Lead->street}}</td>
              <td>{{$Lead->city_town}}</td>
              <td>{{$Lead->postal_code}}</td>
              <td>{{$Lead->state}}</td>
              <td>{{$Lead->country}}</td>
              <td>{{$Lead->description}}</td>
              <td>{{$Lead->Average_Time_spend}}</td>
              <td>{{$Lead->Visited_Date}}</td>
              <td>{{$Lead->Visited_Time}}</td>
              <td>{{$Lead->created_at}}</td>
              </tr>
                
            @endforeach 
        </tbody>
       
        
    </table>
</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
             <form id="modal-form"> 
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                <div>
                    <label><h3>Change Nature</h3></label>     
                 </div>
                  <div >
                    <select class="form-control" name="nature2" id="nature2">
                               <option value="Cold" style="background-color: Blue;color: #FFFFFF;">Cold</option>
                               <option value="Warm" style="background-color: Orange;color: #FFFFFF;">Warm</option>        
                              <option value="Hot" style="background-color: Red; color: #FFFFFF;">Hot</option>
                              <option value="Not Interested" style="background-color: black;color: #FFFFFF;">Not Interested</option>
                              <option value="Mature" style="background-color:DarkGreen; color: #FFFFFF;">Mature</option>     
                    </select>               
                </div> 

                 <input type="text" id="nature_enq_id" name="nature_enq_id" hidden/> 



                </div>
                <div class="modal-footer" style="align:center;">
                    <button type="button" id="nature2_change" class="btn btn-primary">Save changes</button>
                </div>
             </form>
            </div>
        </div>
    </div>
</div>

<!--modal for follow up-->
<div class="modal fade" id="follow_up_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">

             <form id="Follow_up_form"> 
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                <div>
                    <label><h3>Set Follow Up</h3></label>     
                 </div>
                  <div >
                  <div class="form-group row">
                  <div class="col-6">
                              <label>Date</label>
                              <input type="Date" class="form-control" name="rem_date" id="rem_date" placeholder="Product Name" maxlength="100">
                          </div>
                            <div class="col-6">
                              <label>Time</label>
                              <input type="Time" class="form-control" name="rem_time" id="rem_time" placeholder="Product Name" maxlength="100">
                          </div>
                          <div class="col-12">
                              <label>Name</label>
                              <input type="text" class="form-control" name="note" id="note" placeholder="Name" maxlength="100">
                          </div>
                          <div class="col-12">
                              <label>Phone</label>
                              <input type="text" class="form-control" name="note" id="note" placeholder="Number" maxlength="100">
                          </div>
                            <div class="col-12">
                              <label>Note</label>
                              <input type="text" class="form-control" name="note" id="note" placeholder="Description" maxlength="100">
                          </div>
                           <div class="col-12">
                           <label>Nature</label>
                    <select class="form-control" name="nature_followup" id="nature_followup">
                               <option value="Cold" style="background-color: Blue;color: #FFFFFF;">Cold</option>
                               <option value="Warm" style="background-color: Orange;color: #FFFFFF;">Warm</option>        
                              <option value="Hot" style="background-color: Red; color: #FFFFFF;">Hot</option>
                              <option value="Not Interested" style="background-color: black; color: #FFFFFF;">Not Interested</option>
                              <option value="Mature" style="background-color:DarkGreen; color: #FFFFFF;">Mature</option>     

                    </select>   
                    </div>            
                </div> 
  </div>
                 <input type="text" id="enq_id" name="enq_id"  hidden/> 
                 <input type="text" id="enq_prop" name="enq_prop" hidden/> 



                </div>
                <div class="modal-footer" style="align:center;">
                    <button type="button" id="follow_setter" class="btn btn-primary">Save changes</button>
                </div>
             </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')

<!-- DataTables -->
<script src="{{asset('admin-lte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.js')}}"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.5.1/js/dataTables.colReorder.min.js"></script>


 
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

 $(document).ready(function() {
  $('#data_table thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text"/>' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( data_table.column(i).search() !== this.value ) {
              data_table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );


  $('button.editlead').click(function()
        {
          //alert("here");
         var EnqId=$(this).attr("data-lead_id");
      window.location.href="{{ url('/Prop_Lead') }}"+'/'+EnqId;
        });


function get_nature(e){

  console.log(e);
 // var enq_id = e.getAttribute('data-nature');
//var nature1 = e.getAttribute('data-nature1');
  var enq_products = e.getAttribute('data-enq_products');
  //alert(enq_products);
  $('#myModal').modal('show');
 // document.getElementById("nature2").value = nature1;
  document.getElementById("nature_enq_id").value = enq_products;
  
}

function set_follow_up(e){

  console.log(e);
  var enq_id = e.getAttribute('data-follow_up_id');
  //var enq_prop = e.getAttribute('data-prop');
  var nature1 = e.getAttribute('data-nature1');
  var enq_id = e.getAttribute('data-leadtrueid');
  $('#follow_up_modal').modal('show');
  document.getElementById("nature_followup").value = nature1;
  document.getElementById("enq_prop").value = enq_prop;
  document.getElementById("enq_id").value = enq_id;
  
}

$( "#nature2_change" ).click(function( event ) { 
             
               event.preventDefault();     
        $.ajax({
          data: $('#modal-form').serialize(),
          url: "{{ route('update_nature') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
            console.log(data);
            $('#myModal').modal('hide');
            Swal.fire({
            title: 'Nature updated successfully',
             animation: false,
           
               });
              
             
          setTimeout(function() { window.location.href="{{ url('/List_all_enquiry') }}";}, 2000); 
         
          },
      });


});
//follow up setter
$( "#follow_setter" ).click(function( event ) { 
             
               event.preventDefault();  
                  
        $.ajax({
          data: $('#Follow_up_form').serialize(),
          url: "{{ route('update_follow_up') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
            console.log(data);
            $('#follow_up_modal').modal('hide');
            Swal.fire({
            title: 'Follow up is Created',
             animation: false,
          
               });
              
             
          setTimeout(function() { window.location.href="{{ url('/List_all_enquiry') }}";}, 2000); 
         
          },
      });


});


//follow up setter
  // $('#data_table thead.theadx th').each( function () {
  //       var title = $(this).text();
  //       $(this).html( '<input id="column_3_search" class="column_filter" type="text" />' );
  //   } );

     var data_table=$('#data_table').DataTable({
  
      "order": [[ 0, "desc" ]],
      "paging":true,
      "lengthMenu": [10],
       "searching": true,
      columnDefs: [
                {
                    render: function (data, type, full, meta) {
                        return "<div class='text-wrap width-200'>" + data + "</div>";
                    },
                    targets: [ 1,2,3,4,5 ]
                },
                { orderable: false, targets: [-1,-2,-3,-4,-5,-6,-7] }
                 
             ],
       "searching": true,
       dom: 'Bfrtip',
 stateSave: true,
        buttons: [
            
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            },
            'colvis'
        ]
      
    });

} );



 $('.active').change(function (e) {
        var emp_id=$(this).attr("data-employee_id");
        var active_id=$(this).attr("data-is_active");
        if(active_id==1)
        {
          $.ajax({
          data: {'is_active':0},
          url: "/employees/employeeactive/"+emp_id,
          type: "get",
          dataType: 'json',
          success: function (data) {
            Swal.fire({
                    title: 'Employee successfully deactivated',
                    animation: false,
                    
                         });
                 setTimeout(function() { location.reload(); }, 2000); 
            }
        });
        }
        else if(active_id==0)
        {
            $.ajax({
          data: {'is_active':1},
          url: "/employees/employeeactive/"+emp_id,
          type: "get",
          dataType: 'json',
          success: function (data) {
            Swal.fire({
                    title: 'Employee successfully activated',
                    animation: false,
                    
                         });
              setTimeout(function() { location.reload(); }, 3000); 
            }
        });
        }
     });


// $('#data_table').on('click', 'tbody td', function(){
// window.location =$(this).closest('tr').find('td:eq(0) a').attr('href');
// });


  $('button.editEmployee').click(function()
        {
         var empId=$(this).attr("data-employee_id");
         var empPhoto = $(this).attr("data-employee_photo");
        window.location.href="{{ url('/Update_employee/') }}"+'/' + empId + '/' + empPhoto ;
        });



</script>
@endsection

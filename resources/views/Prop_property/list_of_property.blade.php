@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>    
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"/>    

<link rel="stylesheet" href="{{asset('css/datatableCutstom.css')}}"/>
<link rel="stylesheet" href="{{asset('css/swal.css')}}"/> 
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}"/> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<style>
a {
  -webkit-transition: .25s all;
  transition: .25s all;
}
.card {
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
  /*background-color: #eee;*/
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
}

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
button.dt-button, div.dt-button, a.dt-button {
  background-image: linear-gradient(to bottom, #F08080   0%, #F08089 100%)!important;
  border-radius: 5px;
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
<div class="card" id="container_div">
<div class="card-header" id="headername" style="font-weight:solid">
<h3 class="card-title text-center"><b>LIST OF PROPERTIES</b></h3></div>
<div class="card-body">
<div class="cc_wrapper">

</div>
    <table class=" table nowrap data-table table-responsive display " style="width:100%" cellspacing="0"  id="data_table">
       
        <thead class="table_head">
            
            <tr >
              <th>Id</th>
              <th>Property Owner</th>
              <th>Property Code</th>
              <th>Property Name</th>
              <th>Listing Type</th>
              <th>Listing Category</th>
              <th>Property Category</th>
              <th>Property Type</th>
              <th>Area(SQFT)</th>
              <th>Bedroom</th>
              <th>Bathroom</th>
              <th>Parking Space</th>
              <th>Project Name</th>
              <th>Floor</th>
              <th>Property Status</th>
              <th>property Active</th>
              <th>Property Image</th>
              <th>Street</th>
              <th>City/Town</th>
              <th>Zip Code</th>
              <th>State</th>
              <th>Country</th>
              <th>Unit Price</th>
              <th>Deposite Money(Rent)</th>
              <th>Listing Owner/Landlord Company</th>
              <th>Listing Owner/Landloard Contact</th>
              <th>New Owner/Landloard Company</th>
              <th>New Owner/Landloard Contat</th>
              <th>Description/Note</th>
              <th>Created At</th>



             
              
            
            </tr>
        </thead>
        <thead class="theadx">
            
            <tr>

               <th>Id</th>
              <th>Property Owner</th>
              <th>Property Code</th>
              <th>Property Name</th>
              <th>Listing Type</th>
              <th>Listing Category</th>
              <th>Property Category</th>
              <th>Property Type</th>
              <th>Area(SQFT)</th>
              <th>Bedroom</th>
              <th>Bathroom</th>
              <th>Parking Space</th>
              <th>Project Name</th>
              <th>Floor</th>
              <th>Property Status</th>
              <th>property Active</th>
              <th>Property Image</th>
              <th>Street</th>
              <th>City/Town</th>
              <th>Zip Code</th>
              <th>State</th>
              <th>Country</th>
              <th>Unit Price</th>
              <th>Deposite Money(Rent)</th>
              <th>Listing Owner/Landlord Company</th>
              <th>Listing Owner/Landloard Contact</th>
              <th>New Owner/Landloard Company</th>
              <th>New Owner/Landloard Contat</th>
              <th>Description/Note</th>
              
            
            </tr>
        </thead >
        <tbody class="tbody">
        @foreach ($Properties as $Property)
              <tr>
              <td>{{$Property->id}}</td>
              <td>{{$Property->prop_property_owner_name}}</td>
              <td>{{$Property->prop_property_code}}</td>
              <td>{{$Property->prop_property_name}}</td>
              <td>{{$Property->prop_property_category}}</td>
              <td>{{$Property->prop_listing_type}}</td>
              <td>{{$Property->prop_listing_category}}</td>
              <td>{{$Property->prop_property_type}}</td>
              <td>{{$Property->prop_area_sqft}}</td>
              <td>{{$Property->prop_bedroom}}</td>
              <td>{{$Property->prop_bathroom}}</td>
              <td>{{$Property->prop_parking_space}}</td>
              <td>{{$Property->prop_project_name}}</td>
              <td>{{$Property->prop_floor}}</td>
              <td>{{$Property->prop_property_status}}</td>
              <td>{{$Property->prop_property_action}}</td>
              <td>{{$Property->prop_property_image}}</td>
              <td>{{$Property->prop_street}}</td>
              <td>{{$Property->prop_city_town}}</td>
              <td>{{$Property->prop_zip_code}}</td>
              <td>{{$Property->prop_state}}</td>
              <td>{{$Property->prop_country}}</td>
              <td>{{$Property->prop_unit_price}}</td>
              <td>{{$Property->prop_deposite_money}}</td>
              <td>{{$Property->prop_Listing_Owner_Landloard_Company}}</td>
              <td>{{$Property->prop_listing_landloard_contact}}</td>
               <td>{{$Property->prop_new_owner_landloard_company}}</td>
              <td>{{$Property->prop_new_owner_contact}}</td>
              <td>{{$Property->prop_description_note}}</td>
              <td>{{$Property->created_at}}</td>
              
             
              
             
        
              </tr>
                
            @endforeach 
        </tbody>
       
        
    </table>
</div>
</div>

@endsection

@section('javascript')

<!-- DataTables -->
<script src="{{asset('admin-lte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
 
<script>
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

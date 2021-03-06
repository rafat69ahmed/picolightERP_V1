@extends("la.layouts.app")

@section("contentheader_title", "BankPledgeReturns")
@section("contentheader_description", "bankpledgereturns listing")
@section("section", "BankPledgeReturns")
@section("sub_section", "Listing")
@section("htmlheader_title", "BankPledgeReturns Listing")

@section("headerElems")
<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add BankPledgeReturn</button>
@endsection

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="table table-bordered">
		<thead>
		<tr class="success">
			@foreach( $listing_cols as $col )
			<th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
			@endforeach
			@if($show_actions)
			<th>Actions</th>
			@endif
		</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add BankPledgeReturn</h4>
			</div>
			{!! Form::open(['action' => 'LA\BankPledgeReturnsController@store', 'id' => 'bankpledgereturn-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    <!-- @la_form($module) -->
                   
				<div class="form-group col-xs-12">
						<div class="form-group">
		                    <label for="date_pledge_return">Date :</label>
		                    <div class="input-group date col-xs-4">
		                    <input class="form-control valid" placeholder="Enter Date" name="date_pledge_return" type="text" value="" aria-invalid="false"><span class="input-group-addon"><span class="fa fa-calendar"></span></span>
		                    </div>
	                    </div>
	                    <div class="form-group">
		                   <div class="form-group col-xs-2">
							<label for="item_id">Item* :</label>
							<select class="form-control select2-hidden-accessible" required="1" data-placeholder="Enter Item" rel="select2" name="item_id" id="item_id" tabindex="-1" aria-hidden="true" aria-required="true">
							
							<option >Select</option>
							<option value="1">Jute</option>
							<option value="2">Oil</option>
							</select>
						 
							</div>	


							<div class="form-group col-xs-2">
							<label for="item_categorie_id">Categorie* :</label>
							<select class="form-control select2-hidden-accessible" required="1" data-placeholder="Enter Categorie" rel="select2" name="item_categorie_id" id="item_categorie_id" tabindex="-1" aria-hidden="true" aria-required="true">
							
							</select>
						
							</div> 
	                    </div>
						
						 
						<!-- 	<div class="form-group col-xs-2">
							<label for="add_btn"  style="opacity: 0;">Add Button* :</label>
						    <input aria-hidden="true" aria-required="true" type="button" name="add_btn" class="add btn btn-warning " id="add" onclick="add_row();" value="Add">
							 
							</div> -->
					</div>
                    <div class="form-group row input-sm">
						<?php $i = 0; ?>

		          		<div class="wall col-md-2">
		          			
		          		</div>
		          		<div class="col-md-12 text-center">
			              <table class="table table-bordered"" id="data_table" name="data_table" >
						      <tr class="info">
						        <th class="text-left input-sm" style="display:none;">id</th>
						        <th class="text-left input-sm" style="display:none;">item_id</th>
						        <th class="text-left input-sm" style="display:none;">item_categorie_id</th>
						        <th class="text-left input-sm">Item Categorie Name</th>
						        <th class="text-left input-sm" >Jute Receive Id</th>
						        <th class="text-left input-sm" >Unit Type (Bundle)</th>
						        <th class="text-left input-sm" >Sub Unit Type(KG)</th>
						        <th class="text-left input-sm" >quantity (Bundle)</th>
						        <th class="text-left input-sm" >Sub Unit Quantity(KG)</th>
						        <th class="text-left input-sm" style="display:none;" >Stock In Hand Actual</th>
						        <th class="text-left input-sm" >Stock In Hand</th>
						        <th class="text-left input-sm" >Get</th>
						        <th class="text-left input-sm" ></th>
						        <th class="text-left input-sm" >Delete</th>
								</tr>
								
								<tfoot>
								<tr class="">
						        <td class="text-left input-sm" style="display:none;">id</td>
						        <td class="text-left input-sm" style="display:none;">item_id</td>
						        <td class="text-left input-sm" style="display:none;">item_categorie_id</td>
						        <td class="text-left input-sm"></td>
						        <td class="text-left input-sm" ></td>
						        <td class="text-left input-sm" ></td>
						        <td class="text-left input-sm" >Total</td>
						        <td class="text-left input-sm" >
		                  		<input type="text" class="form-control text-right input-sm" style='border:none;' name="t_quantity" id="t_quantity" value="0" readonly></td>
						        <td class="text-left input-sm" >
		                  		<input type="text" class="form-control text-right input-sm" style='border:none;' name="totalsub_unit_quantity" id="totalsub_unit_quantity" value="0" readonly></td>
						        <td class="text-left input-sm"  style="display:none;"></td>
		                  		<td class="text-left input-sm" >
		                  		<input type="text" class="form-control text-right input-sm" style='border:none;' name="total_stock_in_hand" id="total_stock_in_hand" value="0" readonly></td>
						        <td class="text-left input-sm" >
		                  		<input type="text" class="form-control text-right input-sm" style='border:none;' name="total_receive_quantity" id="total_receive_quantity" value="0" readonly></td>
						        	
						        </td>
						        <td class="text-left input-sm" ></td>
						        <td class="text-left input-sm" ></td>	
						      </tr>
							  </tfoot>
						  </table>
		          			<input type="hidden" value='' id="detail_max_number" class="input-sm" name="detail_max_number">
						  
						</div>
						<!-- <label class="col-md-10 control-label text-right">Total amount</label>
			            <div class="col-md-2 text-right">
		                  <input type="text" class="form-control text-right input-sm" name="total_amt" id="total_amt" value="0">            
			            </div> -->

		          	</div>
					
					{{--
					@la_input($module, 'bankpledge_return_no')
					@la_input($module, 'item_id')
					@la_input($module, 'item_categorie_id')
					@la_input($module, 'date_pledge_return')
					@la_input($module, 'jute_receive_id')
					@la_input($module, 'jute_receive')
					@la_input($module, 'unit_type')
					@la_input($module, 'sub_unit_type')
					@la_input($module, 'quantity')
					@la_input($module, 'sub_unit_quantity')
					@la_input($module, 'total_quantity')
					@la_input($module, 'stock_in_bankPledge')
					@la_input($module, 'pledge_status')
					@la_input($module, 'user_id')
					--}}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/bankpledgereturn_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#bankpledgereturn-add-form").validate({
		
	});
});
</script>
<script type="text/javascript" >
  
$(document).ready(function(){
     $("#item_id").change(function(){
         var itemid = $('#item_id').val();
             $(item_categorie_id).find("option").remove();
        	 $.get("{{ url(config('laraadmin.adminRoute') . '/jute_sub_item') }}" + '/' + itemid, function (data) {
            console.log(data);
             $.each(data, function(key, value) {
            $("#item_categorie_id").append("<option value="+value.id+">" + value.category_name +"</option>");
            });

            })
    });
}); 
var a = 0;

$(document).ready(function(){
     $("#item_categorie_id").change(function(){
         var itemid = $('#item_categorie_id').val();
         var item_chatagory = $('#item_categorie_id option:selected').text();
         // alert(item_chatagory);
             // $(item_categorie_id).find("option").remove();
        	$.get("{{ url(config('laraadmin.adminRoute') . '/bankpledge_store') }}" + '/' + itemid, function (data) {
            console.log(data);
             $.each(data, function(key, value) {
             	a++;
			$("#detail_max_number").val(a);
            $("#data_table").append(
		       	"<tr name="+a+" id='row"+a+"'>"+
		        "<td class='text-left input-sm' style='display:none;'>"+
      			"<input type='text' class='form-control text-right input-sm' style='border:none;' name='id["+a+"]' id='item_categorie_id["+a+"]' value='"+value.id+"' readonly></td>"+
      			"<td class='text-left input-sm' style='display:none;'>"+
      			"<input type='text' class='form-control text-right input-sm' style='border:none;' name='item_id["+a+"]' id='item_categorie_id["+a+"]' value='"+value.item_id+"' readonly></td>"+
		        "<td class='text-left input-sm' style='display:none;'>"+
      			"<input type='text' class='form-control text-right input-sm' style='border:none;' name='item_categorie_id["+a+"]' id='item_categorie_id["+a+"]' value='"+value.item_categorie_id+"' readonly></td>"+
		        "<td class='text-left input-sm'>"+
      			"<input type='text' class='form-control text-right input-sm' style='border:none;' name='item_categorie_name["+a+"]' id='item_categorie_name["+a+"]' value='"+item_chatagory+"' readonly></td>"+
		        "<td class='text-left input-sm' >"+
      			"<input type='text' class='form-control text-right input-sm' style='border:none;' name='jute_receive_id["+a+"]' id='jute_receive_id["+a+"]' value='"+value.id+"' readonly></td>"+
		        "<td class='text-left input-sm' >"+
      			"<input type='text' class='form-control text-right input-sm' style='border:none;' name='unit_type["+a+"]' id='unit_type["+a+"]' value='"+value.unit_type+"' readonly></td>"+
		        "<td class='text-left input-sm' >"+
      			"<input type='text' class='form-control text-right input-sm' style='border:none;' name='sub_unit_type["+a+"]' id='sub_unit_type["+a+"]' value='"+value.sub_unit_type+"' readonly></td>"+
		        "<td class='text-left input-sm' > "+
      			"<input type='text' class='form-control text-right detailquantity input-sm' style='border:none;' name='quantity["+a+"]' id='quantity["+a+"]' value='"+value.quantity+"' readonly></td>"+
		        "<td class='text-left input-sm' >"+
      			"<input type='text' class='form-control text-right detailamnt input-sm' style='border:none;' name='sub_unit_quantity["+a+"]' id='sub_unit_quantity["+a+"]' value='"+value.sub_unit_quantity+"' readonly></td>"+
		        "<td class='text-left input-sm' style='display:none;' >"+
      			"<input type='text' class='form-control text-right  input-sm' style='border:none;' name='stock_in_hand_actual["+a+"]' id='stock_in_hand_actual["+a+"]' value='"+value.stock_in_hand+"' readonly></td>"+
      			"<td class='text-left input-sm' >"+
      			"<input type='text' class='form-control text-right totalstockinhand input-sm' style='border:none;' name='stock_in_hand["+a+"]' id='stock_in_hand["+a+"]' value='"+value.stock_in_hand+"' readonly></td>"+
      			"<td class='text-left input-sm' >"+
      			"<input onchange='myCellChange("+a+")' type='text' class='form-control text-right totalreceive_quantity input-sm' style='border:none;' name='receive_quantity["+a+"]' id='receive_quantity["+a+"]' value='"+0+"' ></td>"+
      			"<td class='text-left input-sm' >"+
		        "<input  type='checkbox' id='checkbox"+a+"' name='checkbox"+a+"' value='0' onclick='check("+a+")'> </td>"+
		        "<td class='text-left input-sm' >"+
				"<input type='button' value='Delete' class='delete btn btn-danger input-sm ' onclick='delete_row("+a+")'>"+
		        "</td>"+ 
		      	"</tr>"
            	);
            calculateTotalAmount();
            });

            })
    });
});

function check(a)
{	 
	var stockactual = 0;
 		stockactual = document.getElementById("stock_in_hand_actual["+a+"]").value;

		var chkBox = $('#checkbox'+a+'').val();
		 
	  	if(chkBox == 0){
	 				$('#checkbox'+a+'').val(1);
	 				// $('#receive_quantity'+a+'').val(stockactual);
	 				// $('#stock_in_hand'+a+'').val(0);
					document.getElementById("receive_quantity["+a+"]").value = stockactual;
 					document.getElementById("stock_in_hand["+a+"]").value=0;

		}
		else{
					// alert("checkUncheck");
	 				$('#checkbox'+a+'').val(0);
					document.getElementById("receive_quantity["+a+"]").value = 0;
 					document.getElementById("stock_in_hand["+a+"]").value=stockactual;
		}
		total_receive();
        calculateTotalAmount();

 
}
   
function myCellChange(a) {
 
 // alert(a);
// if ($('#stock_in_hand_actual['+a+']').length) {
	var getwuantity = 0;
	var stockquantity= 0;
	var stockactual= 0;
	var stockavailable = 0;

	 getwuantity = document.getElementById("receive_quantity["+a+"]").value;
 	 stockquantity = document.getElementById("stock_in_hand["+a+"]").value;
 	 stockactual = document.getElementById("stock_in_hand_actual["+a+"]").value;
 	 
 	
 	if($.isNumeric(getwuantity) && $.isNumeric(stockquantity))
	{	
		// alert(getwuantity + "," + stockactual);
		// if (getwuantity < stockactual) {
		if (document.getElementById("receive_quantity["+a+"]").value > document.getElementById("stock_in_hand_actual["+a+"]").value) {
			alert("The Value Not greter then " + stockactual);
	 		
	 		getwuantity = document.getElementById("stock_in_hand_actual["+a+"]").value;
			
			document.getElementById("receive_quantity["+a+"]").value = getwuantity;

			document.getElementById("stock_in_hand["+a+"]").value = 0;
			 
 		}
 		else{
 				// total = +stockquantity + +getwuantity; //sum
		 	stockavailable = +stockactual - +getwuantity; //sum
		 	// alert(getwuantity + "," + stockactual);
			document.getElementById("stock_in_hand["+a+"]").value = stockavailable;
 			}
 			
		
 		
		
		// if ($('#checkbox'+a+'').val()== 0) {
		if ($('#checkbox'+a+'').val()== 0) {
			$('#checkbox'+a+'').val(1);
			$('#checkbox'+a+'').prop("checked", true);
			}
		if (document.getElementById("receive_quantity["+a+"]").value == 0) {
			$('#checkbox'+a+'').val(0);
			$('#checkbox'+a+'').prop("checked", false);
		}
		 

    // calculateTotalAmount();
    }
	else
	{
		alert("Please give numeric value .");
	}

	total_receive();
    calculateTotalAmount();

	// }
		
}
function total_receive() {
	 
	var total_receive_quantity = 0;
	var length = $("#detail_max_number").val();
	length = +length + +1;
	// alert(length);
	for (i = 1; i < length; i++) { 
		if (document.getElementById("receive_quantity["+i+"]")) {
		var getwuantity = document.getElementById("receive_quantity["+i+"]").value

		total_receive_quantity = +total_receive_quantity + +getwuantity ;
 
		$("#total_receive_quantity").val(total_receive_quantity);
		}
	
	}
 
}

function calculateTotalAmount()
{

	var t_quantity = 0;

	$(".detailquantity").each(function()	
	{
		t_quantity += Number($(this).val());
	});
	$("#t_quantity").val(t_quantity);

	var totalsub_unit_quantity = 0;

	$(".detailamnt").each(function()	
	{
		totalsub_unit_quantity += Number($(this).val());
	});
	$("#totalsub_unit_quantity").val(totalsub_unit_quantity);
	
	var total_stock_in_hand = 0;

	$(".totalstockinhand").each(function()	
	{
		total_stock_in_hand += Number($(this).val());
	});
	$("#total_stock_in_hand").val(total_stock_in_hand);

////get total
	// var total_receive_quantity = 0;

	// $(".totalreceive_quantity").each(function()	
	// {
	// 	total_receive_quantity += Number($(this).val());
	// });
	// $("#total_receive_quantity").val(total_receive_quantity);

}

	function delete_row(no)
	{	
		document.getElementById("row"+no+"").outerHTML="";
		calculateTotalAmount();
		total_receive()
	}


</script>
@endpush
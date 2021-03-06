@extends("la.layouts.app")

@section("contentheader_title", "JMLoomProductions")
@section("contentheader_description", "jmloomproductions listing")
@section("section", "JMLoomProductions")
@section("sub_section", "Listing")
@section("htmlheader_title", "JMLoomProductions Listing")

@section("headerElems")
<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add JMLoomProduction</button>
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
				<h4 class="modal-title" id="myModalLabel">Add JMLoomProduction</h4>
			</div>
			{!! Form::open(['action' => 'LA\JMLoomProductionsController@store', 'id' => 'jmloomproduction-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    <div class="form-group col-xs-12">
					<div class="form-group col-xs-8">

	                    <label for="date">Date :</label>
	                    <div class="input-group date col-xs-4">
	                    <input class="form-control valid" placeholder="Enter Date" name="date" type="text" value="" aria-invalid="false"><span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    	</div>
                    </div>
                    </div>

					<div class="form-group col-xs-12">
						
						<div class="form-group col-xs-2">
						<label for="shift">Shift* :</label>
						<select class="form-control select2-hidden-accessible" required="1" data-placeholder="Enter shift" rel="select2" name="shift" id="shift" tabindex="-1" aria-hidden="true" aria-required="true">
						
						<option >Select</option>
						@foreach( $shift as $value )
						<option value="{{$value->id}}" >{{$value->shift}}</option>
						@endforeach
						</select> 
						</div>
						<div class="form-group col-xs-2">
						<label for="item">Item* :</label>
						<select class="form-control select2-hidden-accessible" required="1" data-placeholder="Enter item" rel="select2" name="item" id="item" tabindex="-1" aria-hidden="true" aria-required="true">
						
						<option >Select</option>
						@foreach( $productionItem as $value )
						<option value="{{$value->id}}" >{{$value->production_item}}</option>
						@endforeach
						</select>
						 
						</div>	


						<div class="form-group col-xs-2">
						<label for="item_categorie_id">Categorie* :</label>
						<select class="form-control select2-hidden-accessible" required="1" data-placeholder="Enter Categorie" rel="select2" name="item_categorie_id" id="item_categorie_id" tabindex="-1" aria-hidden="true" aria-required="true">
					 
						</select>
					
						</div> 
					 

						<div class="form-group col-xs-2">
							<label for="add_btn"  style="opacity: 0;">Add Button* :</label>
						    <input aria-hidden="true" aria-required="true" type="button" name="add_btn" class="add btn btn-warning " id="add" onclick="add_row();" value="Add">
							<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
						</div>
					</div>
					
					<div class="form-group row input-sm">
		          		<div class="wall col-md-2">
		          			
		          		</div>
		          		<div class="col-md-12 text-center">
		          			<input type="hidden" value="0" id="detail_max_number" class="input-sm" name="detail_max_number">
			              <table class="table table-bordered"" id="data_table" >
						      <tr class="info">
						        <th class="text-left input-sm" style="display:none;">Item Id</th>
						        <th class="text-left input-sm" ">Production</th>
						        <th class="text-left input-sm" style="display:none;">Category Id</th>
						        <th class="text-left input-sm">Category</th>
						        <th class="text-left input-sm" >Terget(piece)</th>
						        <th class="text-left input-sm" >Terget(Weight)</th>
						        <th class="text-left input-sm" >Production(P)</th>
						        <th class="text-left input-sm" >production(W)</th>
						        <th class="text-left input-sm" >Achivet(%)/P</th>
						        <th class="text-left input-sm" >Achivet(%)/Q</th>
						        <th class="text-left input-sm" style="display:none;">Unit</th>
						        <th class="text-left input-sm" style="display:none;">Sub Unit</th>
						         
						        <th class="text-left input-sm" >Delete</th>
						      </tr>
 				 
								<tfoot>
								<tr class="">
						        <td class="text-left input-sm" style="display:none;"></td>
						        <td class="text-left input-sm" "></td>
						        <td class="text-left input-sm" style="display:none;"></td>
						        <td class="text-left input-sm"></td>
						        <td class="text-left input-sm" >Total</td>
						        <td class="text-left input-sm" >
		                  		<input type="text" class="form-control text-right input-sm" style='border:none;' name="total_production_quantity" id="total_production_quantity" value="0" readonly></td>

						        <td class="text-left input-sm" >
		                  		<input type="text" class="form-control text-right input-sm" style='border:none;' name="total_production_quantity_Piec" id="total_production_quantity_Piec" value="0" readonly></td>
						        	
						        <td class="text-left input-sm" ></td>
						        <td class="text-left input-sm" ></td>
						        <td class="text-left input-sm" ></td>
						        	
						       
						        <td class="text-left input-sm" style="display:none;"></td>
						        <td class="text-left input-sm" style="display:none;"></td>
						      </tr>
							  </tfoot>
						  </table>
						  
						</div>
					
		          	</div>
					
					
					{{--
					@la_input($module, 'serial')
					@la_input($module, 'date')
					@la_input($module, 'item')
					@la_input($module, 'category')
					@la_input($module, 'terget_q_piece')
					@la_input($module, 'terget_q')
					@la_input($module, 'unit_type')
					@la_input($module, 'sun_unit_type')
					@la_input($module, 'production_quantity_Piece')
					@la_input($module, 'production_quantity')
					@la_input($module, 'total_production_quantity_Piec')
					@la_input($module, 'total_production_quantity')
					@la_input($module, 'total_achivet_parcent_piece')
					@la_input($module, 'total_achivet_parcent')
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
        ajax: "{{ url(config('laraadmin.adminRoute') . '/jmloomproduction_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#jmloomproduction-add-form").validate({
		
	});
});
</script>



<script type="text/javascript" >
  
$(document).ready(function(){
     $("#item").change(function(){
         var itemid = $('#item').val();
             $(item_categorie_id).find("option").remove();
        	 $.get("{{ url(config('laraadmin.adminRoute') . '/jm_production_item_chat') }}" + '/' + itemid, function (data) {
         // alert(itemid)
 

            console.log(data);
             $.each(data, function(key, value) {
            $("#item_categorie_id").append("<option value="+value.id+">" + value.production_item_category +"</option>");
            });

            })
    });
});
</script>
<script type="text/javascript" >  

function add_row() 
{

	var item_categorie=$("#item_categorie_id").find(':selected').val();
	var item_categorie_title=$("#item_categorie_id").find(':selected').text();
	var item=$("#item").find(':selected').val();
	var itemName=$("#item").find(':selected').text();

	// alert(item);


	var table_len= Number($("#detail_max_number").val()) + 1;
	$("#detail_max_number").val(table_len);

	$("#data_table").append(	
				 
	"<tr id='row"+table_len+"'>"+
	"<td class='text-center input-sm' style='display:none;'>"+
	"<input type='text' style='border:none;'  class='text-center' name='item["+table_len+"]' value='"+item+"' readonly></td>"+
	"<td class='text-center input-sm' >"+
	"<input type='text' style='border:none;'  class='text-left' size='12' name='itemName["+table_len+"]' value='"+itemName+"' readonly></td>"+
	"<td class='text-center input-sm' style='display:none;'>"+
	"<input type='text' style='border:none;'  class='text-center' name='category["+table_len+"]' value='' readonly></td>"+
	"<td class='text-center input-sm' >"+
	"<input type='text' style='border:none;' class='text-left' size='12' name='categoryTitle["+table_len+"]' value='"+item_categorie_title+"' readonly></td>"+
	"<td class='text-center input-sm' >"+
	"<input type='text' style='border:none;' class='text-center' size='8' name='terget_q_piece["+table_len+"]' value='0' readonly></td>"+
	"<td class='text-center input-sm'  >"+
	"<input type='text' style='border:none;' class='text-center' size='8' name='terget_q["+table_len+"]' value='1' readonly></td>"+
	"<td class='text-center input-sm'  >"+
	"<input type='text' style='border:none;' class='text-center' size='8' name='production_quantity_Piece["+table_len+"]' value='1' ></td>"+
	"<td class='text-center input-sm'  >"+
	"<input type='text' style='border:none;' class='text-center' size='8' name='production_quantity["+table_len+"]' value='1' ></td>"+
	"<td class='text-center input-sm'  >"+
	"<input type='text' style='border:none;' class='text-center' size='8' name='total_achivet_parcent_piece["+table_len+"]' value='1' ></td>"+
	"<td class='text-center input-sm'  >"+
	"<input type='text' style='border:none;' class='text-center' size='8' name='total_achivet_parcent["+table_len+"]' value='1' ></td>"+
	"<td class='text-center input-sm'  style='display:none;'>"+
	"<input type='text' style='border:none;' class='text-center' size='8' name='unit_type["+table_len+"]' value='1' ></td>"+
	"<td class='text-center input-sm'  style='display:none;'>"+
	"<input type='text' style='border:none;' class='text-center' size='8' name='sun_unit_type["+table_len+"]' value='0'  ></td>"+
	"<td class='text-center input-sm' >"+
	"<input type='button' value='Delete'  class='delete btn btn-danger  input-sm' onclick='delete_row("+table_len+")'>"+
	"</td>"+
	"</tr>"

	);	

	      	calculateTotalAmount();

}
function myCellChange(indexno) {
	// var quantityBoxname = all.getAttribute('name');
	// var subQuantyTextBoxName = quantityBoxname.replace(/quantity/i, "sub_unit_quantity")
	var quantity = document.getElementById("quantity["+indexno+"]").value;
 	var subQuanty = document.getElementById("sub_unit_quantity["+indexno+"]").value;
 	if($.isNumeric(quantity) && $.isNumeric(subQuanty))
	{
		// var total = quantity*subQuanty;
		// document.getElementById("total_quantity["+indexno+"]").value = total;
 
    calculateTotalAmount();
    }
	else
	{
		alert("Please give numeric value for debit amount.");
	}
}

function calculateTotalAmount()
{

	var t_quantity = 0;

	$(".detailamnt").each(function()	
	{
		t_quantity += Number($(this).val());
	});
	$("#t_quantity").val(t_quantity);

	var total_sub_qnt = 0;

	$(".detailamntsubq").each(function()	
	{
		total_sub_qnt += Number($(this).val());
	});
	$("#total_sub_qnt").val(total_sub_qnt);

	// var total_qnt = 0;

	// $(".detailamnttotal").each(function()	
	// {
	// 	total_qnt += Number($(this).val());
	// });
	// $("#total_qnt").val(total_qnt);
}

	function delete_row(no)
	{	
		document.getElementById("row"+no+"").outerHTML="";
		calculateTotalAmount();
	}


</script>
@endpush
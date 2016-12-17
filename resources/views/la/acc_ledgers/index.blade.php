
@extends("la.layouts.app")

@section("contentheader_title", "Acc_ledgers")
@section("contentheader_description", "acc_ledgers listing")
@section("section", "Acc_ledgers")
@section("sub_section", "Listing")
@section("htmlheader_title", "Acc_ledgers Listing")

@section("headerElems")
<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Acc_ledger</button>
@endsection
@section("headerElems")
<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Acc_ledger</button>
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
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Acc_ledger</h4>
			</div>
			{!! Form::open(['action' => 'LA\Acc_ledgersController@store', 'id' => 'acc_ledger-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    





    


	<!-- @foreach($acc_items1 as $chtOfAccount)
        @if($chtOfAccount->parent_id == 0 and $chtOfAccount->acc_depth == 0)
	        <li>{{ $chtOfAccount->account_title }}
	           <ul>
	                @foreach($acc_items2 as $chtOfAccountChild)
	        			@if($chtOfAccountChild->parent_id == $chtOfAccount->id)
	                    	<li>{{ $chtOfAccountChild->account_title }}

                    			<ul>
					                @foreach($acc_items3 as $chtOfAccountSubChild)

					        			@if( $chtOfAccountSubChild->parent_id == $chtOfAccountChild->id)
					                    	<li>{{ $chtOfAccountSubChild->account_title }}
					                    	</li>
					       				 @endif

					                @endforeach 
				                </ul>

	                    	</li>
	       				 @endif
	                @endforeach 
                </ul>

	        </li>         
        @endif
	@endforeach -->



			<!-- {!! $tree !!} -->
			<!-- {{$tree}} -->
        


				<div class="form-group row">
                	<div class="col-md-3 ">
			            {!! $tree !!}
		            </div>
		            <div class="col-md-9 ">
			            <div class="form-group row">
	                    	<div class="col-md-3 ">
					            <label class="control-label text-right">Ledger Title</label>
					            <input type="text" class="form-control input-sm" name="ledger_title" value="" id="ledger_title">
					            <!-- <input class="form-control" placeholder="Enter 3rd title"  name="ledger_title" type="text" value=""> -->
				            </div>
				            <div class="col-md-3 ">
					            <label class=" control-label">Ledger Type</label>
				                <select type="text" id="ledger_type_id" name="ledger_type_id" class="form-control input-sm">
				            		<option>select</option>
				            		@foreach ($ledger_types as $item)
								      	<option value="{{ $item ->ledger_type_id }}">{{ $item ->ledger_type }}
			                		@endforeach
				            	</select>
				            </div>
				            <div class="col-md-6 ">
					           
				                <div class="checkbox">
								  <label><input type="checkbox" name="effect_cof" id="effect_cof" value="0" onClick="stateOptions1()">chart of account</label>
								  <label><input type="checkbox" value="0" id="detail_info" onClick="stateOptions3()">Detail information</label>
								</div>
				            </div>
	                    </div>
	                    <div class="form-group row" id="account" >
	                    	<div class="col-md-3 ">
					            <label class="control-label text-right">Parentledger</label>
					            <select type="text" class="form-control input-sm" id="p_select" name="p_select">
					            	<option>select</option>
					            	@foreach ($parent as $item)
								      	<option value="{{ $item ->id }},{{ $item ->account_no }}">{{ $item ->account_title }}
			                		@endforeach
					            </select>
				            </div>
				            <div class="col-md-3 ">
					            <label class="control-label text-right" >Category</label>
					            <select type="text" class="form-control input-sm" id="select" name="category" onchange="stateOptions2()">
					            	<option value="">select</option>
					            	<option value="Account">Account</option>
					            	<option value="subledger">subledger</option>
					            </select>
				            </div>
				            <div id="aOrl_1">
				            	<div class="col-md-3 ">
						            <label class="control-label text-right">Balance: OP</label>
						            <input type="text" class="form-control input-sm" name="opening_balance" id="trans_date" value="">
						        </div>
					            <div class="col-md-3 ">
						            <label class="control-label text-right">Balance: CU</label>
						            <input type="text" class="form-control input-sm" name="current_balance" id="trans_date" value="">
					            </div>
				            </div>
				            
	                    </div>
	                    <div class="form-group row" id="aOrl_2">
	                    	<div class="col-md-3 ">
					            <label class="control-label text-right">Ledger No</label>
					            <input type="text" class="form-control input-sm" name="ledger_no" id="ledger_no" value="">
				            </div>
				            <div class="col-md-3 ">
					            <label class="control-label text-right">Status</label>
					            <select type="text" class="form-control input-sm" name="account_status">
					            	<option>Select</option>
					            	<option>Active</option>
					            	<option>Sussspend</option>
					            </select>
				            </div>
				            <div class="col-md-3 ">
					            <label class="control-label text-right">Date</label>
					            <input type="date" class="form-control input-sm" name="date" id="trans_date" value="">
				            </div>
				            <div class="col-md-3 ">
					            <label class="control-label text-right">Inventory </label>
					            <div class="checkbox text-center">
								  <input type="checkbox" value="" name="is_inventory_related">
								</div>
				            </div>
	                    </div>
	                    <div class="well" id="detail">
	                    	<div class="form-group row ">
	                    		<div class="col-md-6">
						            <label class="control-label text-right">A/C Holder</label>
						            <input type="text" class="form-control input-sm" name="acc_holder" id="" value="">
				            	</div>
				            	<div class="col-md-6 ">
						            <label class="control-label text-right">Bank A/C Types</label>
						            <input type="text" class="form-control input-sm" name="bank_acc_type" id="" value="">
				            	</div>
	                    	</div>
	                    	<div class="form-group row ">
	                    		<div class="col-md-6">
						            <label class="control-label text-right">Address</label>
						            <input type="text" class="form-control input-sm" name="address" id="" value="">
				            	</div>
				            	<div class="col-md-6 ">
						            <label class="control-label text-right">Phone</label>
						            <input type="text" class="form-control input-sm" name="phone" id="" value="">
				            	</div>
	                    	</div>
	                    	<div class="form-group row ">
	                    		<div class="col-md-6">
						            <label class="control-label text-right">Fax</label>
						            <input type="text" class="form-control input-sm" name="phone" id="" value="">
				            	</div>
				            	<div class="col-md-6 ">
						            <label class="control-label text-right">Email</label>
						            <input type="text" class="form-control input-sm" name="email" id="" value="">
				            	</div>
	                    	</div>
	                    	<div class="form-group row ">
	                    		<div class="col-md-6">
						            <label class="control-label text-right">Country</label>
						            <input type="text" class="form-control input-sm" name="country" id="" value="">
				            	</div>
				            	<div class="col-md-6 ">
						            <label class="control-label text-right">Currency</label>
						            <input type="text" class="form-control input-sm" name="currency" id="" value="">
				            	</div>
	                    	</div>
	                    	<div class="form-group row ">
	                    		<div class="col-md-6">
						            <label class="control-label text-right">Branch</label>
						            <input type="text" class="form-control input-sm" name="branch" id="" value="">
				            	</div>
				            	<div class="col-md-6 ">
						            <label class="control-label text-right">Remarks</label>
						            <input type="text" class="form-control input-sm" name="remarks" id="" value="">
				            	</div>
	                    	</div>
	                    </div>
	                    
	                    <div id="s_hide">
	                    	<select id="head2" >
		                    	@foreach ($head2 as $item)
						      		<option value="{{ $item ->id }}">{{ $item ->account_title }}
	                			@endforeach
		                    </select>
	                    </div>
	                    <input type="text" name="test" id="test" value="">
	                    
		            </div>
		            
                </div>

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
<link rel="stylesheet" href="http://demo.expertphp.in/css/jquery.treeview.css" />
    <script src="http://demo.expertphp.in/js/jquery.js"></script>   
    <script src="http://demo.expertphp.in/js/jquery-treeview.js"></script>
    <script type="text/javascript" src="http://demo.expertphp.in/js/demo.js"></script>
<script>
$(document).ready(function(){
     $("#p_select").change(function(){
         var itemidAll = $('#p_select').val();
         	var str =itemidAll;
    		var itemid = str.split(",")[0];
    		var item_acc_no = str.split(",")[1];
    		// var item_acc = str.split(" ")[1];
    		// alert(item_acc_no)
    		alert(itemid)
    		$('#test').val(itemid);
    		// document.getElementById('test').value =itemid;
             $(head2).find("option").remove();
             // $("#head2").val("select");
             // alert(itemid);
             var p =0;
        	 $.get("{{ url(config('laraadmin.adminRoute') . '/sub_acc_ledger') }}" + '/' + itemid, function (data) {
 
            console.log(data);
             $.each(data, function(key, value) {
            $("#head2").append("<option value="+value.id+">" + value.account_title +"</option>");
            p=p+1;
            });
             p=p+1;
// alert(item_acc_no+"-"+p);
$('#ledger_no').val(item_acc_no+"-"+p);
            })
    });
     
});

$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/acc_ledger_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#acc_ledger-add-form").validate({
		
	});
});
</script>
<script type="text/javascript" >
  

</script>
<script type="text/javascript">
document.getElementById('account').style.display = 'none';
document.getElementById('aOrl_1').style.display = 'none';
document.getElementById('aOrl_2').style.display = 'none';
document.getElementById('s_hide').style.display = 'none';
document.getElementById('detail').style.display = 'none';
	function stateOptions1()
{
   
    if(document.getElementById('effect_cof').value == 0){
    
		document.getElementById('account').style.display = '';
		$('#effect_cof').val(1);

    }  
    else{
    	document.getElementById('account').style.display = 'none';
		$('#effect_cof').val(0);
    }

}


	
	function stateOptions2()
{	

   	var x = document.getElementById("select").value;
    if(x == 'Account')
    {
		document.getElementById('aOrl_1').style.display = '';
		document.getElementById('aOrl_2').style.display = '';
		// $('#effect_cof').val(1);
    }  
    else
    {
    	document.getElementById('aOrl_1').style.display = 'none';
    	document.getElementById('aOrl_2').style.display = 'none';
		// $('#effect_cof').val(0);
    }
}

function stateOptions3()
{
   
    if(document.getElementById('detail_info').value == 0){
    
		document.getElementById('detail').style.display = '';
		$('#detail_info').val(1);

    }  
    else{
    	document.getElementById('detail').style.display = 'none';
		$('#detail_info').val(0);
    }

}
</script>

@endpush
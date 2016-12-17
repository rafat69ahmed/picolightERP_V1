@extends("la.layouts.app")

@section("contentheader_title", "Ledgerreports")
@section("contentheader_description", "ledgerreports listing")
@section("section", "Ledgerreports")
@section("sub_section", "Listing")
@section("htmlheader_title", "Ledgerreports Listing")

@section("headerElems")
<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal" onclick="div_hide()">Add Ledgerreport</button>
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
		<div class="modal-content" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Ledgerreport</h4>
			</div>
			{!! Form::open(['action' => 'LA\LedgerreportsController@store', 'id' => 'ledgerreport-add-form']) !!}
			<div class="modal-body">
				<div class="box-body" >
					<div class="form-group row" >
					<!--main div1 -->
						<div class="col-md-5">
							<div class="form-group row well ">
								<div class="col-md-6">
									<div>
										<label><input type="checkbox" name="ledger_book" value="0" id="ledger_book" value="0" onClick="ledgerbook()">ledger book</label>
									</div>
									<div>
										<label><input type="checkbox" name="journal_book" value="0" id="journal_book" value="0" onClick="journalbook()">journal book</label>
									</div>
									<div>
										<label><input type="checkbox" name="cash_book" value="0" id="cash_book" value="0" onClick="cashbook()">cash book</label>
									</div>
									<div>
										<label><input type="checkbox" name="bank_book" value="0" id="bank_book" value="0" onClick="bankbook()">bank book</label>
									</div>
									<div>
										<label><input type="checkbox" name="cash_flow_satement" value="0" id="cash_flow_satement" value="0" onClick="cashflowsatement()">cash flow satement</label>
									</div>
									<div>
										<label><input type="checkbox" name="trial_balance" value="0" id="trial_balance" value="0" onClick="trialbalance()">trial balance</label>
									</div>
								</div>
								<div class="col-md-6 text-left">
									<div>
										<label><input type="checkbox" name="bills_payable" value="0" id="bills_payable" value="0" onClick="billspayable()">bills payable</label>
									</div>
									<div>
										<label><input type="checkbox" name="bills_receiveable" value="0" id="bills_receiveable" value="0" onClick="billsreceiveable()">bills receive</label>
									</div>
									<div>
										<label><input type="checkbox" name="closing_balance" value="0" id="closing_balance" value="0" onClick="closingbalance()">closing balance</label>
									</div>
									<div>
										<label><input type="checkbox" name="voucher_register" value="0" id="voucher_register" value="0" onClick="voucherregister()">voucher register</label>
									</div>
									<div>
										<label><input type="checkbox" name="chart_of_account" value="0" id="chart_of_account" value="0" onClick="chartofaccount()">chart of account</label>
									</div>
									<div>
										<label><input type="checkbox" name="balance_sheet" value="0" id="balance_sheet" value="0" onClick="balancesheet()">balance sheet</label>
									</div>
									<!-- <div>
										<label><input type="checkbox" name="test" value="0" id="test" value="0" onClick="test55()">Test</label>
									</div> -->
								</div>
								
								
							</div>
						</div>
					<!--main div2 -->
						<div class="col-md-7">
							<div class="form-group well" id="ledger_book_div">
								<div   name="ledger_book_div">
									<label class="control-label text-right">Ledger Title</label>
						            <select type="text" id="voucher_for" onchange="select1()" class="form-control input-sm" name="account_no">
						            	@foreach ($acc_items as $item)                         
									      <option value="{{ $item ->id }}">{{ $item ->account_title }}
			                    		@endforeach
					            	</select>
								</div>
								<div id="auto_date1" >
									
								</div>
							</div>
							

							<div class="well" id="journal_book_div">
								<h1>journal book</h1>								
	                    		<div class="form-group" >			                    	
						            <div id="auto_date2" ></div>
			                    </div>
							</div>
							<div class="well" id="cash_book_div">	
								<h1>cash book</h1>							
	                    		<div class="form-group">
			                    	<div id="auto_date3" ></div>
			                    </div>
							</div>
							<div class="well" id="bank_book_div">	
								<h1>bank book</h1>							
	                    		<div class="form-group">
			                    	<div id="auto_date4" ></div>
			                    </div>
							</div>
							<div class="well" id="cash_flow_div">
								<h1>cash flow</h1>								
	                    		<div class="form-group">
			                    	<div id="auto_date5" ></div>
			                    </div>
							</div>
							<div class="well" id="trial_balance_div">	
								<h1>trial balance</h1>							
	                    		<div class="form-group row">
			                    	<div id="auto_date6" ></div>
			                    </div>
							</div>
							<div class="well" id="bills_payable_div">								
	                    		<div class="form-group row">			                    	
						            <h1>bills Payable</h1>
			                    </div>
							</div>
							<div class="well" id="bills_receive_div">								
	                    		<div class="form-group row">
						            <h1>bills receiveable</h1>
			                    </div>
							</div>
							<div class="well" id="closing_balance_div">								
	                    		<div class="form-group row">
	                    			<h1>closing balance</h1>
						            <div class="col-md-12 ">
							            <label class="control-label text-right">A/C head</label>
							            <select type="text" id="voucher_for" onchange="select1()" class="form-control input-sm" name="">
						            	@foreach ($acc_items as $item)                         
									      <option value="{{ $item ->id }}">{{ $item ->account_title }}
			                    		@endforeach
						            	</select>
						            </div> 
			                    </div>
							</div>
							<div class="well" id="voucher_register_div">	
								<h1>voucher register</h1>							
	                    		<div class="form-group">
			                    	<div id="auto_date7" ></div>			            
			                    </div>
			                    <div class="form-group row">
			                    	<div class="col-md-12 ">
							            <label class="control-label text-right">voucher type</label>
							            <select type="text" id="voucher_for" onchange="select1()" class="form-control input-sm" name="">						            	                         
										    <option value="all">all
										    <option value="bebit">bebit
										    <option value="credit">credit
										    <option value="journal">journal
						            	</select>
						            </div> 
			                    </div>
							</div>
							<div class="well" id="chart_of_account_div">								
	                    		<div class="form-group row">			                    	
						            <h1>chart of account</h1>
			                    </div>
							</div>
							<div class="well" id="balance_sheet_div">								
	                    		<div class="form-group row">			                    	
						            <h1>balance sheet</h1>
			                    </div>
							</div>	
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

<script type="text/javascript">
	
					var	from_date = "<div class='col-md-6 '>"+
					"<label class='control-label text-right'>From Date</label>"+
					"<input type='date' class='form-control input-sm' name='from_date' id='from_date' value=''>"+
					"</div>" ;
					var to_date = "<div class='col-md-6 '>"+
					"<label class='control-label text-right'>To Date</label>"+
					"<input type='date' class='form-control input-sm' name='to_date' id='to_date' value=''>"+
					"</div>" ;

					var form_group = "<div class='form-group row'>" +from_date + to_date +"</div>";
					// function test55(){
					//  alert();
					// 	 $('#ledger_book_div').html(form_group);
					// }

					
</script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/ledgerreport_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#ledgerreport-add-form").validate({
		
	});
});
function select1()
{
	var r = document.getElementById('voucher_for').value;
	alert(r);
}

// _____________________ledger book_________________________

function ledgerbook()
{	
	var l = document.getElementById("ledger_book").checked;
	div_hide();
	if(l== true)
	{
		document.getElementById('ledger_book_div').style.display = '';
		document.getElementById("ledger_book").checked = true;
		document.getElementById("ledger_book").value = 1;
		$('#auto_date1').html(form_group);
	}
	else
	{
		document.getElementById('ledger_book').value = 0;
		div_hide();
	}
}
// _____________________journal book_________________________

function journalbook()
{
	
	var j = document.getElementById("journal_book").checked;
	div_hide();
	if(j== true)
	{
		document.getElementById('journal_book_div').style.display = '';
		document.getElementById("journal_book").checked = true;
		document.getElementById("journal_book").value = 1;
		$('#auto_date2').html(form_group);
		
	}
	else
	{
		document.getElementById('journal_book').value = 0;
		div_hide();
	}
}
// _____________________cash book_________________________

function cashbook()
{
	
	var j = document.getElementById("cash_book").checked;
	div_hide();
	if(j== true)
	{
		document.getElementById('cash_book_div').style.display = '';
		document.getElementById("cash_book").checked = true;
		document.getElementById('cash_book').value = 1;
		$('#auto_date3').html(form_group);
	}
	else
	{
		document.getElementById('cash_book').value = 0;
		div_hide();
	}
}
// _____________________bank book_________________________

function bankbook()
{
	
	var j = document.getElementById("bank_book").checked;
	div_hide();
	if(j== true)
	{
		document.getElementById('bank_book_div').style.display = '';
		document.getElementById("bank_book").checked = true;
		document.getElementById('bank_book').value = 1;
		$('#auto_date4').html(form_group);
	}
	else
	{
		document.getElementById('bank_book').value = 0;
		div_hide();
	}
}
// _____________________cash flow statement_________________________

function cashflowsatement()
{
	
	var j = document.getElementById("cash_flow_satement").checked;
	div_hide();
	if(j== true)
	{
		document.getElementById('cash_flow_div').style.display = '';
		document.getElementById("cash_flow_satement").checked = true;
		document.getElementById('cash_flow_satement').value = 1;
		$('#auto_date5').html(form_group);
	}
	else
	{
		document.getElementById('cash_flow_satement').value = 0;
		div_hide();
	}
}
// _____________________trial balance_________________________

function trialbalance()
{
	
	var j = document.getElementById("trial_balance").checked;
	div_hide();
	if(j== true)
	{
		document.getElementById('trial_balance_div').style.display = '';
		document.getElementById("trial_balance").checked = true;
		document.getElementById('trial_balance').value = 1;
		$('#auto_date6').html(form_group);
		
	}
	else
	{
		document.getElementById('trial_balance').value = 0;
		div_hide();
	}
}
// _____________________bills payable_________________________

function billspayable()
{
	
	var j = document.getElementById("bills_payable").checked;
	div_hide();
	if(j== true)
	{
		document.getElementById('bills_payable_div').style.display = '';
		document.getElementById("bills_payable").checked = true;
		document.getElementById('bills_payable').value = 1;
	}
	else
	{
		document.getElementById('bills_payable').value = 0;
		div_hide();
	}
}
// _____________________bills receiveable_________________________

function billsreceiveable()
{
	
	var j = document.getElementById("bills_receiveable").checked;
	div_hide();
	if(j== true)
	{
		document.getElementById('bills_receive_div').style.display = '';
		document.getElementById("bills_receiveable").checked = true;
		document.getElementById('bills_receiveable').value = 1;
	}
	else
	{
		document.getElementById('bills_receiveable').value = 0;
		div_hide();
	}
}
// _____________________closing balance_________________________

function closingbalance()
{
	
	var j = document.getElementById("closing_balance").checked;
	div_hide();
	if(j== true)
	{
		document.getElementById('closing_balance_div').style.display = '';
		document.getElementById("closing_balance").checked = true;
		document.getElementById('closing_balance').value = 1;
	}
	else
	{
		document.getElementById('closing_balance').value = 0;
		div_hide();
	}
}
// _____________________voucher register_________________________

function voucherregister()
{
	
	var j = document.getElementById("voucher_register").checked;
	div_hide();
	if(j== true)
	{
		document.getElementById('voucher_register_div').style.display = '';
		document.getElementById("voucher_register").checked = true;
		$('#auto_date7').html(form_group);
	}
	else
	{
		document.getElementById('voucher_register').value = 0;
		div_hide();
	}
}
// _____________________chart of account_________________________

function chartofaccount()
{
	
	var j = document.getElementById("chart_of_account").checked;
	div_hide();
	if(j== true)
	{
		document.getElementById('chart_of_account_div').style.display = '';
		document.getElementById("chart_of_account").checked = true;
		document.getElementById('chart_of_account').value = 1;
	}
	else
	{
		document.getElementById('chart_of_account').value = 0;
		div_hide();
	}
}
// _____________________balance sheet_________________________

function balancesheet()
{
	
	var j = document.getElementById("balance_sheet").checked;
	div_hide();
	if(j== true)
	{
		document.getElementById('balance_sheet_div').style.display = '';
		document.getElementById("balance_sheet").checked = true;
		document.getElementById('balance_sheet').value = 1;
	}
	else
	{
		document.getElementById('balance_sheet').value = 0;
		div_hide();
	}
}

function div_hide()
{
	document.getElementById('journal_book_div').style.display = 'none';
	document.getElementById('ledger_book_div').style.display = 'none';
	document.getElementById('cash_book_div').style.display = 'none';
	document.getElementById('bank_book_div').style.display = 'none';
	document.getElementById('cash_flow_div').style.display = 'none';
	document.getElementById('trial_balance_div').style.display = 'none';
	document.getElementById('bills_payable_div').style.display = 'none';
	document.getElementById('bills_receive_div').style.display = 'none';
	document.getElementById('closing_balance_div').style.display = 'none';
	document.getElementById('voucher_register_div').style.display = 'none';
	document.getElementById('chart_of_account_div').style.display = 'none';
	document.getElementById('balance_sheet_div').style.display = 'none';

	document.getElementById("ledger_book").checked = false;
	document.getElementById("journal_book").checked = false;
	document.getElementById("cash_book").checked = false;
	document.getElementById("bank_book").checked = false;
	document.getElementById("cash_flow_satement").checked = false;
	document.getElementById("trial_balance").checked = false;
	document.getElementById("bills_payable").checked = false;
	document.getElementById("bills_receiveable").checked = false;
	document.getElementById("closing_balance").checked = false;
	document.getElementById("voucher_register").checked = false;
	document.getElementById("chart_of_account").checked = false;
	document.getElementById("balance_sheet").checked = false;


	document.getElementById("ledger_book").value = 0;
	document.getElementById("journal_book").value = 0;
	document.getElementById("cash_book").value = 0;
	document.getElementById("bank_book").value = 0;
	document.getElementById("cash_flow_satement").value = 0;
	document.getElementById("trial_balance").value = 0;
	document.getElementById("bills_payable").value = 0;
	document.getElementById("bills_receiveable").value = 0;
	document.getElementById("closing_balance").value = 0;
	document.getElementById("voucher_register").value = 0;
	document.getElementById("chart_of_account").value = 0;
	document.getElementById("balance_sheet").value = 0;
}
</script>


@endpush
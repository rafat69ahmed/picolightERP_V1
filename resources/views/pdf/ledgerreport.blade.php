
@extends('layouts.report')

@section('content')
<div class="container">

<div class="modal-body">
	<div class="box-body">
		@foreach($alldata as  $item1)	
		<div class="form-group row">
			<div class="col-md-6 ">
				<label>Account Title:{{$item1->acc->account_title}}</label>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-4 ">
				<label>Account No:{{$item1->acc->account_no}}</label>
			</div>
			<div class="col-md-4 ">
				<label>Account Type:</label>
			</div>
			<div class="col-md-4 ">
				<label>Opening Balance:{{$item1->acc->opening_balance}}</label>
			</div>
		</div>
		@break;
		@endforeach
	<div>
		
		 <div >
            <!-- style="margin-rignt:80px" -->
					<table align="center" class="table table-bordered" id="data_table" >
						
						<tr>
			                <th>Date</th>
							<th>voucher no</th>
			                <th>description</th>
			                <th>debit</th>
			                <th>credit</th>
			                </tr>
									

						@foreach($alldata as  $item)

						<tr>
		                <td>{{$item-> created_at}}</td>
						<td>{{$item-> trans->voucher_no}}</td>
						<td>{{$item-> trans->trans_description}}</td>
		                <td>{{$item-> debit_amt}}</td>
		                <td>{{$item-> credit_amt}}</td>
		                
		                
		                <td></td>
		                <td></td>
								    <!-- <td>{{$item-> total_quantity}}</td> -->
						</tr>
						@endforeach
									

						<tfoot>
			                <td></td>
							<td></td>
			                <td></td>
			                <td>Total -{{$allDamount}}</td>
							<td></td>
						</tfoot>
						
						
						    
						</table>
              </div>


		
	</div>

	</div>
	</div>
    
</div>
@endsection

@extends('layouts.report')

@section('content')
<div class="container">

<div class="modal-body">
	<div class="box-body">
		<h1>journal book</h1>
	<div>
		
		 <div >
            <!-- style="margin-rignt:80px" -->
					<table align="center" class="table table-bordered" id="data_table" >
						
						<tr>
			                <th>Date</th>
							<th>voucher no</th>
			                <th>description</th>
			                <th>account no</th>
			                <th>debit</th>
			                <th>credit</th>
			                </tr>
									

						@foreach($alldata as  $item)

						<tr>
		                <td>{{$item-> created_at}}</td>
						<td>{{$item-> trans->voucher_no}}</td>
						<td>{{$item-> trans->trans_description}}</td>
						<td>{{$item->acc->account_no}}</td>
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
			                <td></td>
							<td></td>
						</tfoot>
						
						
						    
						</table>
              </div>


		
	</div>

	</div>
	</div>
    
</div>
@endsection
@extends('layouts.report')

@section('content')
<div class="container">

<!-- <div class="modal-body"> -->
	<div class="box-body">

		
		@foreach($jutereceives as  $info)
			
			<div style="font-size:12px;">	
			<p>
			<label>Date : {{$info->  created_at}}<br>
			<label>Jute Receive No : {{$info-> jute_receive_no}}</label><br>
			<label>Name : {{$info-> supplier->name}}</label><br>
			<label>Address : {{$info-> supplier->address}}</label><br>
			<label>Mobile No : {{$info-> supplier->mobile}}</label>
			</p>
        	</div>
						   
            <div >
            <!-- style="margin-rignt:80px" -->
					<table class="table table-bordered " style="font-size:12px; border: 1px solid #dddddd ; " align="center">
						<tr class="success">
		                <th>SL</th>
						<th>Item Name</th>
		                <th >Item categorie</th>
		                <th>Quantity (Bundle)</th>
		                <th>Sub Unit Quantity (KG)</th>
								    <!-- <th>Total Quantity</th> -->
						</tr>
						<?php $serial = 0;	?>	
						@foreach($jutereceives as  $jutereceive)
						<?php $serial++;	?>
						<tr>
		                <td >{{$serial}}</td>
						<td>{{$jutereceive-> item->item_name}}</td>
		                <td>{{$jutereceive-> itemcategory->category_name}}</td>
		                <td>{{$jutereceive-> quantity}}</td>
		                <td>{{$jutereceive-> sub_unit_quantity}}</td>
								    <!-- <td>{{$jutereceive-> total_quantity}}</td> -->
						</tr>
						@endforeach

							<tfoot>
			                <td></td>
							<td></td>
			                <td></td>
			                <td>Total</td>
							<td>{{$info-> total_quantity}}</td>
							</tfoot>
 
					</table>
              </div>

              @break;

            @endforeach

	</div>
	</div>
	<!-- </div> -->
    
@endsection
 
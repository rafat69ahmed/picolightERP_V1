@extends("la.layouts.app")

@section("contentheader_title", "CsSRs")
@section("contentheader_description", "cssrs listing")
@section("section", "CsSRs")
@section("sub_section", "Listing")
@section("htmlheader_title", "CsSRs Listing")

@section("headerElems")
<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add CsSR</button>
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
				<h4 class="modal-title" id="myModalLabel">Add CsSR</h4>
			</div>
			{!! Form::open(['action' => 'LA\CsSRsController@store', 'id' => 'cssr-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    @la_form($module)
					
					{{--
					@la_input($module, 'booking_no')
					@la_input($module, 'date')
					@la_input($module, 'party')
					@la_input($module, 'agent')
					@la_input($module, 'potato_type')
					@la_input($module, 'empty_sacks')
					@la_input($module, 'transportation_free_cose')
					@la_input($module, 'other_cost')
					@la_input($module, 'others_cost_details')
					@la_input($module, 'unit')
					@la_input($module, 'quantity')
					@la_input($module, 'available_quantity')
					@la_input($module, 'sr_no')
					@la_input($module, 'user_id')
					@la_input($module, 'status')
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
        ajax: "{{ url(config('laraadmin.adminRoute') . '/cssr_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#cssr-add-form").validate({
		
	});
});
</script>
@endpush
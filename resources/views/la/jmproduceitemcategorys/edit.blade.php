@extends("la.layouts.app")

@section("contentheader_title", "Edit jmproduceitemcategory: ")
@section("contentheader_description", $jmproduceitemcategory->$view_col)
@section("section", "JMProduceItemCategorys")
@section("section_url", url(config('laraadmin.adminRoute') . '/jmproduceitemcategorys'))
@section("sub_section", "Edit")

@section("htmlheader_title", "JMProduceItemCategory Edit : ".$jmproduceitemcategory->$view_col)

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

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($jmproduceitemcategory, ['route' => [config('laraadmin.adminRoute') . '.jmproduceitemcategorys.update', $jmproduceitemcategory->id ], 'method'=>'PUT', 'id' => 'jmproduceitemcategory-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'produ_Item')
					@la_input($module, 'production_item_category')
					@la_input($module, 'production_item_category_dis')
					@la_input($module, 'unit_type')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/jmproduceitemcategorys') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
				
				@if($errors->any())
				<ul class="alert alert-danger">
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#jmproduceitemcategory-edit-form").validate({
		
	});
});
</script>
@endpush
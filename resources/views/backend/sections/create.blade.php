@extends('layouts.backend.master')

@section('page_title','Add New Section')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Sections</h2>
	</div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Add New Section</h5>
			</div>
			<div class="ibox-content">
				<form action="{{ route('sections.store') }}" method="post" class="form-horizontal">
					@csrf

					<div class="form-group">
						<label class="col-sm-2 control-label">Section Name</label>
						<div class="col-sm-8">
							<input type="text" name="section_name" class="form-control" value="@if(old('section_name')){{old('section_name')}}@endif">
							@if($errors->has('section_name'))
								<span class="help-block m-b-none">{{ $errors->first('section_name') }}</span>
							@endif
						</div>
					</div>
					<div class="hr-line-dashed"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Section Display Name</label>
						<div class="col-sm-8">
							<input type="text" name="section_display_name" class="form-control" value="@if(old('section_display_name')){{old('section_display_name')}}@endif">
							@if($errors->has('section_display_name'))
								<span class="help-block m-b-none">{{ $errors->first('section_display_name') }}</span>
							@endif
						</div>
					</div>
					<div class="hr-line-dashed"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Section Title</label>
						<div class="col-sm-8">
							<input type="text" name="section_title" class="form-control" value="@if(old('section_title')){{old('section_title')}}@endif">
							@if($errors->has('section_title'))
								<span class="help-block m-b-none">{{ $errors->first('section_title') }}</span>
							@endif
						</div>
					</div>
					<div class="hr-line-dashed"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Section Description</label>
						<div class="col-sm-8">
							<textarea class="form-control input-lg m-b" name="section_description">@if(old('section_description')){{ old('section_description') }}@endif</textarea>
							@if($errors->has('section_description'))
							<span class="help-block m-b-none">{{ $errors->first('section_description') }}</span>
							@endif
						</div>
					</div>
					<div class="hr-line-dashed"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Section Id</label>
						<div class="col-sm-8">
							<input type="text" name="section_id" class="form-control" value="@if(old('section_id')){{old('section_id')}}@endif">
							@if($errors->has('section_id'))
								<span class="help-block m-b-none">{{ $errors->first('section_id') }}</span>
							@endif
						</div>
					</div>
					<div class="hr-line-dashed"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Section Position</label>
						<div class="col-sm-8">
							<input type="text" name="section_position" class="form-control" value="@if(old('section_position')){{old('section_position')}}@endif">
							@if($errors->has('section_position'))
								<span class="help-block m-b-none">{{ $errors->first('section_position') }}</span>
							@endif
						</div>
					</div>
					<div class="hr-line-dashed"></div>

					<div class="form-group">
						<div class="col-sm-2 col-sm-offset-1">
							<button class="btn btn-primary" type="submit">Save changes</button>
						</div>
						<div class="col-sm-4">
							<a href="{{ route('sections.index') }}" class="btn btn-white">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
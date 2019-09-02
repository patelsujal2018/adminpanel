@extends('layouts.backend.master')

@section('page_title','Company Details')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Company Details</h2>
	</div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Company Details</h5>
			</div>
			<div class="ibox-content">
				<form action="{{ route('company.update',$company->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
					@csrf
					@method('put')

					<div class="form-group">
						<label class="col-sm-2 control-label">Company Name</label>
						<div class="col-sm-8">
							<input type="text" name="companyname" class="form-control" value="@if(old('companyname')){{old('companyname')}}@else{{$company->company_name}}@endif">
							@if($errors->has('companyname'))
								<span class="help-block m-b-none">{{ $errors->first('companyname') }}</span>
							@endif
						</div>
					</div>
					<div class="hr-line-dashed"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Company Pet Name</label>
						<div class="col-sm-8">
							<input type="text" name="companypetname" class="form-control" value="@if(old('companypetname')){{old('companypetname')}}@else{{$company->company_pet_name}}@endif">
							@if($errors->has('companypetname'))
								<span class="help-block m-b-none">{{ $errors->first('companypetname') }}</span>
							@endif
						</div>
					</div>
					<div class="hr-line-dashed"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Company Slogan</label>
						<div class="col-sm-8">
							<input type="text" name="companyslogan" class="form-control" value="@if(old('companyslogan')){{old('companyslogan')}}@else{{$company->company_slogan}}@endif">
							@if($errors->has('companyslogan'))
								<span class="help-block m-b-none">{{ $errors->first('companyslogan') }}</span>
							@endif
						</div>
					</div>
					<div class="hr-line-dashed"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Company Address</label>
						<div class="col-sm-8">
							<textarea name="companyaddress" class="form-control">@if(old('companyaddress')){{old('companyaddress')}}@else{{$company->company_address}}@endif</textarea>
							@if($errors->has('companyaddress'))
								<span class="help-block m-b-none">{{ $errors->first('companyaddress') }}</span>
							@endif
						</div>
					</div>
					<div class="hr-line-dashed"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Company Contact No</label>
						<div class="col-sm-8">
							<input type="text" name="companycontactno" class="form-control" value="@if(old('companycontactno')){{old('companycontactno')}}@else{{$company->company_contact_no}}@endif">
							@if($errors->has('companycontactno'))
								<span class="help-block m-b-none">{{ $errors->first('companycontactno') }}</span>
							@endif
						</div>
					</div>
					<div class="hr-line-dashed"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Company Email</label>
						<div class="col-sm-8">
							<input type="email" name="companyemail" class="form-control" value="@if(old('companyemail')){{old('companyemail')}}@else{{$company->company_email}}@endif">
							@if($errors->has('companyemail'))
								<span class="help-block m-b-none">{{ $errors->first('companyemail') }}</span>
							@endif
						</div>
					</div>
					<div class="hr-line-dashed"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Company Website</label>
						<div class="col-sm-8">
							<input type="text" name="companywebsite" class="form-control" value="@if(old('companywebsite')){{old('companywebsite')}}@else{{$company->company_website}}@endif">
							@if($errors->has('companywebsite'))
								<span class="help-block m-b-none">{{ $errors->first('companywebsite') }}</span>
							@endif
						</div>
					</div>
					<div class="hr-line-dashed"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Company Copyright</label>
						<div class="col-sm-8">
							<input type="text" name="companycopyright" class="form-control" value="@if(old('companycopyright')){{old('companycopyright')}}@else{{$company->company_copyright}}@endif">
							@if($errors->has('companycopyright'))
								<span class="help-block m-b-none">{{ $errors->first('companycopyright') }}</span>
							@endif
						</div>
					</div>
					<div class="hr-line-dashed"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Company Logo</label>
						<div class="col-sm-3">
							<img src="{{ asset('/backend/uploads/company/'.$company->company_logo) }}">
						</div>
						<div class="col-sm-5">
							<input type="file" name="companylogo" class="form-control">
							@if($errors->has('companylogo'))
								<span class="help-block m-b-none">{{ $errors->first('companylogo') }}</span>
							@endif
						</div>
					</div>
					<div class="hr-line-dashed"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Company Favicon</label>
						<div class="col-sm-3">
							<img src="{{ asset('/backend/uploads/company/'.$company->company_favicon_icon) }}">
						</div>
						<div class="col-sm-5">
							<input type="file" name="companyfavicon" class="form-control">
							@if($errors->has('companyfavicon'))
								<span class="help-block m-b-none">{{ $errors->first('companyfavicon') }}</span>
							@endif
						</div>
					</div>
					<div class="hr-line-dashed"></div>

					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
							<button class="btn btn-primary" type="submit">Save changes</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
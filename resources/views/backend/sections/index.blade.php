@extends('layouts.backend.master')

@section('page_title','Sections')


@section('styles')
<link href="{{ url('backend/css/plugins/dataTables/rowReorder.dataTables.min.css') }}" rel="stylesheet">
@endsection

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
				<h5>Sections</h5>
				<div class="ibox-tools">
					<a href="{{ route('sections.create') }}" class="btn btn-primary btn-xs">Add New Section</a>
				</div>
			</div>
			<div class="ibox-content">

				<div class="table-responsive">
					<table id="section-datatable" class="table table-striped table-bordered table-hover" >
						<thead>
							<tr>
								<th>No</th>
								<th>Section Name</th>
								<th>Section Display Name</th>
								<th>Section Id</th>
								<th>Section Position</th>
								<th>Section Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@php $i=1; @endphp
							@foreach($sectionlist as $sect)
							<tr id="{{$sect->section_name}}" class="gradeX">
								<td width="10">@php echo $i; @endphp</td>
								<td>{{ $sect->section_name }}</td>
								<td>{{ $sect->section_display_name }}</td>
								<td>{{ $sect->id }}</td>
								<td>{{ $sect->section_position }}</td>
								<td>
									@if($sect->section_status == 0)
										<a href="{{ route('sections.show',$sect->section_id) }}" class="btn btn-danger btn-xs">Deactive</a>
									@elseif($sect->section_status == 1)
										<a href="{{ route('sections.show',$sect->section_id) }}" class="btn btn-primary btn-xs">Active</a>
									@endif
								</td>
								<td>
									<form action="{{ route('sections.destroy',$sect->section_id) }}" method="post">
										@csrf
										@method('DELETE')
										
										<a href="{{ route('sections.edit',$sect->section_id) }}" class="btn btn-primary btn-xs">Edit</a>
										
										<button class="btn btn-danger btn-xs">Delete</button>
									</form>
								</td>
							</tr>
								@php $i++; @endphp
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>No</th>
								<th>Section Display Name</th>
								<th>Section Name</th>
								<th>Section Id</th>
								<th>Section Position</th>
								<th>Section Status</th>
								<th>Actions</th>
							</tr>
						</tfoot>
					</table>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts-js')
<script src="{{ url('backend/js/plugins/dataTables/dataTables.rowReorder.min.js') }}"></script>
<script>
    $(document).ready(function(){
        var table = $('#section-datatable').DataTable({
			rowReorder: true
		});

		table.on( 'row-reorder', function ( e, diff, edit ) {
			$.ajax({
                url: "{{ route('set_sections_position') }}",
                type: "post",
                data: {
					"_token": "{{ csrf_token() }}",
					"positions":edit.values
				},
                success: function(message) {
                    toastr.success(message);
                }
            });
		});
    });
</script>
@endsection
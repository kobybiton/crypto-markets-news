@extends('cms.master')

@section('content')

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Banners</li>
            </ol>
			<div class="table-container">
				<table class="table">
				    <thead>
					    <tr>
					    	<th scope="col">Location</th>
					        <th scope="col">Image</th>
					        <th scope="col">Link</th>
					        <th scope="col">Created At</th>
					        <th scope="col">Updated At</th>
					        <th scope="col">Archive</th>
					        <th scope="col">Update</th>
					    </tr>
				    </thead>
				    <tbody class="banners-tbody">
				    	@if(count($rows) > 0)
					    	@foreach($rows as $row)
						        <tr data-id="{{ $row->id }}" data-location="{{ $row->location }}">
						        	<td>{{ $row->name }}</td>
                                    <td>
                                        <div class="image" style="background-image: url('{{ asset('upload/banners/'. $row->image) }}')"></div>
                                    </td>
								    <td><a target="_blank" href="{{ $row->link }}">{{ $row->link }}</a></td>
								    <td>{{ $row->created_at }}</td>
								    <td>{{ $row->updated_at }}</td>
								    <td><i class="fas fa-archive archive" data-url="archive-banner" data-method="DELETE" data-id="{{ $row->id }}"></i></td>
								    <td>
								    	<a href="{{ url('cms/update-banner/'. $row->id) }}">
								    		<i class="fas fa-sync-alt update-news" data-url="update-banner" data-id="{{ $row->id }}"></i>
								    	</a>
								    </td>
						        </tr>
					        @endforeach
					    @endif
				    </tbody>
				</table>
			</div>
        </div>
        <!-- /.container-fluid -->
    </div>
  <!-- /.content-wrapper -->


@endsection

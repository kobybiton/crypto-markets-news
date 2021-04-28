@extends('cms.master')

@section('content')

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Categories</li>
            </ol>
			<div class="table-container">
				<table class="table">
				    <thead>
					    <tr>
					        <th scope="col">Name</th>
					        <th scope="col">Created At</th>
					        <th scope="col">Updated At</th>
					        <th scope="col">Archive</th>
                            <th scope="col">Update</th>
					    </tr>
				    </thead>
				    <tbody>
				    	@if(count($categories) > 0)
					    	@foreach($categories as $category)
						        <tr data-id="{{ $category->id }}">
								    <td>{{ $category->name }}</td>
								    <td>{{ $category->created_at }}</td>
								    <td>{{ $category->updated_at }}</td>
								    <td><i class="fas fa-archive archive" data-url="archive-category" data-method="DELETE" data-id="{{ $category->id }}"></i></td>
                                    <td>
                                        <a href="{{ url('cms/update-category/'. $category->id) }}">
                                            <i class="fas fa-sync-alt update-category" data-url="update-category" data-id="{{ $category->id }}"></i>
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

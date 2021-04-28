@extends('cms.master')

@section('content')

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    Archived
                </li>
                <li class="breadcrumb-item active">Articles</li>
            </ol>
			<div class="table-container">
				<table class="table">
				    <thead>
					    <tr>
                            <th scope="col">Category</th>
					        <th scope="col">Image</th>
					        <th scope="col">Title</th>
					        <th scope="col">Sub Title</th>
					        <th scope="col">Date</th>
					        <th scope="col">Author</th>
					        <th scope="col">Created At</th>
					        <th scope="col">Updated At</th>
					        <th scope="col">Restore</th>
					    </tr>
				    </thead>
				    <tbody>
				    	@if(count($rows) > 0)
					    	@foreach($rows as $row)
						        <tr data-id="{{ $row->id }}">
						        	<td>{{ $row->category_name }}</td>
								    <td><img src="{{ asset('upload/articles/'. $row->image) }}" alt="Crypto News Image"></td>
								    <td>{{ $row->title }}</td>
								    <td>{{ $row->sub_title }}</td>
								    <td>{{ $row->date }}</td>
								    <td>{{ $row->author }}</td>
								    <td>{{ $row->created_at }}</td>
								    <td>{{ $row->updated_at }}</td>
								    <td><i class="fas fa-undo restore" data-url="restore-article" data-method="POST" data-id="{{ $row->id }}"></i></td>
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

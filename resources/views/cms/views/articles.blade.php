@extends('cms.master')

@section('content')

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
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
					        <th scope="col">Description</th>
					        <th scope="col">Date</th>
					        <th scope="col">Author</th>
					        <th scope="col">Created At</th>
					        <th scope="col">Updated At</th>
					        <th scope="col">Archive</th>
					        <th scope="col">Update</th>
					    </tr>
				    </thead>
				    <tbody>
				    	@if(count($articles) > 0)
					    	@foreach($articles as $article)
						        <tr data-id="{{ $article->id }}">
						        	<td>{{ $article->category_name }}</td>
								    <td><img src="{{ asset('upload/articles/'. $article->image) }}" alt="Crypto News Image"></td>
								    <td>{{ $article->title }}</td>
								    <td>{{ $article->sub_title }}</td>
								    <td>{{ $article->description ? $article->description : $article->sub_title }}</td>
								    <td>{{ $article->date }}</td>
								    <td>{{ $article->author }}</td>
								    <td>{{ $article->created_at }}</td>
								    <td>{{ $article->updated_at }}</td>
								    <td><i class="fas fa-archive archive" data-url="archive-article" data-method="DELETE" data-id="{{ $article->id }}"></i></td>
								    <td>
								    	<a href="{{ url('cms/update-article/'. $article->id) }}">
								    		<i class="fas fa-sync-alt update-article" data-url="update-article" data-id="{{ $article->id }}"></i>
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

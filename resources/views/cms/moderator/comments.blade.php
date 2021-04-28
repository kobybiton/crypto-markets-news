@extends('cms.master')

@section('content')

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Comments</li>
            </ol>
            <div class="table-container">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Article</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th scope="col">Status Action</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($comments) > 0)
                        @foreach($comments as $comment)
                            <tr data-id="{{ $comment->id }}">
                                <td><a target="_blank" href="{{ url($comment->category_url .'/'. $comment->url .'/'. $comment->article_id)}}">{{ $comment->title }}</a></td>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->email }}</td>
                                <td class="comment-message-td"><div class="comment-message">{{ $comment->message }}</div></td>
                                <td>
                                    <input type="checkbox" data-id="{{ $comment->id }}" data-status-action="{{ $comment->status_action }}" class="jtoggler" data-jtmulti-state>
                                </td>
                                <td><div class="status">{{ $comment->status }}</div></td>
                                <td>{{ $comment->created_at }}</td>
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

@push('script')
    <script>
      $('.jtoggler').jtoggler();
    </script>
@endpush

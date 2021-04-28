@extends('cms.master')

@section('content')

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Tags</li>
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
                    @if(count($rows) > 0)
                        @foreach($rows as $row)
                            <tr data-id="{{ $row->id }}">
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>{{ $row->updated_at }}</td>
                                <td><i class="fas fa-archive archive" data-url="archive-tag" data-method="DELETE" data-id="{{ $row->id }}"></i></td>
                                <td>
                                    <a href="{{ url('cms/update-tag/'. $row->id) }}">
                                        <i class="fas fa-sync-alt update-tag" data-url="update-tag" data-id="{{ $row->id }}"></i>
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

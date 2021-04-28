@extends('cms.master')

@section('content')

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    Archived
                </li>
                <li class="breadcrumb-item active">Tags</li>
            </ol>
            <div class="table-container">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Restore</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($rows) > 0)
                        @foreach($rows as $row)
                            <tr data-id="{{ $row->id }}">
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>{{ $row->updated_at }}</td>
                                <td><i class="fas fa-undo restore" data-url="restore-tag" data-method="POST" data-id="{{ $row->id }}"></i></td>
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

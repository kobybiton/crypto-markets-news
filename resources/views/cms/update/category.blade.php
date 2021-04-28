@extends('cms.master')

@section('content')

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    Update
                </li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
            <form class="form" name="form" action="{{ route('cms/store-category') }}" enctype="multipart/form-data" method="POST">
                <div class="form-group select-wrapper">
                    <select name="section" class="form-control select">
                        @if(isset($row) && !empty($row))
                            <option value="{{ $row->name }}">{{ $row->name }}</option>
                        @endif
                    </select>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $row->id }}">
                <div class="form-group">
                    <i class="fas fa-pencil-alt"></i>
                    <label for="title">Name:</label>
                    <input maxlength="120" type="text" value="{{ $row->name }}" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Enter Name" required>
                    <div class="title characters-left">Charachters Left: <span>120</span></div>
                </div>
                <div class="form-group">
                  <button class="btn btn-success upload" type="submit">Update Category</button>
                </div>
                <div class="alert success alert-primary">Category is updated!</div>
                <div class="alert error alert-danger">unfortunatly the process failed, please try again later...</div>
            </form>
        </div>
        <!-- /.container-fluid -->
    </div>
  <!-- /.content-wrapper -->


@endsection

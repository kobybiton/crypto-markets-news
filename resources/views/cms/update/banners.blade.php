@extends('cms.master')

@section('content')

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    Update
                </li>
                <li class="breadcrumb-item active">Banner</li>
            </ol>
            <form class="form" name="form" action="{{ route('cms/store-banner') }}" enctype="multipart/form-data" method="POST">
                <div class="form-group select-wrapper">
                    <select name="location" class="form-control select">
                        @if(isset($row) && !empty($row))
                            <option value="{{ $row[0]->location }}">{{ $row[0]->name }}</option>
                        @endif
                    </select>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $row[0]->id }}">
                <div class="image-wrapper" class="form-group">
                    <i class="fas fa-images"></i>
                    <label>Image:</label><br>
                    <input type="file" id="image" name="image"><br>
                    <img class="banner-image" src="{{ asset('upload/'. $row[0]->image) }}" alt="Crypto News Banner">
                </div>
                <div class="form-group">
                    <i class="fas fa-pencil-alt"></i>
                    <label class="link-label" for="link">Image Link:</label>
                    <input type="text" name="link" class="form-control" value="{{ $row[0]->link }}" id="link" placeholder="Link" required>
                </div>
                <div class="form-group">
                  <button class="btn btn-success upload" type="submit">Upload Banner</button>
                </div>
                <div class="alert success alert-primary">New banner is online!</div>
                <div class="alert error alert-danger">unfortunatly the process failed, please try again later...</div>
            </form>
        </div>
        <!-- /.container-fluid -->
    </div>
  <!-- /.content-wrapper -->


@endsection

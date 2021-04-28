@extends('cms.master')

@section('content')

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  Add
                </li>
                <li class="breadcrumb-item active">Banners</li>
            </ol>
            <form class="form" action="{{ route('cms/store-banner') }}" enctype="multipart/form-data" method="POST">
                <div class="form-group select-wrapper">
                    <select name="location" class="form-control select banner" required>
                        <option value="" class="defalt-option">Select Location</option>
                        <option value="home_page_top">Homa Page Top (1920x200)</option>
                        <option value="home_page_bottom">Homa Page Bottom (1920x200)</option>
                        <option value="side_bar">Side Bar (536x411)</option>
                        <option value="inner_pages">Inner Pages (1920x200)</option>
                    </select>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="image-wrapper" class="form-group">
                    <i class="fas fa-images"></i>
                    <label>Image:</label><br>
                    <input type="file" id="image" name="image" required><br>
                    <img class="add banner-image" src="{{ asset('upload/kaak.png') }}" alt="Crypto News Banner">
                </div>
                <div class="form-group">
                    <i class="fas fa-pencil-alt"></i>
                    <label class="link-label" for="link">Image Link:</label>
                    <input type="text" name="link" class="form-control" id="link" placeholder="Link" required>
                </div>
                <div class="form-group">
                  <button class="btn btn-dark upload" type="submit">Upload Banner</button>
                </div>
                <div class="alert success alert-primary">New banner is online!</div>
                <div class="alert error alert-danger">unfortunatly the process failed, please try again later...</div>
            </form>
        </div>
        <!-- /.container-fluid -->
    </div>
  <!-- /.content-wrapper -->


@endsection

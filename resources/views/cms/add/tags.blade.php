@extends('cms.master')

@section('content')

    <div id="content-wrapper">
        <div class="container-fluid">
            {{-- Breadcrumbs --}}
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    Add
                </li>
                <li class="breadcrumb-item active">Tags</li>
            </ol>
            <form class="form" action="{{ route('cms/store-tag') }}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <i class="fas fa-pencil-alt"></i>
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Tag Nmae" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-dark upload" type="submit">Upload Tag</button>
                </div>
                <div class="alert success alert-primary">Tag is online!</div>
                <div class="alert error alert-danger">Unfortunately the process failed, please try again later...</div>
            </form>
        </div>
        {{-- /.container-fluid --}}
    </div>
    {{-- /.content-wrapper --}}
@endsection

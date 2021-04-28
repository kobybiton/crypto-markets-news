@extends('cms.master')

@section('content')
    @if(count($categories) > 0)
        <div id="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        Add
                    </li>
                    <li class="breadcrumb-item active">Article</li>
                </ol>
                <form class="form" action="{{ route('cms') }}" enctype="multipart/form-data" method="POST">
                    <div class="form-group select-wrapper">
                        <select name="category" class="form-control select">
                            @if(count($categories) > 0)
                                @foreach($categories as $category)
                                    <option value='[{ "name": "{{ $category->name }}", "id": "{{ $category->id }}" }]'>{{ $category->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <h3>Article</h3>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <i class="fas fa-images"></i>
                        <label>Image: (860x662)</label><br>
                        <input type="file" id="image" name="image" required><br>
                        <img class="add snippet-image" src="{{ asset('upload/kaak.png') }}" alt="Crypto News Image">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-pencil-alt"></i>
                        <label for="title">Title:</label>
                        <input maxlength="120" type="text" name="title" class="form-control" id="title" aria-describedby="Title" placeholder="Enter Title" required>
                        <div class="characters-left">Charachters Left: <span>120</span></div>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-pencil-alt"></i>
                        <label for="sub_title">Sub Title:</label>
                        <input maxlength="120" type="text" name="sub_title" class="form-control" id="sub_title" placeholder="Sub Title" required>
                        <div class="characters-left">Charachters Left: <span>120</span></div>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-pencil-alt"></i>
                        <label for="sub_title">Description:</label>
                        <input maxlength="120" type="text" name="description" class="form-control" id="description" placeholder="Description" required>
                        <div class="characters-left">Charachters Left: <span>120</span></div>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-pencil-alt"></i>
                        <label for="sub_title">Url:</label>
                        <input maxlength="120" type="text" name="url" class="form-control" id="url" placeholder="Url" required>
                        <div class="characters-left">Charachters Left: <span>120</span></div>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-pencil-alt"></i>
                        <label for="date">Date:</label>
                        <input maxlength="120" type="datetime-local" name="date" class="form-control" id="date" placeholder="Date">
                    </div>
                    <select name="author" class="form-control author">
                        <option value="Jonathan Ganor">Jonathan Ganor</option>
                        <option value="Zack">Zack</option>
                    </select>
                    <br>
                    <div class="form-group">
                        <i class="fas fa-pencil-alt"></i>
                        <label for="editordata">Article:</label>
                        <textarea name="editordata" id="editor"></textarea>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-dark upload" type="submit">Upload News</button>
                    </div>
                    <div class="alert success alert-primary">New article is online!</div>
                    <div class="alert error alert-danger"></div>
                </form>
            </div>
            <!-- /.container-fluid -->
        </div>
    @else
        <div class="unavailable-data">You need at list one Category in order to upload your article!</div>
    @endif
  <!-- /.content-wrapper -->


@endsection

@extends('cms.master')

@section('content')

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    Update
                </li>
                <li class="breadcrumb-item active">{{ $article['category_name'] }}</li>
            </ol>
            <form class="form" name="form" action="{{ route('cms') }}" enctype="multipart/form-data" method="POST">
                <div class="form-group select-wrapper">
                    <select name="category" class="form-control select">
                        <option value='[{ "name": "{{ $article['category_name'] }}", "id": "{{ $article['category_id'] }}" }]'>{{ $article['category_name'] }}</option>
                        @if(count($categories) > 0)
                            @foreach($categories as $category)
                                <option value='[{ "name": "{{ $category->name }}", "id": "{{ $category->id }}" }]'>{{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <h3>Article</h3>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $article['id'] }}">
                <div class="form-group">
                    <i class="fas fa-images"></i>
                    <label>Image: (861x660)</label><br>
                    <input type="file" id="image" name="image"><br>
                    <img class="snippet-image" src="{{ asset('upload/'. $article['image']) }}" alt="Crypto News Image">
                </div>
                <div class="form-group">
                    <i class="fas fa-pencil-alt"></i>
                    <label for="title">Title:</label>
                    <input maxlength="120" type="text" value="{{ $article['title'] }}" name="title" class="form-control" id="title" aria-describedby="Title" placeholder="Enter Title" required>
                    <div class="title characters-left">Charachters Left: <span>120</span></div>
                </div>
                <div class="form-group">
                    <i class="fas fa-pencil-alt"></i>
                    <label for="sub_title">Sub Title:</label>
                    <input maxlength="120" type="text" value="{{ $article['sub_title'] }}" name="sub_title" class="form-control" id="sub_title" placeholder="Sub Title" required>
                    <div class="sub-title characters-left">Charachters Left: <span>120</span></div>
                </div>
                <div class="form-group">
                    <i class="fas fa-pencil-alt"></i>
                    <label for="sub_title">Description:</label>
                    <input maxlength="120" type="text" value="{{ $article['description'] ? $article['description'] :  $article['sub_title']}}" name="description" class="form-control" id="description" placeholder="Description" required>
                    <div class="characters-left">Charachters Left: <span>120</span></div>
                </div>
                <div class="form-group">
                    <i class="fas fa-pencil-alt"></i>
                    <label for="sub_title">Url:</label>
                    <input maxlength="120" type="text" value="{{ $article['url'] }}" name="url" class="form-control" id="url" placeholder="Url" required>
                    <div class="characters-left">Charachters Left: <span>120</span></div>
                </div>
                <div class="form-group">
                    <i class="fas fa-pencil-alt"></i>
                    <label for="date">Date:</label>
                    <input maxlength="120" type="datetime-local" name="date" class="form-control" id="date" placeholder="Date">
                </div>
                <select name="author" class="form-control author">
                    <option value="Jonathan Ganor">{{ $article['author'] }}</option>
                </select>
                <div class="form-group">
                    <i class="fas fa-pencil-alt"></i>
                    <label for="editordata">Article:</label>
                    <textarea name="editordata" id="editor">{{ $article['editordata'] }}</textarea>
                </div>
                <div class="form-group">
                  <button class="btn btn-success upload" type="submit">Update News</button>
                </div>
                <div class="alert success alert-primary">Article is updated!</div>
                <div class="alert error alert-danger"></div>
            </form>
        </div>
        <!-- /.container-fluid -->
    </div>
  <!-- /.content-wrapper -->


@endsection

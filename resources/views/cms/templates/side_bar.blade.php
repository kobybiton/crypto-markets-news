<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('cms') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>Market News</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Add:</h6>
            <a class="dropdown-item" href="{{ url('cms') }}">Articles</a>
            <a class="dropdown-item" href="{{ url('cms/category-form') }}">Categories</a>
            <a class="dropdown-item" href="{{ url('cms/tag-form') }}">Tags</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Moderator:</h6>
            <a class="dropdown-item" href="{{ url('cms/comments') }}">Comments</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Views:</h6>
            <a class="dropdown-item" href="{{ url('cms/articles') }}">Articles</a>
            <a class="dropdown-item" href="{{ url('cms/categories') }}">Categories</a>
            <a class="dropdown-item" href="{{ url('cms/banners') }}">Banners</a>
            <a class="dropdown-item" href="{{ url('cms/tags') }}">Tags</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Archived:</h6>
            <a class="dropdown-item" href="{{ url('cms/archived-articles') }}">Articles</a>
            <a class="dropdown-item" href="{{ url('cms/archived-categories') }}">Categories</a>
            <a class="dropdown-item" href="{{ url('cms/archived-banners') }}">Banners</a>
            <a class="dropdown-item" href="{{ url('cms/archived-tags') }}">Tags</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Pages:</h6>
            <a class="dropdown-item" target="_blank" href="{{ url('/') }}">Home</a>
            @foreach($categories as $category)
                <a class="dropdown-item" target="_blank" href="{{ url($category->url) }}">{{ $category->name }}</a>
            @endforeach
        </div>
    </li>
</ul>

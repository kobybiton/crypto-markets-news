@extends('inner_pages.master')
@section('dinamic_content')

    @if(is_object($category))
        @section('title')
            <title>{{ $category->name }}</title>
        @endsection
    @endif

    <div class="heading-divider offset-top-0">
      @if(is_object($category))
        <h2>{{ $category->name }}</h2>
      @endif
    </div>
    @if(is_object($articles) || is_array($articles))
        @if(count($articles) > 0)
          <div id="articles">
              @foreach($articles as $article)
                <div class="post post-variant-2">
                  <div class="unit unit-xl-horizontal text-sm-left unit-sm-horizontal unit-md-horizontal unit-lg-horizontal">
                    <div class="unit-left">
                      <div class="post-inner">
                        <div class="reveal-inline-block"><img class="post-image" src="{{ asset('upload/article/'. $article['image']) }}" width="150" height="115" alt=""/></div>
                      </div>
                    </div>
                    <div class="unit-body">
                      <div class="h5 text-bold"><a class="post-link" href="{{ $category->url .'/'. $article['url'] .'/'. $article['id'] }}">{{ $article['title'] }}</a></div>
                      <p>{{ $article['sub_title'] }}</p>
                      <div class="post-meta post-meta-hidden-outer">
                        <div class="post-meta-hidden">
                          <div class="icon text-gray icon-lg material-icons-share">
                            <ul>
                              <li><a class="icon fa fa-facebook" href="#"></a></li>
                              <li><a class="icon fa fa-twitter" href="#"></a></li>
                              <li><a class="icon fa fa-google-plus" href="#"></a></li>
                              <li><a class="icon fa fa-linkedin" href="#"></a></li>
                              <li><a class="icon fa fa-pinterest" href="#"></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="element-groups-custom">
                            <span class="post-meta-author">
                                {{ $article['author'] }}
                            </span>
                            <span class="post-meta-time">
                                <time datetime="2016-06-06">{{ $article['date'] }}</time>
                            </span>
                            <i class="fa fa-eye" aria-hidden="true"></i><span>{{ $article['views'] }} views</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="divider divider-dashed"></div>
              @endforeach
          </div>
      @else
          <div>{{ $category->name }} coming soon...</div>
      @endif
    @else
        <div class="unavailable-data">{{ $category }} is not a valid url...</div>
    @endif

@endsection

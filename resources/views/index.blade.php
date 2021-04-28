@extends('layout')
@section('content')

  <section class="section-top-50">
    <div class="shell">
      <div class="range">
        <div class="cell-lg-6">
          <div class="offset-lg-negative-right-26">
              @if(!empty($latest_main_news))
                @if(is_object($latest_main_news) || is_array($latest_main_news))
                    <div class="post post-variant-1">
                      <div class="post-inner"><img class="img-responsive post-image" src="{{ asset('upload/article/'. $latest_main_news->image) }}" width="880" height="662" alt=""/>
                        <div class="post-caption">
                          <ul>
                            <li><a href="{{ url($latest_main_news->category_name) }}"><span class="label label-warning">{{ $latest_main_news->category_name }}</span></a></li>
                          </ul>
                          <div>
                            <div class="h1"><a href="{{ url($latest_main_news->category_url . '/' . $latest_main_news->url . '/' . $latest_main_news->id) }}">{{ $latest_main_news->title }}</a></div>
                            <div class="post-meta post-meta-hidden-outer">
                              <div class="post-meta-time">
                                <time datetime="2016-06-06">{{ $latest_main_news->date }}</time>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif
              @endif
          </div>
        </div>
          @if(is_object($latest_news) || is_array($latest_news))
              @if(count($latest_news) > 0)
                <div class="cell-lg-6 offset-top-12 offset-lg-top-0 offset-lg-negative-left-26">
                  <div class="range">
                    <div class="cell-sm-6">
                      <div class="offset-lg-negative-right-38 offset-sm-negative-right-23">
                        @if(!empty($latest_news[0]))
                            <div class="post post-variant-1">
                              <div class="post-inner">
                                <img class="img-responsive post-image" src="{{ asset('upload/top_news/'. $latest_news[0]->image) }}" width="426" height="327" alt=""/>
                                <div class="post-caption">
                                  <ul>
                                    <li><a href="{{ url($latest_news[0]->category_url) }}"><span class="label label-warning">{{ $latest_news[0]->category_name }}</span></a></li>
                                  </ul>
                                  <div>
                                    <div class="h5"><a href="{{ url($latest_news[0]->category_url . '/' .$latest_news[0]->url . '/' . $latest_news[0]->id) }}">{{ $latest_news[0]->title }}</a></div>
                                    <div class="post-meta post-meta-hidden-outer">
                                      <div class="post-meta-time">
                                          <time datetime="2016-06-06">{{ $latest_news[0]->date }}</time>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        @endif
                        @if(!empty($latest_news[1]))
                            <div class="post post-variant-1">
                              <div class="post-inner">
                                  <img class="img-responsive post-image" src="{{ asset('upload/top_news/'. $latest_news[1]->image) }}" width="426" height="327" alt=""/>
                                  <div class="post-caption">
                                      <ul>
                                          <li><a href="{{ url($latest_news[1]->category_url) }}"><span class="label label-warning">{{ $latest_news[1]->category_name }}</span></a></li>
                                      </ul>
                                      <div>
                                          <div class="h5"><a href="{{ url($latest_news[1]->category_url . '/' .$latest_news[1]->url  . '/' . $latest_news[1]->id) }}">{{ $latest_news[1]->title }}</a></div>
                                          <div class="post-meta post-meta-hidden-outer">
                                              <div class="post-meta-time">
                                                  <time datetime="2016-06-06">{{ $latest_news[1]->date }}</time>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        @endif
                      </div>
                    </div>
                    <div class="cell-sm-6 offset-top-12 offset-sm-top-0">
                      <div class="offset-lg-negative-left-14 offset-lg-negative-right-24 offset-sm-negative-left-23">
                          @if(!empty($latest_news[2]))
                              <div class="post post-variant-1">
                                  <div class="post-inner">
                                      <img class="img-responsive post-image" src="{{ asset('upload/top_news/'. $latest_news[2]->image) }}" width="426" height="327" alt=""/>
                                      <div class="post-caption">
                                          <ul>
                                              <li><a href="{{ url($latest_news[2]->category_url) }}"><span class="label label-warning">{{ $latest_news[2]->category_name }}</span></a></li>
                                          </ul>
                                          <div>
                                              <div class="h5"><a href="{{ url($latest_news[2]->category_url . '/' .$latest_news[2]->url . '/' . $latest_news[2]->id) }}">{{ $latest_news[2]->title }}</a></div>
                                              <div class="post-meta post-meta-hidden-outer">
                                                  <div class="post-meta-time">
                                                      <time datetime="2016-06-06">{{ $latest_news[2]->date }}</time>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @endif
                          @if(!empty($latest_news[3]))
                              <div class="post post-variant-1">
                                  <div class="post-inner">
                                      <img class="img-responsive post-image" src="{{ asset('upload/top_news/'. $latest_news[3]->image) }}" width="426" height="327" alt=""/>
                                      <div class="post-caption">
                                          <ul>
                                              <li><a href="{{ url($latest_news[3]->category_url) }}"><span class="label label-warning">{{ $latest_news[3]->category_name }}</span></a></li>
                                          </ul>
                                          <div>
                                              <div class="h5"><a href="{{ url($latest_news[3]->category_url . '/' .$latest_news[3]->url . '/' . $latest_news[3]->id) }}">{{ $latest_news[3]->title }}</a></div>
                                              <div class="post-meta post-meta-hidden-outer">
                                                  <div class="post-meta-time">
                                                      <time datetime="2016-06-06">{{ $latest_news[3]->date }}</time>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @endif
                      </div>
                    </div>
                  </div>
                </div>
              @endif
          @endif
      </div>
    </div>
  </section>
  <section class="section-top-26">
    <div class="shell">
      <div class="range text-md-left">
        <div class="cell-lg-8">
          @if(is_array($home_page_top_banner) || is_object($side_bar_banner) && count($home_page_top_banner) > 0)
              <a target="_blank" href="{{ $home_page_top_banner[0]->link }}">
                <img class="post-image" src="{{ asset('upload/banners/' . $home_page_top_banner[0]->image) }}" alt="Banner"/>
              </a>
          @endif
          @if(is_object($latest_news) || is_array($latest_news))
              @if(count($latest_news) > 0)
                  <div class="heading-divider">
                    <h2>Latest news</h2>
                  </div>
                  <div class="range offset-top-0">
                    <div class="text-sm-left cell-xs-preffix-1 cell-xs-10 cell-sm-6 cell-sm-preffix-0 cell-md-4 offset-top-20 offset-sm-top-0">
                        @if(!empty($latest_news[4]))
                          <div class="post post-variant-3">
                            <div class="post-inner"><img class="post-image" src="{{ asset('upload/latest_news/'. $latest_news[4]->image) }}" alt=""/>
                              <div class="post-caption">
                                <ul>
                                  <li><a href="{{ url($latest_news[4]->category_url) }}"><span class="label label-warning">{{ $latest_news[4]->category_name }}</span></a></li>
                                </ul>
                              </div>
                            </div>
                            <div class="h5 text-bold"><a class="post-link" href="{{ url($latest_news[4]->category_url . '/' .$latest_news[4]->url . '/' . $latest_news[4]->id) }}">{{ $latest_news[4]->title }}</a></div>
                            <div class="post-meta post-meta-hidden-outer">
                                <div class="post-meta-time">
                                    <time datetime="2016-06-06">{{ $latest_news[4]->date }}</time>
                                </div>
                            </div>
                          </div>
                        @endif
                    </div>
                    <div class="text-sm-left cell-xs-preffix-1 cell-xs-10 cell-sm-6 cell-sm-preffix-0 cell-md-4 offset-top-45 offset-sm-top-0">
                        @if(!empty($latest_news[5]))
                            <div class="post post-variant-3">
                                <div class="post-inner"><img class="post-image" src="{{ asset('upload/latest_news/'. $latest_news[5]->image) }}" alt=""/>
                                    <div class="post-caption">
                                        <ul>
                                            <li><a href="{{ url($latest_news[5]->category_url) }}"><span class="label label-warning">{{ $latest_news[5]->category_name }}</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="h5 text-bold"><a class="post-link" href="{{ url($latest_news[5]->category_url . '/' .$latest_news[5]->url . '/' . $latest_news[5]->id) }}">{{ $latest_news[5]->title }}</a></div>
                                <div class="post-meta post-meta-hidden-outer">
                                    <div class="post-meta-time">
                                        <time datetime="2016-06-06">{{ $latest_news[5]->date }}</time>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="text-sm-left cell-xs-preffix-1 cell-xs-10 cell-sm-6 cell-sm-preffix-0 cell-md-4 offset-top-45 offset-md-top-0">
                        @if(!empty($latest_news[6]))
                            <div class="post post-variant-3">
                                <div class="post-inner"><img class="post-image" src="{{ asset('upload/latest_news/'. $latest_news[6]->image) }}" alt=""/>
                                    <div class="post-caption">
                                        <ul>
                                            <li><a href="{{ url($latest_news[6]->category_url) }}"><span class="label label-warning">{{ $latest_news[6]->category_name }}</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="h5 text-bold"><a class="post-link" href="{{ url($latest_news[6]->category_url . '/' .$latest_news[6]->url . '/' . $latest_news[6]->id) }}">{{ $latest_news[6]->title }}</a></div>
                                <div class="post-meta post-meta-hidden-outer">
                                    <div class="post-meta-time">
                                        <time datetime="2016-06-06">{{ $latest_news[6]->date }}</time>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="cell-xl-12 veil reveal-md-block offset-top-0">
                      <hr class="divider divider-dashed offset-top-20">
                      <div class="hidden"></div>
                    </div>
                    <div class="text-sm-left cell-xs-preffix-1 cell-xs-10 cell-sm-6 cell-sm-preffix-0 cell-md-4 offset-top-45 offset-md-top-0">
                        @if(!empty($latest_news[7]))
                            <div class="post post-variant-3">
                                <div class="post-inner"><img class="post-image" src="{{ asset('upload/latest_news/'. $latest_news[7]->image) }}" alt=""/>
                                    <div class="post-caption">
                                        <ul>
                                            <li><a href="{{ url($latest_news[7]->category_url) }}"><span class="label label-warning">{{ $latest_news[7]->category_name }}</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="h5 text-bold"><a class="post-link" href="{{ url($latest_news[7]->category_url . '/' .$latest_news[7]->url . '/' . $latest_news[7]->id) }}">{{ $latest_news[7]->title }}</a></div>
                                <div class="post-meta post-meta-hidden-outer">
                                    <div class="post-meta-time">
                                        <time datetime="2016-06-06">{{ $latest_news[7]->date }}</time>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="text-sm-left cell-xs-preffix-1 cell-xs-10 cell-sm-6 cell-sm-preffix-0 cell-md-4 offset-top-45 offset-md-top-0">
                        @if(!empty($latest_news[8]))
                            <div class="post post-variant-3">
                                <div class="post-inner"><img class="post-image" src="{{ asset('upload/latest_news/'. $latest_news[8]->image) }}" alt=""/>
                                    <div class="post-caption">
                                        <ul>
                                            <li><a href="{{ url($latest_news[8]->category_url) }}"><span class="label label-warning">{{ $latest_news[8]->category_name }}</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="h5 text-bold"><a class="post-link" href="{{ url($latest_news[8]->category_url . '/' .$latest_news[8]->url . '/' . $latest_news[8]->id) }}">{{ $latest_news[8]->title }}</a></div>
                                <div class="post-meta post-meta-hidden-outer">
                                    <div class="post-meta-time">
                                        <time datetime="2016-06-06">{{ $latest_news[8]->date }}</time>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="text-sm-left cell-xs-preffix-1 cell-xs-10 cell-sm-6 cell-sm-preffix-0 cell-md-4 offset-top-45 offset-md-top-0">
                        @if(!empty($latest_news[9]))
                            <div class="post post-variant-3">
                                <div class="post-inner"><img class="post-image" src="{{ asset('upload/latest_news/'. $latest_news[9]->image) }}" alt=""/>
                                    <div class="post-caption">
                                        <ul>
                                            <li><a href="{{ url($latest_news[9]->category_url) }}"><span class="label label-warning">{{ $latest_news[9]->category_name }}</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="h5 text-bold"><a class="post-link" href="{{ url($latest_news[9]->category_url . '/' .$latest_news[9]->url . '/' . $latest_news[9]->id) }}">{{ $latest_news[9]->title }}</a></div>
                                <div class="post-meta post-meta-hidden-outer">
                                    <div class="post-meta-time">
                                        <time datetime="2016-06-06">{{ $latest_news[9]->date }}</time>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                  </div>
              @endif
          @endif
          <div class="heading-divider">
            <h2>Coin Of The Day</h2>
          </div>
          <div class="responsive-tabs responsive-tabs-variant-2">
            <div class="coin-of-the-day">
              @include('components.coin_of_the_day')
            </div>
            @if(is_array($home_page_bottom_banner) || is_object($home_page_bottom_banner) && count($home_page_bottom_banner) > 0)
                <a target="_blank" href="{{ $home_page_bottom_banner[0]->link }}">
                  <img class="post-image" src="{{ asset('upload/banners/' . $home_page_bottom_banner[0]->image) }}" alt="Banner"/>
                </a>
            @endif
          </div>
          <div class="heading-divider">
            <h2>Market Cap</h2>
          </div>
          <div class="responsive-tabs responsive-tabs-variant-2">
            <div class="market-cap">
                @include('components.market_cap')
            </div>
          </div>
        </div>
        @include('components.sidebar')
      </div>
    </div>
  </section>
  <div class="snackbars" id="form-output-global"></div>

@endsection



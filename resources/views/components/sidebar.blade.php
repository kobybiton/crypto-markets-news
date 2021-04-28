<aside class="cell-lg-4 offset-top-36">
    <div class="range">
        <div class="cell-sm-8 cell-sm-preffix-2 cell-lg-12 cell-lg-preffix-0 cell-xs-push-7 cell-lg-push-2 text-center text-lg-left">
            <div class="bg-gray-light section-top-15 section-bottom-30 inset-p-left-6 inset-p-right-6 offset-top-45 offset-xl-top-60">
                <h3 class="heading-italic text-light">Follow us</h3>
                <p class="small">Get news directly in your feed</p>
                <div class="sharethis-inline-follow-buttons sidebar"></div>
                <hr class="divider divider-dashed">
                <h3 class="heading-italic text-light">Get latest news delivered daily!</h3>
                <p class="small">Get the hottest news in your inbox</p>
                @include('components.delivery_mail')
            </div>
        </div>
        <div class="cell-xs-12 cell-xs-push-2 cell-lg-push-4 offset-top-45">
            <div class="heading-divider">
                <h3 class="heading-italic text-light">Hottest Stories</h3>
            </div>
            <div class="range offset-top-45">
                <div class="cell-sm-6 cell-lg-12">
                    @if(is_object($most_views_articles) || is_array($most_views_articles))
                        @if(count($most_views_articles) > 0)
                            @foreach($most_views_articles as $most_views_article)
                                <div class="post post-variant-1">
                                    <div class="post-inner">
                                        <img class="img-responsive post-image" src="{{ asset('upload/hottest_news/' . $most_views_article->image) }}" width="536" height="411" alt="">
                                        <div class="post-caption">
                                            <ul>
                                                <li><a href="{{ url($most_views_article->category_url) }}"><span class="label label-warning">{{ $most_views_article->category_name }}</span></a></li>
                                            </ul>
                                            <div>
                                                <div class="h4 text-normal font-accent-2"><a href="{{ url($most_views_article->category_url .'/'. $most_views_article->url) .'/'. $most_views_article->id }}">{{ $most_views_article->title }}</a></div>
                                                <div class="post-meta post-meta-hidden-outer">
                                                    <div class="element-groups-custom veil reveal-md-block">
                                                        <span class="post-meta-author">
                                                            {{ $most_views_article->author }}
                                                        </span>
                                                        <span class="post-meta-time">
                                                            <time datetime="2016-06-06">{{ $most_views_article->date }}</time>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="divider divider-dashed">
                            @endforeach
                        @endif
                    @endif
                </div>
                <div class="cell-sm-6 cell-lg-12 offset-lg-top-30">
                    <div class="post post-variant-1">
                        <div class="post-inner">
                            @if(is_array($side_bar_banner) || is_object($side_bar_banner) && count($side_bar_banner) > 0)
                                <a target="_blank" href="{{ $side_bar_banner[0]->link }}">
                                    <img class="post-image" src="{{ asset('upload/banners/' . $side_bar_banner[0]->image) }}" alt="Banner"/>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--        <div class="cell-xs-12 cell-xs-push-5 cell-lg-push-6 offset-top-36">
            <div class="range text-sm-left">
                <div class="cell-sm-6 cell-lg-12 offset-top-36 offset-sm-top-0 offset-lg-top-36">
                    <div class="heading-divider">
                        <h3 class="heading-italic text-light">Like Us On Facebook</h3>
                    </div>
                    <div id="fb-root">
                        <div class="fb-root fb-widget">
                            <div class="fb-page-responsive">
                                <div class="fb-page" data-href="https://www.facebook.com/Crypto-Markets-News-2148614182135232" data-tabs="timeline" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                    <div class="fb-xfbml-parse-ignore">
                                        <blockquote cite="https://www.facebook.com/Crypto-Markets-News-2148614182135232"><a href="https://www.facebook.com/Crypto-Markets-News-2148614182135232">Crypto Markets News</a></blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="heading-divider">
                        <h3 class="heading-italic text-light">Follow Us On Twitter</h3>
                    </div>
                    <div id="tw-root" style="height: 500px; overflow-y: scroll">
                        <div class="fb-root fb-widget">
                            <div class="fb-page-responsive">
                                <a class="twitter-timeline" href="https://twitter.com/CryptoMarketsN?ref_src=twsrc%5Etfw">Tweets by CryptoMarketsN</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>
                        </div>
                    </div>
                    <div class="heading-divider">
                        <h3 class="heading-italic text-light">Calendar</h3>
                    </div>
                    <div class="rd-calendar">
                        <div class="rdc-table">
                            <div class="rdc-panel text-center bg-gray-base context-dark">
                                <div class="h5">
                                    <div class="rdc-month reveal-inline-block"></div><span>  </span>
                                    <div class="rdc-fullyear reveal-inline-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="reveal-flex range-xs-justify"><a class="rdc-prev"></a><a class="rdc-next"></a></div>
                    </div>
                </div>
            </div>
        </div>--}}
    </div>
</aside>



@extends('inner_pages.master')
@section('dinamic_content')

    @if(is_object($article) || is_array($article))
        @section('title')
            <title>{{ $article['title'] }}</title>
        @endsection
    @endif

    @if(is_object($article) || is_array($article))
        @if(count($article) > 0)
            <div class="sharethis-inline-share-buttons"></div>
            <div class="range range-lg-reverse">
                <div class="cell-lg-11">
                    <div class="post post-default post-variant-3">
                        <div class="text-left"><a href="{{ url($category_url) }}"><span class="label label-warning">{{ $category_url }}</span></a></div>
                        <div class="offset-top-12">
                            <div class="h1 text-gray-base">{{ $article['title'] }}</div>
                            <div class="post-meta element-groups-custom offset-top-12">
                                <span class="post-meta-author">{{ $article['author'] }}</span>
                                <span class="post-meta-time">
                                    <time datetime="2016-06-06">{{ $article['date'] }}</time>
                                </span>
                                @php($response = count($comments) > 0 ? count($comments) === 1 ? count($comments) . ' Comment' : count($comments) . ' Comments': 'Be the first to response!')
                                <span class="post-meta-comment responses">{{ $response }}</span>
                                <i class="fa fa-eye" aria-hidden="true"></i><span>{{ $article['views'] }} views</span>
                            </div>
                        </div>
                        <img class="offset-top-12" src="{{ asset('upload/article/'. $article['image']) }}" width="860" alt="{{ $article['title'] }}">
                        <h2 class="text-medium">{{ $article['sub_title'] }}</h2>
                        <p class="text-italic text-light">{!! $article['editordata'] !!}</p>
                    </div>
                    <div class="bg-gray-base context-dark section-30 inset-left-30 inset-right-30 text-sm-left offset-top-15">
                        <div class="unit unit-sm-horizontal unit-md-horizontal unit-lg-horizontal unit-xl-horizontal">
                            <div class="unit-left">
                                <img class="post-image max-width-none" src="{{ asset('images/john.jpg') }}" width="150" height="150" alt="">
                            </div>
                            <div class="unit-body">
                                <h3 class="heading-italic text-light offset-sm-top-28">Written by {{ $article['author'] }}</h3>
                                <p>Writer & cryptocurrency aficionado</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="heading-divider" id="comments">
                @php($response = count($comments) > 0 ? count($comments) === 1 ? count($comments) . ' Comment' : count($comments) . ' Comments': 'Be the first to response!')
                <h3 class="heading-italic text-light responses">{{ $response }}</h3>
            </div>
            <div class="comments text-sm-left">
                @if(is_object($comments) || is_array($comments))
                    @if(count($comments) > 0)
                        @foreach($comments as $comment)
                            <div class="unit unit-sm-horizontal unit-md-horizontal unit-lg-horizontal unit-xl-horizontal">
                                <div class="unit-body">
                                    <div class="range range-xs-justify text-xs-left">
                                        <div class="col-sm-8">
                                            <ul class="list-inline-md font-accent small text-italic">
                                                <li><i class="fa fa-user"></i><span class="text-primary"> {{ $comment->name }}</span></li>
                                                <li><span class="icon-time text-primary">{{ $comment->created_at }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p>{{ $comment->message }}</p>
                                </div>
                            </div>
                            <div class="divider divider-dashed"></div>
                        @endforeach
                    @endif
                @endif
            </div>
            <div class="heading-divider" id="reply">
                <h3 class="heading-italic text-light">Leave a Reply</h3>
            </div>
            <p class="text-light text-italic"></p>Your email address will not be published. Required fields are marked<span class="text-primary">*</span>
            <form id="comment_form" class="rd-mailform rd-mailform-gray-light-skin offset-top-30 form" data-result-class="rd-mailform-validate" data-form-type="contact" method="post" action="{{ url('store-comment') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="article_id" value="{{ $article['id'] }}">
                <input type="hidden" name="status_action" value="2">
                <input type="hidden" name="status" value="new!">
                <input type="text" name="name" data-constraints="@NotEmpty" placeholder="Your name  *">
                <input type="text" name="email" data-constraints="@NotEmpty @Email" placeholder="Your e-mail *">
                <textarea name="message" data-constraints="@NotEmpty" placeholder="Comments  *"></textarea>
                <div class="offset-top-30 text-md-left">
                    <button class="btn btn-warning submit-comment">Submit Comment</button>
                </div>
                <div class="alert message alert-success"></div>
            </form>
        @else
            <div>{{ $article_url }} coming soon...</div>
        @endif
    @else
        <div class="unavailable-data">{{ $category_url }}/{{ $article_url }} is not a valid url...</div>
    @endif
    <div class="rd-mailform-validate"></div>
@endsection

@if(is_object($article) || is_array($article))
    @if(count($article) > 0)
        @section('meta')
            <link rel="image_src" href="{{ asset('upload/article/'. $article['image']) }}" />
            <meta name="title" content="{{ $article['title'] }}">
            <meta name="description" content="{{ $article['description'] != null ? $article['description'] : $article['sub_title'] }}">
            <meta name="twitter:url" content="https://twitter.com/CryptoMarketsN">
            <meta name="twitter:text:title" content="{{ $article['title'] }}">
            <meta name="twitter:description" content="{{ $article['description'] != null ? $article['description'] : $article['sub_title'] }}">
            <meta name="twitter:card" content="summary_large_image">
            <meta name="twitter:site" content="@Crypto_markets_news">
            <meta name="twitter:image" content="{{ asset('upload/article/'. $article['image']) }}">
            <meta name="twitter:creator" content="@Crypto_markets_news">
            <meta property="og:title" content="{{ $article['title'] }}" />
            <meta property="og:type" content="article">
            <meta property="og:description" content="{{ $article['description'] != null ? $article['description'] : $article['sub_title'] }}" />
            <meta property="og:url" content="{{ url($article['category_url'] . '/' .$article['url'] . '/' . $article['id']) }}" />
            <meta property="og:image" content="{{ asset('upload/article/'. $article['image']) }}" />
            <meta property="og:locale" content="en_US">
            <meta property="og:type" content="article">
            <meta property="article:section" content="Crypto article">
            <meta property="og:image:width" content="506">
            <meta property="og:image:height" content="253">
            <meta property="og:image:alt" content="crypto_article">
            @if(!is_null($article['old_id']))
                <link rel="canonical" href="{{ url('article/profile/' . $article['old_id']. '/' . $article['title']) }}" />
            @endif
        @endsection
    @endif
@endif

@push('script')

    <script>

        $('#comment_form .message').hide();

        $('#comment_form .submit-comment').on('click', function(e){
          $('#comment_form .message').text('Thanks!, your comment is waiting for approve').slideDown().delay(5000).slideUp(300);
/*            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON'
            });

            var options = {

                success: function(response){

                    if(response.status === 'success'){

                        $('input[type=text]').val('');
                        $('textarea').val('');
                        let commentResponse = response.all_comments_count > 0 ? response.all_comments_count === 1 ? response.all_comments_count + ' Comment' : response.all_comments_count + ' Comments': 'Be the first to response!';
                        $('.responses').text(commentResponse);

                        $('.comments').append(
                            `
                            <div class="unit unit-sm-horizontal unit-md-horizontal unit-lg-horizontal unit-xl-horizontal">
                                <div class="unit-body">
                                    <div class="range range-xs-justify text-xs-left">
                                        <div class="col-sm-8">
                                            <ul class="list-inline-md font-accent small text-italic">
                                                <li><i class="fa fa-user"></i><span class="text-primary"> ${response.data[0].name}</span></li>
                                                <li><span class="icon-time text-primary">${response.data[0].created_at}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p>${response.data[0].message}</p>
                                </div>
                            </div>
                            <div class="divider divider-dashed"></div>
                        `
                        )
                    }
                    else{
                        $('#comment_form .error-comment').text(response.message).slideDown().delay(5000).slideUp(300);
                    }
                },

                error: function(error){
                    $('#comment_form .error-comment').text(error.responseText).slideDown().delay(5000).slideUp(300);
                }
            };

            $(this).parents('#comment_form').ajaxForm(options);*/
        });

    </script>

@endpush

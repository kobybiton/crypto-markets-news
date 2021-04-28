<header class="page-head">
    <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fullwidth" data-lg-layout="rd-navbar-static" data-stick-up-offset="198" data-md-layout="rd-navbar-fullwidth">
            <div class="rd-navbar-inner">
                <div class="rd-navbar-panel">
                    <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                    <div class="rd-navbar-brand"><a class="brand-name" href="{{ url('/') }}"><span>Crypto Markets</span> news</a></div>
                </div>
                <div class="rd-navbar-nav-wrap">
                    <div class="rd-navbar-social-list">
                        <div class="sharethis-inline-follow-buttons"></div>
                    </div>
                    <ul class="rd-navbar-nav">
                        <li class="active"><a href="{{ url('/') }}">Home</a></li>
                        @if(count($categories) > 0)
                            @foreach($categories as $category)
                                <li><a href="{{ url($category->url) }}">{{ $category->name }}</a></li>
                            @endforeach
                        @endif
                        <li><a href="{{ url('/market-cap') }}">Market cap</a></li>
                        <li><a href="{{ url('/coin-info') }}">Coin info</a></li>
                        <li><a href="{{ url('/about-us') }}">About us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

@push('script')
    <script>

        $('.rd-navbar-nav a').each(function( index ) {

            if($(this).attr('href') === '{{ url()->current() }}'){
                $(this).parent().addClass('active');
            }
            else{
                $(this).parent().removeClass('active');
            }
        });

    </script>
@endpush

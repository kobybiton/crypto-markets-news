<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5de4dee06b360b0012066a24&product=inline-follow-buttons&cms=website' async='async'></script>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5de4dee06b360b0012066a24&product=inline-share-buttons&cms=website' async='async'></script>
    {{-- Global site tag (gtag.js) - Google Analytics --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134914320-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-134914320-2');
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.ico') }}"/>
    @if($__env->yieldContent('meta'))
        @yield('meta')
    @else
        <meta name="title" content="Crypto Markets News - Breaking Bitcoin & Altcoin News">
        <meta name="description" content="Breaking news on Bitcoin, Ethereum, Ripple and blockchain technology. Be the first to know what is happening with BTC, ETH, XRP and altcoins!">
    @endif
    @yield('title')
    {{-- Fonts --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,600" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-8223653861940812",
            enable_page_level_ads: true
        });
    </script>
    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '291654231759322');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=291654231759322&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
</head>
<body>

    <div class="container-fluid">
        <div class="page text-center">
            @include('components.header')
                <main class="page-content">
                    @yield('content')
                </main>
            @include('components.footer')
        </div>
    </div>

    <script type="text/javascript">var BaseUrl = '{{ url('/') }}';</script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/core.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- Begin Inspectlet Asynchronous Code -->
    <script type="text/javascript">
    (function() {
    window.__insp = window.__insp || [];
    __insp.push(['wid', 807721654]);
    var ldinsp = function(){
    if(typeof window.__inspld != "undefined") return; window.__inspld = 1; var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js?wid=807721654&r=' + Math.floor(new Date().getTime()/3600000); var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); };
    setTimeout(ldinsp, 0);
    })();
    </script>
    <!-- End Inspectlet Asynchronous Code -->
    @stack('script')

</body>
</html>

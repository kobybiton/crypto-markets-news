<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Cms - Dashboard</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css">
<link href="https://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon-96x96.png') }}"/>
<link rel="stylesheet" href="{{ asset('css/jtoggler.styles.css') }}">
<link rel="stylesheet" href="{{ asset('css/cms.css') }}">
</head>
<body id="page-top">
<main>
    <div id="cms_container">
        @include('cms.templates.header')
        <div id="wrapper">
            @include('cms.templates.side_bar')
            @yield('content')
        </div>
    </div>
</main>
<script type="text/javascript">var BaseUrl = '{{ url('/') }}';</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://malsup.github.io/jquery.form.js"></script>
<script type="text/javascript" src="{{ asset('js/sb-admin.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{ asset('js/jtoggler.js') }}"></script>
@stack('script')
<script type="text/javascript" src="{{ asset('js/cms.js') }}"></script>
</body>
</html>

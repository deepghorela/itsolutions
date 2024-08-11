
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @yield('head_start')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title', env('APP_NAME'))</title>
    <meta name="description" content="@yield('meta_description', env('META_DESCRIPTION'))">
    <meta name="keywords" content="@yield('meta_keywords', env('META_KEYWORDS'))">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <link href="//www.google-analytics.com" rel="dns-prefetch" >
    <link href="//graph.facebook.com" rel="dns-prefetch" >
    <link href="//csi.gstatic.com" rel="dns-prefetch" >
    <link href="//fonts.googleapis.com" rel="dns-prefetch" >
    <link href="//maps.googleapis.com" rel="dns-prefetch" >
    <link href="//maps.gstatic.com" rel="dns-prefetch" >
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}?v={{ env('CSS_VERSION') }}">
    @if(pageSpecificMediaExists($slug, 'css'))
    <link rel="stylesheet" href="{!! pageSpecificMediaExists($slug, 'css') !!}?v={{ env('CSS_VERSION') }}">
    @endif
    <link rel="icon" href="{!! asset('favicon.ico') !!}" type="image/x-icon">
    <meta property="og:image" content="@yield('meta_image', getLightLogoUrl())">
    @if(!empty(config('voyager.additional_css')))
        @foreach(config('voyager.additional_css') as $css)<link rel="stylesheet" type="text/css" href="{{ asset($css) }}">@endforeach
    @endif
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,700" rel="stylesheet">
    @yield('head_end')
</head>
<body class="{{ $slug }}">
    <div class="main-page-container">
        @include('common.header')
        @yield('body_start')
    </div>
    
    @yield('content')
    <footer class="site-footer bg-primary txt-white">
        @include('common.footer')
        @yield('body_end')
        <script async src="{!! asset('assets/js/bootstrap.min.js') !!}?v={{ env('JS_VERSION') }}"></script>
        @stack('post_js')
    </footer>
    @if(pageSpecificMediaExists($slug, 'js'))
    <script async src="{!! pageSpecificMediaExists($slug, 'js') !!}?v={{ env('JS_VERSION') }}"></script>
    @endif
</body>
</html>

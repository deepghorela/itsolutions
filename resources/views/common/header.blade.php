<header class="site-header txt-primary">
    <div class="nav-container">
        <div class="container">
            <div class="col-xs-12 col-md-3 main-logo">
                <a href="{!! url('/') !!}" title="{{ env('APP_NAME') }}" class="logo"><img class="imgWhite" src="{!! getLightLogoUrl() !!}" alt="{{ env('APP_NAME') }}"></a>
            </div>
            <div class="col-xs-12 col-md-9 text-right top-right-menu">
                <ul class="quickConnectMenu list-inline">
                    <li><span></span> Mon-Sat: <span class="text-number">09:00-18:00</span></li>
                    <li><span></span> <a href="tel:{!! setting('site.primary_contact_number') !!}" class="text-number">{!! setting('site.primary_contact_number') !!}</a></li>
                </ul>
                <div class="row text-right">
                    <div class="col-xs-12">
                        {!! $mainMenu !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
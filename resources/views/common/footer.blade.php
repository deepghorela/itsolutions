<div class="container">
    <div class="row seoSection">
        <div class="col-xs-12 seo-tag-list">
            <h3 class="footer-seo-heading">Categories</h3>
            <ul class="list-inline">
                @foreach(getSeoCategories() as $cat)
                    <li>{{ $cat }} |</li>
                @endforeach
            </ul>
        </div>
        <div class="col-xs-12 seo-tag-list">
            <h3 class="footer-seo-heading">Tags</h3>
            <ul class="list-inline">
                @foreach(getSeoTags() as $tag)
                    <li>{{ $tag }} |</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-3">
            <div class="footer-icon">
                <img class="imgWhite lazyloaded" src="{!! getLightLogoUrl() !!}" title="{{ env('APP_NAME') }}" alt="{{ env('APP_NAME') }}">
            </div>
            <p class="text-justify">Softech Technology delivers top-notch laptop and desktop repairs, rentals, and AMC in Gurgaon, offering hassle-free and dependable solutions.</p>
        </div>
        <div class="col-xs-12 col-md-3">
            <h3 class="footer-widget__title">Quick Links</h3>
            {!! $footerMenu !!}
        </div>
        <div class="col-xs-12 col-md-3 footer-contact-w3">
            <h3 class="footer-widget__title">Contact Info</h3>
            <ul class="list-unstyled">
                <li><p>U1/47, DLF Phase 3, Sector 24, Gurgaon, Haryana-IN</p></li>
                <li class="text-number"><a href="tel:{!! setting('site.primary_contact_number') !!}">{!! setting('site.primary_contact_number') !!}</a></li>
                <li>{!! setting('site.primary_email') !!}</li>
                @if(!empty(setting('site.gst_reg_number')))
                <li><strong>GSTIN</strong>: <span class="text-number">{!! setting('site.gst_reg_number') !!}</span></li>
                @endif
            </ul>
        </div>
        <div class="col-xs-12 col-md-3">
            <h3 class="footer-widget__title">Navigate to Us </h3>
            <iframe src="{!! env('GOOGLE_MAP_IFRAME_LINK') !!}" width="300" height="230" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
<div class="container copyright-section">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-xs-12 col-sm-4 text-left">{{ env('APP_NAME') }} &copy; {!! date("Y") == 2014 ? "2014" : "2014-".date("y") !!}. All rights reserved.</div>
        <div class="col-xs-12 col-sm-4 text-center">
            <ul class="list-inline list-unstyled footer-social">
                @if(!empty(setting('site.linkedin')))
                    <li>
                        <a href="{!! setting('site.linkedin') !!}" target="_blank" title="LinkedIn-{{ env('APP_NAME') }}"><div class="icon-block"><span class="ico icon-linkedin"></span></div></a>
                    </li>
                @endif
                @if(!empty(setting('site.facebook')))
                    <li>
                        <a href="{!! setting('site.facebook') !!}" target="_blank" title="Facebook-{{ env('APP_NAME') }}"><div class="icon-block"><span class="ico icon-facebook"></span></div></a>
                    </li>
                @endif
                @if(!empty(setting('site.twitter')))
                    <li>
                        <a href="{!! setting('site.twitter') !!}" target="_blank" title="Twitter-{{ env('APP_NAME') }}"><div class="icon-block"><span class="ico icon-twitter"></span></div></a>
                    </li>
                @endif
                @if(!empty(setting('site.instagram')))
                    <li>
                        <a href="{!! setting('site.instagram') !!}" target="_blank" title="Instagram-{{ env('APP_NAME') }}"><div class="icon-block"><span class="ico icon-instagram"></span></div></a>
                    </li>
                @endif
                @if(!empty(setting('site.youtube')))
                    <li>
                        <a href="{!! setting('site.youtube') !!}" target="_blank" title="YouTube-{{ env('APP_NAME') }}"><div class="icon-block"><span class="icon icon-youtube"></span></div></a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="col-xs-12 col-sm-4 text-right">Made with <span class="bg-red">&hearts;</span> by <a href="//www.sparrowbytes.com?utm_source=softech_it_solutions&utm_medium=footer" target="_blank" rel='noopener'>Sparrow Bytes</a></div>
    </div>
</div>
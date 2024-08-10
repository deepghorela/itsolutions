<script src="{!! url('/assets/js/jquery.min.js') !!}?v={{ env('JS_VERSION') }}" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if($slug == 'contact-us')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANn98-tSjlT04-HPHlVNcAIvA_TPEg9KU"></script>
    <script src="{!! url('/assets/js/map.js') !!}?v={{ env('JS_VERSION') }}"></script>
@elseif($slug == 'blogs')
    <script src="{!! url('/assets/js/blogs.js') !!}?v={{ env('JS_VERSION') }}"></script>
@endif
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-188849176-1"></script> --}}
<script async src="{!! url('/assets/js/common.js') !!}?v={{ env('JS_VERSION') }}"></script>
<script type="application/ld+json">{!! $schemaJson !!}</script>

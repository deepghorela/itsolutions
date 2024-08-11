<script src="{!! getAssetPath('assets/js/jquery.min.js') !!}"></script>
@if($slug == 'contact-us')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANn98-tSjlT04-HPHlVNcAIvA_TPEg9KU"></script>
    <script src="{!! getAssetPath('assets/js/map.js') !!}"></script>
@elseif($slug == 'blogs')
    <script async src="{!! getAssetPath('assets/js/blogs.js') !!}"></script>
@endif
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1WJSLMZCZW"></script>
<script async src="{!! getAssetPath('assets/js/common.js') !!}"></script>
<script type="application/ld+json">{!! $schemaJson !!}</script>

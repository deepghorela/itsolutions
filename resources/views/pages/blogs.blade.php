<div class="container-fluid">
    <div class="container main-container">
        @if($page->use_title_as_heading)
            <div class="col-xs-12 text-center">
                <h1 class="page-title-heading">{{ $heading }}</h1>
            </div>
        @endif
    </div>
</div>
<section>
    <div class="container">
        @foreach ($posts as $post)
            <div class="col-xs-12 col-sm-4 address-list blog-card" data-target="{!! url("blogs/".$post->slug) !!}">
                <div class="header">
                    <img src='{{ url("storage/"."$post->image") }}' alt="{{ $post->title }}" title="{{ $post->title }}">
                </div>
                <div class="blog-content">
                    <div class="pd0 title">
                        <h2>{{ $post->title }}</h2>
                        <div class="text-right posted-on"><small>Posted On: {!! date("d-M-Y", strtotime($post->date_published)) !!}</small></div>
                    </div>
                    {!! trucateContent($post->body) !!}
                </div>
            </div>
        @endforeach
        <div class="clearfix"></div>
        <div class="col-xs-12 text-right">
            {{ $posts->links() }}
        </div>
    </div>
</section>
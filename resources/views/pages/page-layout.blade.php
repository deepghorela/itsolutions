@extends('master')

@section('title', $title)
@section('meta_description', $meta_description)
@section('meta_keywords', $meta_keywords)

@section('content')
    @if(in_array($slug, array('home', 'blogs')))
        @include('pages.'.$slug)
    @else
        <section class="innerPages topHeader">
            <div class="bgBlur"></div>
            <div class="container">
                <div class="row">
                    @if($page->use_title_as_heading)
                        <div class="col-xs-12 text-center">
                            <h1 class="page-title-heading">{{ $heading }}</h1>
                            {!! generateBreadcrumb() !!}
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <div class="container-fluid">
            <div class="container main-container">
                <div class="main-container">
                    {!! filterInlineStyles($body); !!}
                </div>
                @if(file_exists( resource_path() .'/views/pages/'.$slug.".blade.php" ))
                    @include('pages.'.$slug)
                @endif
            </div>
        </div>
    @endif
@endsection

{{-- @if(in_array($slug, array('contact-us', 'blogs'))) --}}
@section('body_end')
    @include('common.footer.footer-scripts')
@endsection  
{{-- @endif --}}


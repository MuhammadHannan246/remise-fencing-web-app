<style>  @font-face {
    font-family: 'BURBANKBIGCONDENSED-BOLD';
    src: url({{ asset('public/assets/front-end/fonts/BURBANKBIGCONDENSED-BOLD.ttf')}});
  
}
@font-face {
    font-family: 'BURBANKBIGCONDENSED-BLACK';
    src: url({{ asset('public/assets/front-end/fonts/BURBANKBIGCONDENSED-BLACK.ttf')}});
  
}</style>

@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('About Us'))

@push('css_or_js')

    <meta property="og:image" content="{{asset('storage/app/public/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="og:title" content="About {{$web_config['name']->value}} "/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <meta property="twitter:card" content="{{asset('storage/app/public/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="twitter:title" content="about {{$web_config['name']->value}}"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{!! substr($web_config['about']->value,0,100) !!}">
@endpush

@section('content')
    <div class="container for-container rtl __inlini-51">
        <h2 class="text-center mt-3 headerTitle" style="font-family: 'BURBANKBIGCONDENSED-BOLD'; font-size:33.23px;">{{\App\CPU\translate('Who We Are')}}</h2>
        <div class="for-padding">
            {!! $about_us['value'] !!}
        </div>
    </div>
@endsection

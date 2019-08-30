@extends('home.app')

@section('title', $meta_tags['meta_title'])

@section('meta_title',  $meta_tags['meta_title'])

@section('meta_desc',  $meta_tags['meta_desc'])

@section('meta_keywords', $meta_tags['meta_keywords'])

@section('content')

<section class="service-area section-padding" id="service">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 col-sm-12 col-xs-12">
                    <div class="area-title text-center wow fadeIn">
                        <h2>{{($lang == 'ar') ? $getPageDetail['name_ar'] : $getPageDetail['name_en']}}</h2>
                        {!! ($lang == 'ar') ? $getPageDetail['content_ar']: $getPageDetail['content_en'] !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
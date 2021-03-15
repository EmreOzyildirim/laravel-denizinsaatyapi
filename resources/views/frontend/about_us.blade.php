@extends('frontend.layout.app')
@section('page_title','Hakkımızda - Deniz Gayrimenkul')
@section('og_tags')

@endsection
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section spad set-bg" data-setbg="/images/breadcrumbs/deniz-gayrimenkul-hakkimizda.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h4>Hakkımızda</h4>
                        <div class="bt-option">
                            <a href="/"><i class="fa fa-home"></i> Anasayfa</a>
                            <span>Hakkımızda</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- About Section Begin -->
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="at-title">
                            <h3>{{$about_us['title']}}</h3>
                            <p>{{$about_us['description']}}</p>
                        </div>
                        <div class="at-feature mt-5 pt-2">
                            @foreach($why_choose_us_icons as $icon_item)
                                <div class="af-item">
                                    <div class="af-icon">
                                        <img src="{{'/images/chooseus/'.$icon_item['icon_path']}}"
                                             alt="{{$icon_item['title']}}">
                                    </div>
                                    <div class="af-text">
                                        <h6>{{$icon_item['title']}}</h6>
                                        {{print_r($icon_item['description'])}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic set-bg" data-setbg="{{'/images/about-us/'.$about_us['content_side_image']}}">
                        <!---<a href="https://www.youtube.com/watch?v=8EJ3zbKTWQ8" class="play-btn video-popup">
                            <i class="fa fa-play-circle"></i>
                        </a>--->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->
@endsection

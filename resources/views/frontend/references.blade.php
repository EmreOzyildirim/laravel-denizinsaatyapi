@extends('.frontend.layout.app')
@section('head')

@endsection

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section spad set-bg" data-setbg="images/breadcrumbs/deniz-gayrimenkul-hakkimizda.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h4>Referanslarımız</h4>
                        <div class="bt-option">
                            <a href="/"><i class="fa fa-home"></i> Anasayfa</a>
                            <span>Referanslarımız</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-item-list">
                        @foreach($references['references'] as $reference)
                            <div class="blog-item"> <!--- large-blog for first item --->
                                <div class="bi-pic">
                                    <img src="{{asset('images/references/'.$reference['image'])}}"
                                         alt="{{$reference['title']}}">
                                </div>
                                <div class="bi-text">
                                    <h4>
                                        <a href="/referans-detay/{{$reference['id']}}">{{strlen($reference['title']) > 70 ? substr($reference['title'],0,70).'...':$reference['title']}}</a>
                                    </h4>
                                    <ul>
                                        <li>Yazar: <span>{{$reference['agent']}}</span></li>
                                        <li>{{$reference['created_at']}}</li>
                                    </ul>
                                    <p>{{strlen($reference['description']) > 270 ? substr($reference['description'],0,270).'...':$reference['description']}}</p>
                                    <a href="/referans-detay/{{$reference['id']}}" class="read-more">Devamını oku <span
                                            class="arrow_right"></span></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="property-pagination">
                        @foreach($references['pagination']['links'] as $page)
                            <a href="{{ $page['url'] }}">{{html_entity_decode($page['label'])}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <div class="follow-us">
                            <div class="section-title sidebar-title-b">
                                <h6>Takipte olun</h6>
                            </div>
                            <div class="fu-links">
                                <a href="{{$social_media_icons['facebook_url']}}"><i class="fa fa-facebook"></i></a>
                                <a href="{{$social_media_icons['twitter_url']}}" class="twitter"><i
                                        class="fa fa-twitter"></i></a>
                                <a href="{{$social_media_icons['youtube_url']}}" class="youtube"><i
                                        class="fa fa-youtube-play"></i></a>
                                <a href="{{$social_media_icons['instagram_url']}}" class="instagram"><i
                                        class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="feature-post">
                            <div class="section-title sidebar-title-b">
                                <h6>En Yeni Referanslar</h6>
                            </div>
                            <div class="recent-post">
                                @foreach($references['references'] as $reference)
                                    <div class="rp-item">
                                        <div class="rp-pic">
                                            <img src="{{asset('images/references/'.$reference['image'])}}"
                                                 alt="{{$reference['title']}}">
                                        </div>
                                        <div class="rp-text">
                                            <h6>
                                                <a href="/referans-detay/{{$reference['id']}}">{{strlen($reference['title']) > 50 ? substr($reference['title'],0,50).'...':$reference['title']}}</a>
                                            </h6>
                                            <span>Tarih: {{$reference['created_at']}}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection

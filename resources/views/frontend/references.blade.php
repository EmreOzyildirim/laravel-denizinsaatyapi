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
                        @foreach($references as $reference)
                            <div class="blog-item"> <!--- large-blog for first item --->
                                <div class="bi-pic">
                                    <img src="{{asset('images/references/'.$reference['image_path'])}}"
                                         alt="{{$reference['title']}}">
                                </div>
                                <div class="bi-text">
                                    <h4>
                                        <a href="/referans-detay/{{$reference['id']}}">{{strlen($reference['title']) > 70 ? substr($reference['title'],0,70).'...':$reference['title']}}</a>
                                    </h4>
                                    <ul>
                                        <li>Yazar: <span>{{$reference['agent_name_surname']}}</span></li>
                                        <li>{{$reference['created_at']}}</li>
                                    </ul>
                                    <p>{{strlen($reference['descriiption']) > 270 ? substr($reference['descriiption'],0,270).'...':$reference['descriiption']}}</p>
                                    <a href="/referans-detay/{{$reference['id']}}" class="read-more">Devamını oku <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="blog-pagination property-pagination ">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#" class="icon"><span class="arrow_right"></span></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <div class="follow-us">
                            <div class="section-title sidebar-title-b">
                                <h6>Takipte olun</h6>
                            </div>
                            <div class="fu-links">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a>
                                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="feature-post">
                            <div class="section-title sidebar-title-b">
                                <h6>Diğer Referanslarımız</h6>
                            </div>
                            <div class="recent-post">
                                <div class="rp-item">
                                    <div class="rp-pic">
                                        <img src="img/blog/rp-1.jpg" alt="">
                                    </div>
                                    <div class="rp-text">
                                        <h6><a href="#">Vancouver real estate advisurges conference goers...</a></h6>
                                        <span>Seb 24, 2019</span>
                                    </div>
                                </div>
                                <div class="rp-item">
                                    <div class="rp-pic">
                                        <img src="img/blog/rp-2.jpg" alt="">
                                    </div>
                                    <div class="rp-text">
                                        <h6><a href="#">Vancouver real estate advisurges conference goers...</a></h6>
                                        <span>Seb 24, 2019</span>
                                    </div>
                                </div>
                                <div class="rp-item">
                                    <div class="rp-pic">
                                        <img src="img/blog/rp-3.jpg" alt="">
                                    </div>
                                    <div class="rp-text">
                                        <h6><a href="#">Vancouver real estate advisurges conference goers...</a></h6>
                                        <span>Seb 24, 2019</span>
                                    </div>
                                </div>
                                <div class="rp-item">
                                    <div class="rp-pic">
                                        <img src="img/blog/rp-4.jpg" alt="">
                                    </div>
                                    <div class="rp-text">
                                        <h6><a href="#">Vancouver real estate advisurges conference goers...</a></h6>
                                        <span>Seb 24, 2019</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="subscribe-form">
                            <div class="section-title sidebar-title-b">
                                <h6>Üye ol</h6>
                            </div>
                            <p>Mail adresinizi bırakın, ilanlarımızdan önce siz haberdar olun.</p>
                            <form action="#">
                                <input type="text" placeholder="Email">
                                <button type="submit" class="site-btn">Katıl</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection

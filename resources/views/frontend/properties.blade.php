@extends('frontend.layout.app')
@section('page_title','Deniz Gayrimenkul')
@section('og_tags')

@endsection


@section('content')
    <!-- Property Details Section Begin -->
    <section class="property-details-section">
        <div class="property-pic-slider owl-carousel">
            <div class="ps-item">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12 p-0">
                                    <div class="ps-item-inner large-item set-bg"
                                         data-setbg="img/property/slider/ps-1.jpg"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-sm-6 p-0">
                                    <div class="ps-item-inner set-bg" data-setbg="img/property/slider/ps-2.jpg"></div>
                                </div>
                                <div class="col-sm-6 p-0">
                                    <div class="ps-item-inner set-bg" data-setbg="img/property/slider/ps-2.jpg"></div>
                                </div>
                                <div class="col-sm-6 p-0">
                                    <div class="ps-item-inner set-bg" data-setbg="img/property/slider/ps-4.jpg"></div>
                                </div>
                                <div class="col-sm-6 p-0">
                                    <div class="ps-item-inner set-bg" data-setbg="img/property/slider/ps-5.jpg"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-item">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12 p-0">
                                    <div class="ps-item-inner large-item set-bg"
                                         data-setbg="img/property/slider/ps-1.jpg"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-sm-6 p-0">
                                    <div class="ps-item-inner set-bg" data-setbg="img/property/slider/ps-2.jpg"></div>
                                </div>
                                <div class="col-sm-6 p-0">
                                    <div class="ps-item-inner set-bg" data-setbg="img/property/slider/ps-2.jpg"></div>
                                </div>
                                <div class="col-sm-6 p-0">
                                    <div class="ps-item-inner set-bg" data-setbg="img/property/slider/ps-4.jpg"></div>
                                </div>
                                <div class="col-sm-6 p-0">
                                    <div class="ps-item-inner set-bg" data-setbg="img/property/slider/ps-5.jpg"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="pd-text">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="pd-title">
                                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                                    <div class="label">For rent</div>
                                    <div class="pt-price">$ 289.0<span>/month</span></div>
                                    <h3>Home in Merrick Way</h3>
                                    <p><span class="icon_pin_alt"></span> 3 Middle Winchendon Rd, Rindge, NH 03463</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="pd-social">
                                    <a href="#"><i class="fa fa-mail-forward"></i></a>
                                    <a href="#"><i class="fa fa-send"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-mail-forward"></i></a>
                                    <a href="#"><i class="fa fa-cloud-download"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="pd-widget">
                            <h4>İlan Açıklaması</h4>
                            <p>Testo ilan açıklşaması</p>
                        </div>
                        <div class="pd-widget">
                            <h4>Ofisimize bekliyoruz</h4>
                            <div class="map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d735515.5813275519!2d-80.41163541934742!3d43.93644386501528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882a55bbf3de23d7%3A0x3ada5af229b47375!2sMono%2C%20ON%2C%20Canada!5e0!3m2!1sen!2sbd!4v1583262687289!5m2!1sen!2sbd"
                                    height="350" style="border:0;" allowfullscreen=""></iframe>
                            </div>
                        </div>
                        <div class="pd-widget">
                            <h4>İlanla İlgilenen Danışmanımız</h4>
                            <div class="pd-agent">
                                <div class="agent-pic">
                                    <img src="img/property/details/agent.jpg" alt="">
                                </div>
                                <div class="agent-text">
                                    <div class="at-title">
                                        <h6>Ashton Kutcher</h6>
                                        <span>Founder & CEO</span>
                                        <a href="#" class="primary-btn">VIew profile</a>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit, eiusmod tempor
                                        incididunt</p>
                                    <div class="at-option">
                                        <div class="at-number">123-455-688</div>
                                        <div class="at-social">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-envelope-o"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="pd-widget">
                            <h4>İletişim bilgilerinizi yollayın, size ulaşalım.</h4>
                            <form action="#" class="review-form">
                                <div class="group-input">
                                    <input type="text" placeholder="Adınız">
                                    <input type="text" placeholder="Telefon Numaranız">
                                    <input type="text" placeholder="Website (gerekli değil)">
                                </div>
                                <textarea placeholder="Mesajınız"></textarea>
                                <button type="submit" class="site-btn">Gönder!</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="property-sidebar">
                        <div class="single-sidebar">
                            <div class="section-title sidebar-title">
                                <h5>Danışmanlarımız</h5>
                            </div>
                            <div class="top-agent">
                                @foreach($agents as $agent)
                                    <div class="ta-item">
                                        <div class="ta-pic set-bg" data-setbg="{{'images/agents/'.$agent['profile_image']}}"></div>
                                        <div class="ta-text">
                                            <h6><a href="#">{{$agent['name_surname']}}</a></h6>
                                            <span>{{$agent['title']}}</span>
                                            <div class="ta-num">{{$agent['phone_number']}}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="single-sidebar slider-op">
                            <div class="section-title sidebar-title">
                                <h5>Kategoriler</h5>
                            </div>
                            <div class="sf-slider owl-carousel">
                                @foreach($categories as $category)
                                    <div class="sf-item set-bg" data-setbg="{{'images/categories/'.$category['image_path']}}">
                                        <div class="sf-text">
                                            <h5>{{$category['name']}}</h5>
                                            <span>38 property</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="single-sidebar">
                            <div class="section-title sidebar-title">
                                <h5>Kredi Hesaplayıcı</h5>
                            </div>
                            <form action="#" class="calculator-form">
                                <div class="filter-input">
                                    <p>Taşınmaz Fiyatı</p>
                                    <input type="text" placeholder="₺">
                                </div>
                                <div class="filter-input">
                                    <p>Peşinat</p>
                                    <input type="text" placeholder="₺">
                                </div>
                                <div class="filter-input">
                                    <p>Vade(ay)</p>
                                    <input type="text" placeholder="Year">
                                </div>
                                <div class="filter-input">
                                    <p>Faiz Oranı %</p>
                                    <input type="text" placeholder="%">
                                </div>
                                <button type="submit" class="site-btn">Hesapla</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Property Details Section End -->
@endsection
@section('js')

@endsection

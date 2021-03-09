@extends('frontend.layout.app')
@section('page_title','Deniz Gayrimenkul')
@section('og_tags')

@endsection


@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section spad set-bg" data-setbg="images/breadcrumbs/deniz-gayrimenkul-iletisim.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h4>Bize Ulaşın</h4>
                    <div class="bt-option">
                        <a href="/"><i class="fa fa-home"></i> Anasayfa</a>
                        <span>İletişim</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Form Section Begin -->
<section class="contact-form-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cf-content">
                    <div class="cc-title">
                        <h4>Deniz Gayrimenkul</h4>
                        <p>Aklınıza takılan her türlü soru için bizimle iletişime geçebilirsiniz.<br />Daha hızlı iletişim kurabilmemiz için bizi telefon numaralaramızdan da arayabilirisiniz.</p>
                    </div>
                    <form action="#" class="cc-form">
                        <div class="group-input">
                            <input type="text" placeholder="Ad Soyad">
                            <input type="text" placeholder="Email">
                            <input type="text" placeholder="Website (gerekli değil)">
                        </div>
                        <textarea placeholder="Mesajınız"></textarea>
                        <button type="submit" class="site-btn">Gönder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Form Section End -->

<!-- Contact Section Begin -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-info">
                    <div class="ci-item">
                        <div class="ci-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="ci-text">
                            <h5>Adresimiz</h5>
                            <p>{{$contact_and_map['address']}}</p>
                        </div>
                    </div>
                    <div class="ci-item">
                        <div class="ci-icon">
                            <i class="fa fa-mobile"></i>
                        </div>
                        <div class="ci-text">
                            <h5>Telefon</h5>
                            <ul>
                                <li>{{$contact_and_map['phone']}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="ci-item">
                        <div class="ci-icon">
                            <i class="fa fa-headphones"></i>
                        </div>
                        <div class="ci-text">
                            <h5>Bilgi</h5>
                            <p>{{$contact_and_map['mail_address']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cs-map">
        <iframe src="{{$contact_and_map['map_embed']}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>
<!-- Contact Section End -->
@endsection
@section('js')

@endsection

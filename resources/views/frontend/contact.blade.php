@extends('frontend.layout.app')
@section('page_title','Deniz Gayrimenkul')
@section('og_tags')

@endsection


@section('content')
    @if(session('message'))
        <div class="modal d-block" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-success text-white font-weight-bold">
                    <div class="modal-header">
                        <h5 class="modal-title">{{session('status') ? 'İşlem başarılı' : 'İşlem başarısız' }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{session('message')}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn text-white" data-dismiss="modal">Tamam</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
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
                            <p>Aklınıza takılan her türlü soru için bizimle iletişime geçebilirsiniz.<br/>Daha hızlı
                                iletişim kurabilmemiz için bizi telefon numaralaramızdan da arayabilirisiniz.</p>
                        </div>
                        <form action="/send-contact-mail" method="POST" class="cc-form">
                            @csrf
                            <div class="group-input">
                                <input type="text" name="name_surname" placeholder="Ad Soyad">
                                <input type="text" name="phone_number" placeholder="Telefon Numaranız">
                                <input type="text" name="website" placeholder="Website (gerekli değil)">
                            </div>
                            <textarea name="message" placeholder="Mesajınız"></textarea>
                            <div class="group-input">
                                <img src="{{'/'.$random_image}}" class="float-left" alt="Güvenlik sorusu">
                                <input type="text" name="random_image" value="{{$random_image}}" hidden>
                                <input type="text" name="random_image_answer" class="float-left"
                                       placeholder="Güvelik yanıtınız">
                            </div>
                            <button type="submit" class="site-btn">Gönder</button>
                        </form>
                    </div>
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
            <iframe src="{{$contact_and_map['map_embed']}}" width="600" height="450" style="border:0;"
                    allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
@section('js')
    <script>
        $(window).ready(function () {
            setInterval(function () {
                $('.modal').removeClass("d-block")
            }, 4000);

        });
    </script>

@endsection

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
                                         data-setbg="{{'/images/properties/'.$property['property']['image_path']}}"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                @foreach($property['property_images'] as $image)
                                    <div class="col-sm-6 p-0">
                                        <div class="ps-item-inner set-bg"
                                             data-setbg="{{'/images/properties/'.$image['image_path']}}"></div>
                                    </div>
                                @endforeach
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
                            <div class="col-lg-10">
                                <div class="pd-title">
                                    <div
                                        class="label{{$property['property_details']['type_id'] == 1 ? ' c-red' : ''}}">{{$property['property_details']['type_id'] == 1 ? 'Satılık' : ''}}{{$property['property_details']['type_id'] == 2 ? 'Kiralık':''}}</div>
                                    <div class="pt-price">{{$property['property']['price']}} ₺</div>
                                    <h3>{{$property['property']['title']}}</h3>
                                    <p><span class="icon_pin_alt"></span> {{$property['property_address']['province']}}/{{$property['property_address']['district']}}, {{$property['property_address']['neighborhood']}}</p>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-sm btn-outline-success font-weight-bold"
                                   href="https://wa.me/?text=https://denizinsaatyapi.com/ilan-detay/{{$property['property_details']['property_id']}}"
                                   class="text-sm text-success">Whatsapp'da Paylaş</a>
                            </div>
                        </div>
                        <div class="pd-widget">
                            <h4>İlan Açıklaması</h4>
                            {{$property['property_details']['description']}}
                        </div>
                        <div class="pd-widget">
                            <h4>Ofisimize bekliyoruz</h4>
                            <div class="map">
                                <iframe
                                    src="{{$property['office']['map_embed']}}"
                                    height="350" style="border:0;" allowfullscreen=""></iframe>
                            </div>
                        </div>
                        <div class="pd-widget">
                            <h4>İlanla İlgilenen Danışmanımız</h4>
                            <div class="pd-agent">
                                <div class="agent-pic">
                                    <img src="{{'/images/agents/'.$property['property_agent']['profile_image']}}"
                                         alt="">
                                </div>
                                <div class="agent-text">
                                    <div class="at-title">
                                        <h6>{{$property['property_agent']['name_surname']}}</h6>
                                        <span>{{$property['property_agent']['title']}}</span>
                                        <a href="/danisman-ilanlari/{{$property['property_agent']['id']}}"
                                           class="primary-btn">Diğer ilanları</a>
                                    </div>
                                    <p>{{$property['property_agent']['description']}}</p>
                                    <div class="at-option">
                                        <div class="at-number">{{$property['property_agent']['phone_number']}}</div>
                                        <div class="at-social">
                                            <a href="{{$property['property_agent']['facebook']}}"><i
                                                    class="fa fa-facebook"></i></a>
                                            <a href="{{$property['property_agent']['twitter']}}"><i
                                                    class="fa fa-twitter"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="pd-widget">
                            <h4>İletişim bilgilerinizi yollayın, size ulaşalım.</h4>
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
                <div class="col-lg-4">
                    <div class="property-sidebar">
                        <div class="single-sidebar">
                            <div class="section-title sidebar-title">
                                <h5>Danışmanlarımız</h5>
                            </div>
                            <div class="top-agent">
                                @foreach($agents as $agent)
                                    <div class="ta-item">
                                        <div class="ta-pic set-bg"
                                             data-setbg="{{'/images/agents/'.$agent['profile_image']}}"></div>
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
                                    <div class="sf-item set-bg"
                                         data-setbg="{{'/images/categories/'.$category['image_path']}}">
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
                                    <input type="text" placeholder="ay">
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
    <script>
        $(window).ready(function () {
            setInterval(function () {
                $('.modal').removeClass("d-block")
            }, 4000);

        });
    </script>
@endsection

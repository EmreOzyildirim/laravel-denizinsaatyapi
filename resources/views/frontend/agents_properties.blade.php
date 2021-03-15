@extends('frontend.layout.app')
@section('page_title','Deniz Gayrimenkul')
@section('og_tags')

@endsection
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section spad set-bg"
             data-setbg="/images/breadcrumbs/deniz-gayrimenkul-danisman-ilanlari.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h4>Danışman İlanları</h4>
                        <div class="bt-option">
                            <a href="/"><i class="fa fa-home"></i> Anasayfa</a>
                            <a href="/danismanlarimiz">Danışmanlar</a>
                            <span>Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Profile Section Begin -->
    <section class="profile-section spad">
        <div class="container">
            <div class="profile-agent-content">
                <div class="row">
                    <div class="col-lg-8">
                            <div class="profile-agent-info">
                                <div class="pi-pic">
                                    <img src="{{'/images/agents/'.$agent->profile_image}}"
                                         alt="{{$agent->name_surname}}">
                                    <div class="rating-point">
                                        4.5
                                    </div>
                                </div>
                                <div class="pi-text">
                                    <h5>{{$agent->name_surname}}</h5>
                                    <p>{{$agent->title}}</p>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="profile-agent-widget">
                            <ul>
                                <li>İlan sayısı: <span>{{count($properties['properties'])}}</span></li>
                                <li>Email <span>{{$agent->email}}</span></li>
                                <li>Telefon <span>{{$agent->phone_number}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Profile Section End -->

    <!-- Property Section Begin -->
    <section class="property-section profile-page spad">
        <div class="container">
            <div class="row">
                @foreach($properties['properties'] as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="property-item">
                            <div class="pi-pic set-bg"
                                 data-setbg="{{'/images/properties/'.$item['property']['image_path']}}">
                                <div
                                    class="label {{$item['details']['type_id'] == 1 ? 'c-red' : ''}}">{{$item['details']['type_id'] == 1 ? 'Satılık' : ''}}{{$item['details']['type_id'] == 2 ? 'Kiralık':''}}</div>
                            </div>
                            <div class="pi-text">
                                <div class="pt-price">{{$item['property']['price']}} ₺</div>
                                <h5>
                                    <a href="/ilan-detay/{{$item['property']['id']}}">{{strlen($item['property']['title'])>33 ? substr($item['property']['title'],0,33).'..' : $item['property']['title']}}</a>
                                </h5>
                                <p><span class="icon_pin_alt"></span> testomesto sk.</p>
                                <ul>
                                    <li><i class="fa fa-object-group"></i>{{$item['details']['home_area']}}</li>
                                    <li><i class="fa fa-bed"></i>{{$item['details']['bedrooms']}}
                                        +{{$item['details']['rooms']}}</li>
                                    <li><i class="fa fa-automobile"></i> {{$item['details']['garage']}}</li>
                                </ul>
                                <div class="pi-agent">
                                    <div class="pa-item">
                                        <div class="pa-info">
                                            <img src="{{'/images/agents/'.$item['agent']['profile_image']}}"
                                                 alt="{{$item['agent']['name_surname']}}" width="100%">
                                            <h6>{{$item['agent']['name_surname']}}</h6>
                                        </div>
                                        <div class="pa-text">
                                            {{$item['agent']['phone_number']}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="property-pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#" class="icon"><span class="arrow_right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Property Section End -->
@endsection



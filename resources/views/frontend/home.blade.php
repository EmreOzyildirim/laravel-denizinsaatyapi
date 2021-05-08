@extends('frontend.layout.app')

@section('page_title','Deniz Gayrimenkul')
@section('head_js')
    <script src="elfsight.js" defer></script>
@endsection


@section('content')
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="hs-slider owl-carousel">
                @foreach($slider_properties as $slider)
                    <div class="hs-item set-bg" data-setbg="{{asset('images/properties/'.$slider['property']['image_path'])}}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hc-inner-text">
                                    <div class="hc-text">
                                        <h4>{{$slider['property']['title']}}</h4>
                                        <p><span class="icon_pin_alt"></span> {{$slider['property_address']['province']}}/{{$slider['property_address']['district']}}, {{$slider['property_address']['neighborhood']}}</p>
                                        <div class="label">{{$slider['details']['type']}}</div>
                                        <h5>{{$slider['property']['price']}} ₺</h5>
                                    </div>
                                    <div class="hc-widget">
                                        <ul>
                                            <li><i class="fa fa-object-group"></i> {{$slider['details']['home_area']}}</li>
                                            <li><i class="fa fa-bed"></i> {{$slider['details']['rooms']}}+{{$slider['details']['bedrooms']}}</li>
                                            <li><i class="fa fa-automobile"></i> {{$slider['details']['garage'] == 1 ? '✓':'×'}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Search Section Begin -->
    <section class="search-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section-title">
                        <h4>Nerede yaşamayı tercih ederdiniz?</h4>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="change-btn">
                        <div class="cb-item">
                            <label for="cb-rent" class="active">
                                Satılık
                                <input type="radio" id="cb-sale">
                            </label>
                        </div>
                        <div class="cb-item">
                            <label for="cb-sale">
                                Kiralık
                                <input type="radio" id="cb-rent">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-form-content">
                <form action="#" class="filter-form">
                    <select class="sm-width">
                        <option value="">Şehir seçin</option>
                    </select>
                    <select class="sm-width">
                        <option value="">İl seçin</option>
                    </select>
                    <select class="sm-width">
                        <option value="">İlçe seçin</option>
                    </select>
                    <div class="room-size-range-wrap sm-width">
                        <div class="price-text">
                            <label for="roomsizeRange">M<sup>2</sup>:</label>
                            <input type="text" id="roomsizeRange" readonly>
                        </div>
                        <div id="roomsize-range" class="slider"></div>
                    </div>
                    <div class="price-range-wrap sm-width">
                        <div class="price-text">
                            <label for="priceRange">Fiyat aralığı:</label>
                            <input type="text" id="priceRange" readonly>
                        </div>
                        <div id="price-range" class="slider"></div>
                    </div>
                    <button type="button" class="search-btn sm-width">Filtrele</button>
                </form>
            </div>
        </div>
    </section>
    <!-- Search Section End -->


    <!-- Property Section Begin -->
    <section class="property-section latest-property-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title">
                        <h4>EN YENİ İLANLAR</h4>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="property-controls">
                        <ul>

                            <li data-filter="all">Tümü</li>
                            @foreach($categories as $category)
                                <li data-filter=".<?php $name = str_replace(array("İ", "ı", "ğ", "ü", "ş", "ö", "ç"), array("I", "i", "g", "u", "s", "o", "c"), $category['category']['name']);
                                echo strtolower($name); ?>">{{$category['category']['name']}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row property-filter">
                @foreach($property_listing as $item)
                    <div class="col-lg-4 col-md-6 mix all <?php
                    foreach ($categories as $category)
                        if ($item['property']['category_id'] == $category['category']['id']) {
                            $class_name = str_replace(array("İ", "ı", "ğ", "ü", "ş", "ö", "ç"), array("I", "i", "g", "u", "s", "o", "c"), $category['category']['name']);
                            echo strtolower($class_name);
                        }?>">
                        <div class="property-item">
                            <div class="pi-pic set-bg"
                                 data-setbg="{{'images/properties/'.$item['property']['image_path']}}">
                                <div
                                    class="label {{$item['property']['type'] == 1 ? 'c-red' : ''}}">{{$item['property']['type'] == 1 ? 'Satılık' : ''}}{{$item['property']['type'] == 2 ? 'Kiralık':''}}</div>
                            </div>
                            <div class="pi-text">
                                <div class="pt-price">{{$item['property']['price']}} ₺</div>
                                <h5>
                                    <a href="/ilan-detay/{{$item['property']['id']}}">{{strlen($item['property']['title'])>33 ? substr($item['property']['title'],0,33).'..' : $item['property']['title']}}</a>
                                </h5>
                                <p><span class="icon_pin_alt"></span> {{$item['property_address']['property_province']}}
                                    /{{$item['property_address']['property_district']}}
                                    , {{$item['property_address']['property_neighborhood']}}</p>
                                <ul>
                                    <li><i class="fa fa-object-group"></i>{{$item['details']['home_area']}}</li>
                                    <li><i class="fa fa-bed"></i>{{$item['details']['bedrooms']}}
                                        +{{$item['details']['rooms']}}</li>
                                    <li><i class="fa fa-automobile"></i> {{$item['details']['garage'] == 1 ? '✓':'×'}}
                                    </li>
                                </ul>
                                <div class="pi-agent">
                                    <div class="pa-item">
                                        <div class="pa-info">
                                            <img src="{{asset('images/agents/'.$item['agent']['profile_image'])}}"
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
            </div>
        </div>
    </section>
    <!-- Property Section End -->


    <!-- Chooseus Section Begin -->

    <section class="chooseus-section spad set-bg"
             data-setbg="{{'/images/chooseus/'.$why_choose_us['bg_image_path']}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="chooseus-text">
                        <div class="section-title">
                            <h4>{{$why_choose_us['title']}}</h4>
                        </div>
                        <p>{{$why_choose_us['description']}}</p>
                    </div>
                    @if ($why_choose_us_icons)
                        <div class="chooseus-features">
                            @foreach($why_choose_us_icons as $icon_item)
                                <div class="cf-item">
                                    <div class="cf-pic">
                                        <img src="{{'/images/chooseus/'.$icon_item['icon_path']}}"
                                             alt="{{$icon_item['title']}}">
                                    </div>
                                    <div class="cf-text">
                                        <h5>{{$icon_item['title']}}</h5>
                                        <p>{{$icon_item['description']}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Chooseus Section End -->

    <!-- Team Section Begin -->
    <section class="team-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="section-title">
                        <h4>DANIŞMANLARIMIZ</h4>
                    </div>
                </div>
            </div>
            <!----
            <img src="/frontend/img/team/team-1.jpg" alt="">
            ---->
            <div class="row">
                @foreach($agents as $agent)
                    <div class="col-md-4">
                        <div class="ts-item">
                            <div class="ts-text">
                                <img src="{{'images/agents/'.$agent->profile_image}}"
                                     alt="{{$agent->name_surname}}">
                                <h5>{{$agent->name_surname}}</h5>
                                <span>{{$agent->phone_number}}</span>
                                <p>{{strlen($agent->description) > 102 ? substr($agent->description,0,102).'...' : $agent->description}}</p>
                                <div class="ts-social">
                                    <a href="{{$agent->facebook}}"><i class="fa fa-facebook"></i></a>
                                    <a href="{{$agent->twitter}}"><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Team Section End -->

    <!-- Categories Section Begin -->
    <section class="categories-section">
        <div class="cs-item-list">
            @foreach($categories as $category)
                <div class="cs-item set-bg"
                     data-setbg="{{ empty($category['category']['image_path']) ?: '/images/categories/'.$category['category']['image_path'] }}">
                    <div class="cs-text">
                        <h5>{{$category['category']['name']}}</h5>
                        <span>{{ $category['category']['category_property_count'] }} ilan</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="elfsight-app-c917cfe8-5707-498d-aa10-bc9956914760"></div>
        </div>
    </section>
    <!-- Testimonial Section End -->


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
                                <h5>Telefon Numaralarımız</h5>
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
@endsection
@section('js')
    <div id="google-reviews"></div>

    <link rel="stylesheet" href="https://cdn.rawgit.com/stevenmonson/googleReviews/master/google-places.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/gh/stevenmonson/googleReviews@6e8f0d794393ec657dab69eb1421f3a60add23ef/google-places.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDeivU57j-macv2fXXgbhKGM6cqMLmnAFI&signed_in=true&libraries=places"></script>

    <script>
        jQuery(document).ready(function ($) {
            $("#google-reviews").googlePlaces({
                placeId: 'ChIJycgaPNTPyhQRVFjIP1iWd0A' //Find placeID @: https://developers.google.com/places/place-id
                , render: ['reviews']
                , min_rating: 4
                , max_rows: 4
            });
        });
    </script>
@endsection

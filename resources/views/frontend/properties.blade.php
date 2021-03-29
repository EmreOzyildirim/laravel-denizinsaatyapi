@extends('frontend.layout.app')
@section('page_title','Deniz Gayrimenkul')
@section('og_tags')

@endsection


@section('content')
    <!-- Property Details Section Begin -->
    <section class="property-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h4>İlanlarımız</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($properties['properties'] as $item)
                    <div class="col-lg-4 col-md-6">
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
            <div class="property-pagination">
                @foreach($properties['pagination']['links'] as $page)
                    <a href="{{ $page['url'] }}">{{html_entity_decode($page['label'])}}</a>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Property Details Section End -->
@endsection
@section('js')

@endsection

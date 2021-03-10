
<div class="row property-filter">
    @foreach($property_listing['properties'] as $item)
        <div class="col-lg-4 col-md-6">
            <div class="property-item">
                <div class="pi-pic set-bg"
                     data-setbg="{{'images/properties/'.$item['property']['image_path']}}">
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
                                <img src="{{'images/agents/'.$item['agent']['profile_image']}}"
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

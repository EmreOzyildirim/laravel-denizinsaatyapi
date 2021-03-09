@extends('frontend.layout.app')
@section('page_title','Danışmanlarımız - Deniz Gayrimenkul')
@section('og_tags')

@endsection
@section('content')
    <div class="container mt-4">
        <div class="row">
            @foreach($agents as $agent)
                <div class="col-lg-4 col-md-6">
                    <div class="as-item">
                        <div class="as-pic">
                            <img src="{{'images/agents/'.$agent['profile_image']}}" alt="{{$agent['name_surname']}}">
                            <div class="rating-point">
                                4.5
                            </div>
                        </div>
                        <div class="as-text">
                            <div class="at-title">
                                <h6>{{$agent['name_surname']}}</h6>
                                <div class="rating-star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                            </div>
                            <ul>
                                <li>İlan Sayısı <span>14</span></li>
                                <li>Email <span>{{$agent['email']}}</span></li>
                                <li>Telefon <span>{{$agent['phone_number']}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('css')
@endsection
@section('js')
@endsection

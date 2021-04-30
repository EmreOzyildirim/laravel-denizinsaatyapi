@extends('.frontend.layout.app')
@section('head')

@endsection

@section('content')

    <!-- Blog Hero Section Begin -->
    <section class="blog-hero-section set-bg" data-setbg="{{asset('images/references/'.$reference_detail['image_path'])}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bh-text">
                        <h4>{{$reference_detail['title']}}</h4>
                        <ul>
                            <li>Ekleyen: <span>{{$reference_detail['agent']}}</span></li>
                            <li>Tarih: {{$reference_detail['created_at']}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Hero Section End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto p-0">
                    <div class="blog-details-content">
                        <div class="bc-top">
                            <p>{{$reference_detail['description']}}</p>
                        </div>
                        <div class="bc-related-post">
                            <a href="#" class="previous-post"><i class="fa fa-angle-left"></i> Önceki Post</a>
                            <a href="#" class="next-post">Sonraki Post <i class="fa fa-angle-right"></i></a>
                        </div>
                        <div class="bc-widget">
                            <h4>Diğer Referanslar</h4>
                            <div class="related-post">
                                <div class="row">
                                    @foreach($last_references as $last_reference)
                                        <div class="col-md-4 col-sm-6">
                                            <div class="related-item">
                                                <div class="ri-pic">
                                                    <img src="{{asset('images/references/'.$last_reference['image_path'])}}" alt="{{$last_reference['title']}}">
                                                </div>
                                                <div class="ri-text">
                                                    <h6>{{$last_reference['title']}}</h6>
                                                    <span>Tarih: {{$last_reference['created_at']}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
@endsection

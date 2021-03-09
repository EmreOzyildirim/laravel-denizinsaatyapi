@extends('admin.layouts.layout')
@section('page_title','Sosyal Medya Hesapları')
@section('optional_description','Buradan websitenizde görünecek olan sosyal medya linklerinizi paylaşabilirsiniz.')
@section('head')
    @csrf
@endsection
@section('content')
    <div class="col-md-12">
        <div class="box box-solid">
            <section class="content" style="min-height: 0;">
                <div class="row">
                    <div class="col-md-12">
                        <img src="/backend/know-how/social_1.PNG" width="20%">
                    </div>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.box -->
    </div>
    <!-- logo -->
    <div class="col-md-12">
        <div class="box default">
            <div class="box-header with-border">
                <h3 class="box-title">Müşteri Görüşleri Ekle</h3>
            </div>
            <form action="/admin/update-customer-feedback" class="form-horizontal" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$customer_feedback['id']}}" />
                <div class="box-body">
                    <div class="form-group">
                        <label for="logo" class="col-sm-2 control-label">Müşteri Profil Resmi</label>
                        <div class="col-sm-10">
                            <img src="{{'/images/musteri-yorumlari/' . $customer_feedback['image']}}" width="180px" style="margin-bottom: 20px;">
                            <input type="file" name="profile_image" class="form-control" id="logo"
                                   placeholder="Profil Resmi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name_surname" class="col-sm-2 control-label">Ad Soyad</label>

                        <div class="col-sm-10">
                            <input type="text" name="name_surname" class="form-control" id="name_surname"
                                   placeholder="Müşterinin adı ve soyadı"
                                   value="{{$customer_feedback['name_surname']}}">
                            @error('name_surname')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="job" class="col-sm-2 control-label">Meslek</label>

                        <div class="col-sm-10">
                            <input type="text" name="job" class="form-control" id="job"
                                   placeholder="Meslek" value="{{$customer_feedback['job']}}">
                            @error('job')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="star" class="col-sm-2 control-label">Puan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="star" id="star">
                                <option value="5"{{$customer_feedback['star'] == 5 ? ' selected':''}}>5 Puan</option>
                                <option value="4"{{$customer_feedback['star'] == 4 ? ' selected':''}}>4 Puan</option>
                                <option value="3"{{$customer_feedback['star'] == 3 ? ' selected':''}}>3 Puan</option>
                                <option value="2"{{$customer_feedback['star'] == 2 ? ' selected':''}}>2 Puan</option>
                                <option value="1"{{$customer_feedback['star'] == 1 ? ' selected':''}}>1 Puan</option>
                            </select>
                            @error('star')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Açıklama</label>

                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="description"
                                      id="description">{{$customer_feedback['description']}}</textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default" type="submit">Kaydet</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
@endsection

@section('css')

@endsection
@section('js')

@endsection

@extends('admin.layouts.layout')
@section('page_title','Neden Biz?')
@section('optional_description','Ana sayfanızda bulunan Neden Biz? adlı modülündeki bilgileri buradan güncelleyebilirsiniz.')
@section('head')

@endsection
@section('content')
    <div class="col-md-12">
        <div class="box box-solid">
            <section class="content" style="min-height: 0;">
                <div class="row">
                    <div class="col-md-12">
                        <img src="/backend/know-how/why-choose-us.PNG" width="100%">
                    </div>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.box -->
    </div>
    @if(session('message'))
        <div class="modal modal-{{session('status') ? 'success' : 'danger'}} fade in" id="modal-{{session('status') ? 'success' : 'danger'}}" style="display: block; padding-right: 17px;">
            <div class="modal-dialog mt-4">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">{{session('status') ? 'İşlem başarılı' : 'İşlem başarısız'}}</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{session('message')}}</p>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endif
    <form method="post" class="form-horizontal">
        @csrf
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Neden Biz?</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                    <div class="form-group">
                        <label for="logo" class="col-sm-2 control-label">Arkaplan Resmi</label>
                        <div class="col-sm-10">
                            <img src="" width="180px">
                            <input type="file" class="form-control" id="background_image" placeholder="Arkaplan Resmi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Başlık</label>

                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title"
                                   value="{{ $why_choose_us['title'] }}"
                                   placeholder="Başlık">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Açıklama</label>

                        <div class="col-sm-10">
                            <textarea type="text" name="description" class="form-control" id="description"
                                      placeholder="Açıklama">{{ $why_choose_us['description'] }}</textarea>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default save-data">Kaydet</button>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
    </form>
@endsection

@section('css')

@endsection
@section('js')
    <script>

        $(window).ready(function () {
            setInterval(function () {
                $('.modal').addClass("hidden")
            }, 2000);

        });
        /*success: function (response) {
            console.log(response);
            if (response) {
                $('.modal-success').removeClass('hidden').fadeIn();
                $('.modal-success').delay(2000).fadeOut();
                $('.callout-success').text(response.message);
            }
        },*/
    </script>
@endsection

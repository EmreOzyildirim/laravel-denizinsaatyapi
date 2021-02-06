@extends('admin.layouts.layout')
@section('page_title','Neden Biz? - Düzenle')
@section('head')

@endsection
@section('content')
    <div class="col-md-12">
        <div class="box box-solid">
            <section class="content" style="min-height: 0;">
                <div class="row">
                    <div class="col-md-12">
                        <img src="/public/backend/know-how/why-choose-us.png" width="100%">
                    </div>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.box -->
    </div>
    @if(isset($message))
        <div class="modal modal-success fade in" id="modal-success" style="display: block; padding-right: 17px;">
            <div class="modal-dialog mt-4">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">İşlem başarılı</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{$message}}</p>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endif



    <form action="/admin/why-choose-us/update-icon-item" method="post" class="form-horizontal">
        @csrf
        <input type="text" class="hidden" name="id" value="{{$icon_items['id']}}" hidden>
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">İkon Oluştur</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                    <div class="form-group">
                        <label for="icon" class="col-sm-2 control-label">İkon</label>
                        <div class="col-sm-10">
                            <img src="" width="180px">
                            <input type="file" class="form-control" id="icon" placeholder="İkon">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Başlık</label>

                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title"
                                   value="{{$icon_items['title']}}"
                                   placeholder="Başlık">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Açıklama</label>

                        <div class="col-sm-10">
                            <textarea type="text" name="description" class="form-control" id="description"
                                      placeholder="Açıklama">{{$icon_items['description']}}</textarea>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default" type="submit">Kaydet</button>
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

        $(window).ready(function(){
            setInterval(function(){
                $('.modal-success').addClass("hidden")
            }, 2000);

        });

    </script>
@endsection

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



    <form action="/admin/why-choose-us/create-icon-item" method="POST" class="form-horizontal">
        @csrf
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Yeni Madde İkonu Oluştur</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                    <div class="form-group">
                        <label for="icon" class="col-sm-2 control-label">Madde ikonu</label>
                        <div class="col-sm-10">
                            @foreach($icons as $icon)
                                <div class="radio" style="float:left!important">
                                    <label>
                                        <img src="{{$icon}}" alt="" style="margin: 15px;">
                                        <input type="radio" name="icon_path" id="icon_path" value="{{$icon}}">
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Başlık</label>

                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title"
                                   placeholder="Başlık">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Açıklama</label>

                        <div class="col-sm-10">
                            <textarea type="text" name="description" class="form-control" id="description"
                                      placeholder="Açıklama"></textarea>
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


    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Neden Biz? - İkonlu Maddeler</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>İkon</th>
                        <th>Başlık</th>
                        <th>Açıklama</th>
                        <th>İşlem Seç</th>
                    </tr>
                    @foreach($icon_items as $item)
                        <tr>
                            <td><img src="{{$item['icon_path']}}" alt="{{$item['icon_path']}}" width="80px"></td>
                            <td>{{strlen($item['title']) > 50 ? substr($item['title'],0,50).'..' : $item['title']}}</td>
                            <td>{{strlen($item['description']) > 75 ? substr($item['description'],0,75).'..' : $item['description']}}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="/admin/why-choose-us/update-icon-item/{{$item['id']}}">Düzenle</a>
                                <a class="btn btn-xs btn-danger" href="/admin/why-choose-us/delete-icon-item/{{$item['id']}}">Sil</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
    </script>
@endsection

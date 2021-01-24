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
    <div class="modal modal-success fade in hidden" id="modal-success" style="display: block; padding-right: 17px;">
        <div class="modal-dialog mt-4">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">İşlem başarılı</h4>
                </div>
                <div class="modal-body">
                    <p>{{isset($message)}}</p>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- logo -->
    <form method="post" class="form-horizontal">
        @csrf
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Neden Biz?</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body"><!----
                    <div class="form-group">
                        <label for="logo" class="col-sm-2 control-label">Logo</label>
                        <div class="col-sm-10">
                            <img src="" width="180px">
                            <input type="file" name="logo" class="form-control" id="logo" placeholder="Logo">
                        </div>
                    </div>---->
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

    <form action="/admin/why-choose-us/create-icon-item" method="post" class="form-horizontal">
        @csrf
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

    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">İkonlar</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>İkon</th>
                        <th>Başlık</th>
                        <th>Açıklama</th>
                        <th>İşlem</th>
                    </tr>
                    @foreach($icon_items as $item)
                        <tr>
                            <td><img src="{{$item['icon_path']}}" alt=""></td>
                            <td>{{strlen($item['title']) > 30 ? substr($item['title'],0,50).'...' : $item['title'] }}</td>
                            <td>{{strlen($item['description']) > 30 ? substr($item['description'],0,70).'...' : $item['description'] }}</td>
                            <td>
                                <a href="/admin/why-choose-us/update-icon-item/{{$item['id']}}" class="btn btn-xs btn-primary">Düzenle</a>
                                <a href="#" class="btn btn-xs btn-danger">Sil</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

@endsection

@section('css')

@endsection
@section('js')
    <script>
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

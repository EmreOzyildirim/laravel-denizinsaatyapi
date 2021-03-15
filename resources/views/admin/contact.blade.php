@extends('admin.layouts.layout')
@section('head')

@endsection
@section('page_title','İletişim Sayfası - Düzenle')
@section('optional_description','Websitenizin İletişim Sayfasını buradan güncelleyebilirsiniz.')

@section('content')
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">İletişim Sayfası</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/admin/update-about-us" class="form-horizontal" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="content_side_image" class="col-sm-2 control-label">İçerik Görseli</label>
                        <div class="col-sm-10">
                            <input type="file" name="content_side_image" class="form-control" id="content_side_image"
                                   placeholder="Kategori Resmi" required>
                            <img src="" name="content_side_image" alt="Deniz Gayrimenkul Hakkımızda"
                                 style="margin-top:20px;" onchange="previewFile(this)" width="180px">
                            @error('category_image')
                            <span class="text-danger"></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Başlık</label>

                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title"
                                   value=""
                                   placeholder="Başlığı girin">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="url" class="col-sm-2 control-label">Açıklama</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control" id="url"
                                   value=""
                                   placeholder="Hakkımızda sayfasında görünecek paragraf içeriğini giriniz...">
                            @error('url')
                            <span class="text-danger"></span>
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
    <!-- phone number ends -->




    <div class="modal modal-success fade in hidden" id="modal-success" style="display: block; padding-right: 17px;">
        <div class="modal-dialog mt-4">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">İşlem başarılı</h4>
                </div>
                <div class="modal-body">
                    <p>Verileriniz başarıyla güncellendi…</p>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal modal-danger fade in hidden" id="modal-danger" style="display: block; padding-right: 17px;">
        <div class="modal-dialog mt-4">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">İşlem hatalı</h4>
                </div>
                <div class="modal-body">
                    <p>Verileriniz eklenirken bir hata oluştu…</p>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection


@section('css')

@endsection
@section('js')
    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {

                var reader = new FileReader();
                reader.onload = function () {

                    ('#previewImg').attr('src', reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection

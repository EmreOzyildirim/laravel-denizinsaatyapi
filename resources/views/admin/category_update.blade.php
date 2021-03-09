@extends('admin.layouts.layout')
@section('head')

@endsection
@section('page_title','Kategori Düzenle')
@section('optional_description','Seçtiğiniz kategoriyi yeniden düzenleyebilirsiniz')

@section('content')
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Kategori Düzenle</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/admin/update-category" class="form-horizontal" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" value="{{$category['id']}}" hidden>
                <div class="box-body">
                    <div class="form-group">
                        <label for="category_image" class="col-sm-2 control-label">Kategori Resmi</label>
                        <div class="col-sm-10">
                            <img src="{{ empty($category['image_path']) ?: '/images/categories/'.$category['image_path'] }}" width="180px" style="margin-bottom:20px;">
                            <input type="file" name="category_image" class="form-control" id="category_image" placeholder="category_image">
                            @error('category_image')
                            <span class="danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Kategori Adı</label>

                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name"
                                   value="{{$category['name']}}"
                                   placeholder="Kategori adını girin">
                            @error('name')
                            <span class="danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="url" class="col-sm-2 control-label">URL</label>

                        <div class="col-sm-10">
                            <input type="text" name="url" class="form-control" id="url"
                                   value="{{$category['url']}}"
                                   placeholder="https://www.denizinsaatyapi.com sonrasında görünecek dizini girin">
                            @error('url')
                            <span class="danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-default" type="submit">Kaydet</button>
                </div>
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
                    <h4 class="modal-title">İşlem Başarılı</h4>
                </div>
                <div class="modal-body callout-success">
                    <p>
                        Bilgileriniz başarıyla güncellendi
                    </p>
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
                    <h4 class="modal-title">Hata</h4>
                </div>
                <div class="modal-body callout-danger">
                    <p>
                        İşlem Başarısız
                    </p>
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
        $.ready(function (){
            $('.modal-success').removeClass('hidden').fadeIn();
            $('.modal-success').delay(2000).fadeOut();
            $('.callout-success').append(response.message);
        });


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

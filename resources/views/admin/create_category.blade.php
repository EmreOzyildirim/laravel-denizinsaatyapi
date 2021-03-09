@extends('admin.layouts.layout')
@section('head')

@endsection
@section('page_title','Kategori Oluştur')
@section('optional_description','İlanlarınız için kategori oluşturun. Örneğin; Villa, Daire, Arsa...')

@section('content')
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Kategori Oluştur</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/admin/create-category" class="form-horizontal" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="category_image" class="col-sm-2 control-label">Kategori Resmi Seçin</label>
                        <div class="col-sm-10">
                            <input type="file" name="category_image" class="form-control" id="category_image"
                                   placeholder="Kategori Resmi" required>
                            <img src="" name="category_image" alt="Kategori resmi" style="margin-top:20px;" onchange="previewFile(this)" width="180px">
                            @error('category_image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Kategori Adı</label>

                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name"
                                   value=""
                                   placeholder="Kategori adını girin">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="url" class="col-sm-2 control-label">URL</label>

                        <div class="col-sm-10">
                            <input type="text" name="url" class="form-control" id="url"
                                   value=""
                                   placeholder="https://www.denizinsaatyapi.com sonrasında görünecek dizini girin">
                            @error('url')
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

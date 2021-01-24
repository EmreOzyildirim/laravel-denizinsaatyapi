@extends('admin.layouts.layout')
@section('head')

@endsection
@section('page_title','Kategori Oluştur')
@section('optional_description','İlanlarınız için kategori oluşturun. Örneğin; Villa, Daire, Arsa...')

@section('content')
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Site Başlığı</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="ajaxform" class="form-horizontal" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-body"><!----
                    <div class="form-group">
                        <label for="logo" class="col-sm-2 control-label">Logo</label>
                        <div class="col-sm-10">
                            <img src="" width="180px">
                            <input type="file" name="logo" class="form-control" id="logo" placeholder="Logo">
                        </div>
                    </div>---->

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Kategori Adı</label>

                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name"
                                   value=""
                                   placeholder="Kategori adını girin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="url" class="col-sm-2 control-label">URL</label>

                        <div class="col-sm-10">
                            <input type="text" name="url" class="form-control" id="url"
                                   value=""
                                   placeholder="https://www.denizinsaatyapi.com sonrasında görünecek dizini girin">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default save-data">Kaydet</button>
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

        $(".save-data").click(function (event) {
            event.preventDefault();

            let name = $("input[name=name]").val();
            let url = $("input[name=url]").val();
            let _token = $("input[name=_token]").attr('value');

            $.ajax({
                url: "/admin/create-category",
                type: "POST",
                data: {
                    name: name,
                    url: url,
                    _token: _token
                },
                success: function (response) {
                    console.log(response);
                    if (response) {
                        $('.modal-success').removeClass('hidden').fadeIn();
                        $('.modal-success').delay(2000).fadeOut();
                        /*$('.callout-success').text(response.message);*/
                    }
                },
                error: function (data) {

                    $('.modal-danger').removeClass('hidden').fadeIn();
                    $('.modal-danger').delay(2000).fadeOut();
                    $('.modal-body').append(data.errors);
                }
            });
        });

    </script>
@endsection

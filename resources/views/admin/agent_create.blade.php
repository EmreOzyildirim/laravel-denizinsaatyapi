@extends('admin.layouts.layout')
@section('head')

@endsection
@section('page_title','Danışman Ekle')
@section('optional_description','Buradan yeni bir danışman ekleyebilirsiniz.')

@section('content')
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Danışman Ekle</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="ajaxform" class="form-horizontal" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="logo" class="col-sm-2 control-label">Danışman Resmi</label>
                        <div class="col-sm-10">
                            <img src="" width="180px">
                            <input type="file" class="form-control" id="logo" placeholder="Logo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name_surname" class="col-sm-2 control-label">Danışman Adı</label>

                        <div class="col-sm-10">
                            <input type="text" name="name_surname" class="form-control" id="name_surname"
                                   placeholder="Danışman adını girin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Ünvan</label>

                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title"
                                   placeholder="Ünvan (örnek: Danışman)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" id="email"
                                   value=""
                                   placeholder="Email girin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="facebook" class="col-sm-2 control-label">Facebook Hesabı</label>

                        <div class="col-sm-10">
                            <input type="text" name="facebook" class="form-control" id="facebook"
                                   value=""
                                   placeholder="Facebook hesabınızın linkini domain adı olmadan girin. Örnek: muratkarakaya546">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="twitter" class="col-sm-2 control-label">Twitter Hesabı</label>

                        <div class="col-sm-10">
                            <input type="text" name="facebook" class="form-control" id="facebook"
                                   value=""
                                   placeholder="Twitter hesabınızın linkini domain adı olmadan girin. Örnek: muratkarakaya546">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="col-sm-2 control-label">GSM Telefon</label>

                        <div class="col-sm-10">
                            <input type="text" name="phone_number" class="form-control" id="phone_number"
                                   value=""
                                   placeholder="GSM Telefon numarası girin" maxlength="12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Biyografi</label>

                        <div class="col-sm-10">
                            <textarea name="description" id="description" class="form-control" placeholder="Danışmanla ilgili bilgiler, eğitim, deneyim vs."
                                      rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-default">Kaydet</button>
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

<?php
$find_browser = 'Firefox';

$agent_browser = $_SERVER['HTTP_USER_AGENT'];

if (strpos($agent_browser, $find_browser) !== false) {
    $fire = '/*firefox number arrow hiddener */ input[type=number] { -webkit-appearance: none; } ';
} ?>
@section('css')
    <style type="text/css">
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        <?php echo isset($fire) ? $fire : '' ?>
    </style>
@endsection
@section('js')
    <script>

        $(".save-data").click(function (event) {
            event.preventDefault();

            let id = $("input[name=id]").val();
            let image_path = 'image_path_to_be_added';
            let name = $("input[name=name]").val();
            let url = $("input[name=url]").val();
            let _token = $("input[name=_token]").attr('value');

            $.ajax({
                url: "/admin/update-category",
                type: "POST",
                data: {
                    id: id,
                    image_path: image_path,
                    name: name,
                    url: url,
                    _token: _token
                },
                success: function (response) {
                    console.log(response);
                    if (response) {
                        $('.modal-success').removeClass('hidden').fadeIn();
                        $('.modal-success').delay(2000).fadeOut();
                        $('.callout-success').append(response.message);
                    }
                }
            });
        });

    </script>
@endsection

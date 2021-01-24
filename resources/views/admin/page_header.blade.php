@extends('admin.layouts.layout')

@section('head')
    @csrf
@endsection
@section('content')
    <div class="col-md-12">
        <div class="box box-solid">
            <section class="content" style="min-height: 0;">
                <div class="row">
                    <div class="col-md-12">
                        <img src="/backend/know-how/site-basligi.PNG" width="100%">
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
                    <p>Verileriniz başarıyla güncellendi…</p>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- logo -->
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Site Başlığı</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="ajaxform" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="box-body"><!----
                    <div class="form-group">
                        <label for="logo" class="col-sm-2 control-label">Logo</label>
                        <div class="col-sm-10">
                            <img src="" width="180px">
                            <input type="file" name="logo" class="form-control" id="logo" placeholder="Logo">
                        </div>
                    </div>---->
                    <div class="form-group">
                        <label for="mail_address" class="col-sm-2 control-label">E-mail</label>

                        <div class="col-sm-10">
                            <input type="email" name="mail_address" class="form-control" id="mail_address"
                                   value="{{$mail_address}}"
                                   placeholder="Site başlığında görünecek mail adresi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="col-sm-2 control-label">Telefon</label>

                        <div class="col-sm-10">
                            <input type="phone_number" name="phone_number" class="form-control" id="phone_number"
                                   value="{{$phone_number}}"
                                   placeholder="Site başlığında görünecek telefon numarası">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="call_us_button" class="col-sm-2 control-label">Buton</label>

                        <div class="col-sm-10">
                            <input type="call_us_button" name="call_us_button" class="form-control" id="call_us_button"
                                   value="{{$call_us_button}}"
                                   placeholder="Site başlığında görünecek bizi arayın butonu">
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

@endsection

@section('css')

@endsection
@section('js')
    <script>
        $(".save-data").click(function (event) {
            event.preventDefault();

            let mail_address = $("input[name=mail_address]").val();
            let phone_number = $("input[name=phone_number]").val();
            let call_us_button = $("input[name=call_us_button]").val();
            let _token = $("input[name=_token]").attr('value');

            $.ajax({
                url: "/admin/page-header",
                type: "POST",
                data: {
                    mail_address: mail_address,
                    phone_number: phone_number,
                    call_us_button: call_us_button,
                    _token: _token
                },
                success: function (response) {
                    console.log(response);
                    if (response) {
                        $('.modal-success').removeClass('hidden').fadeIn();
                        $('.modal-success').delay(2000).fadeOut();
                        $('.callout-success').text(response.message);
                    }
                },
            });
        });
    </script>
@endsection

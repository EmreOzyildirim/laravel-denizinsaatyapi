@extends('admin.layouts.layout')

@section('page_title','İletişim ve Harita')
@section('optional_description','Sayfalarınızdaki iletişim ve harita bilgilerini buradan düzenleyebilirsiniz')
@section('head')
    <style type="text/css">
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="box box-solid">
            <section class="content" style="min-height: 0;">
                <div class="row">
                    <div class="col-md-12">
                        <img src="/backend/know-how/contact-and-map.png" width="100%">
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
                <h3 class="box-title">İletişim ve Harita</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="ajaxform" class="form-horizontal" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="phone_number" class="col-sm-2 control-label">Adresiniz</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" class="form-control" id="address"
                                   value="{{!empty($contact_and_map['address']) ? $contact_and_map['address'] : ''}}"
                                   placeholder="Sayfalarınızın alt kısmında görünecek adres bilgisini girin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="col-sm-2 control-label">Telefon</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone_number" class="form-control" id="phone_number"
                                   value="{{ $contact_and_map['phone'] }}"
                                   placeholder="İletişim ve harita modülünde görünecek telefon numarası">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mail_address" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" name="mail_address" class="form-control" id="mail_address"
                                   value="{{!empty($contact_and_map['mail_address']) ? $contact_and_map['mail_address'] : ''}}"
                                   placeholder="İletişim ve harita modülünde görünecek email adresini girin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="map_embed" class="col-sm-2 control-label">Google Maps Harita Embed</label>

                        <div class="col-sm-10">
                            <input type="text" name="map_embed" class="form-control" id="map_embed"
                                   value="{{!empty($contact_and_map['map_embed']) ? $contact_and_map['map_embed'] : ''}}"
                                   placeholder="İletişim ve harita modülünde olan harita için google embed linki girin">
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

            let address = $("input[name=address]").val();
            let mail_address = $("input[name=mail_address]").val();
            let phone_number= $("input[name=phone_number]").val();
            let map_embed = $("input[name=map_embed]").val();
            let _token = $("input[name=_token]").attr('value');

            $.ajax({
                url: "/admin/contact-and-map",
                type: "POST",
                data: {
                    address: address,
                    mail_address: mail_address,
                    phone_number: phone_number,
                    map_embed: map_embed,
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

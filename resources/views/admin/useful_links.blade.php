@extends('admin.layouts.layout')
@section('page_title','Footer Düzenle')
@section('optional_description','Buradan Websitenizin en alt kısmındaki alanı yönetebilirsiniz.')
@section('head')
    @csrf
@endsection
@section('content')
    <div class="col-md-12">
        <div class="box box-solid">
            <section class="content" style="min-height: 0;">
                <div class="row">
                    <div class="col-md-12">
                        <img src="/backend/know-how/footer.PNG" width="100%">
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
            <div class="box default">
                <div class="box-header with-border">
                    <h3 class="box-title">Yeni Ekle</h3>
                </div>
                <form action="/admin/useful-links" class="form-horizontal" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Link adı</label>

                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name"
                                       placeholder="Linke tıklanacak yazıyı girin">
                            </div>
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="url" class="col-sm-2 control-label">URL</label>

                            <div class="col-sm-10">
                                <input type="text" name="url" class="form-control" id="url"
                                       placeholder="URL'i girin">
                            </div>
                            @error('url')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-default" type="submit">Kaydet</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Faydalı Linkler</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Link Adı</th>
                            <th>URL</th>
                            <th>İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($footer_links as $item)
                            <tr>
                                <td>{{strlen($item['name']) > 50 ? substr($item['name'],0,50) : $item['name']}}</td>
                                <td>{{strlen($item['name']) > 50 ? substr($item['name'],0,50) : $item['name']}}</td>
                                <td>
                                    <a href="/admin/update-footer-link/{{$item['id']}}" class="btn btn-xs btn-primary">Düzenle</a>
                                    <a href="/admin/delete-footer-link/{{$item['id']}}" class="btn btn-xs btn-danger">Sil</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    <!-- phone number ends -->

@endsection

@section('css')

@endsection
@section('js')

    <script>/*
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
        });*/
    </script>
@endsection

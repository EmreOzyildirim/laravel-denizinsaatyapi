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
    @foreach($footer as $item)
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Footer Düzenle</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/admin/footer" class="form-horizontal" method="post">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="short_description" class="col-sm-2 control-label">Kısa Açıklama</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="short_description" class="form-control" id="short_description" placeholder="Footer'da görünecek kısa açıklamayı girin">{{isset($item['short_description']) ? $item['short_description'] : ''}}</textarea>
                        </div>
                        @error('short_description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="social_media_icons" class="col-sm-2 control-label">Sosyal Medya İkonları</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="social_media_icons" name="social_media_icons">
                                <option value="1" @if ($item['social_media_icons'] == 1) selected="selected" @endif>Açık</option>
                                <option value="0" @if ($item['social_media_icons'] == 0) selected="selected" @endif>Kapalı</option>
                            </select>
                        </div>
                        @error('social_media_icons')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="copy_text" class="col-sm-2 control-label">Copyright</label>

                        <div class="col-sm-10">
                            <input type="text" name="copy_text" class="form-control" id="copy_text"
                                   value="{{isset($item['copy_text']) ? $item['copy_text'] : ''}}"
                                   placeholder="Copyright satırını girin">
                        </div>
                        @error('copy_text')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-default save-data">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
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

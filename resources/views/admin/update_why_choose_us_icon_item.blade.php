@extends('admin.layouts.layout')
@section('page_title','Neden Biz? - Düzenle')
@section('head')

@endsection
@section('content')
    @if(isset($message))
        <div class="modal modal-success fade in" id="modal-success" style="display: block; padding-right: 17px;">
            <div class="modal-dialog mt-4">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">İşlem başarılı</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{$message}}</p>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endif



    <form action="/admin/why-choose-us/update-icon-item" method="post" class="form-horizontal">
        @csrf
        <input type="text" class="hidden" name="id" value="{{$icon_items['id']}}" hidden>
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">İkon Oluştur</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                    <div class="form-group">
                        <label for="icon" class="col-sm-2 control-label">Madde ikonu düzenle</label>
                        <div class="col-sm-10">
                            @foreach($icons as $icon)
                                <div class="radio" style="float:left!important">
                                    <label>
                                        <img src="{{$icon}}" alt="" style="margin: 15px;">
                                        <input type="radio" name="icon_path" id="icon_path" value="{{$icon}}"
                                            {{ strcasecmp($icon_items['icon_path'], $icon)==0 ? 'checked' : '' }}>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Başlık</label>

                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title"
                                   value="{{$icon_items['title']}}"
                                   placeholder="Başlık">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Açıklama</label>

                        <div class="col-sm-10">
                            <textarea type="text" name="description" class="form-control" id="description"
                                      placeholder="Açıklama">{{$icon_items['description']}}</textarea>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default" type="submit">Kaydet</button>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
@endsection

@section('css')

@endsection
@section('js')
    <script>

        $(window).ready(function () {
            setInterval(function () {
                $('.modal-success').addClass("hidden")
            }, 2000);

        });

    </script>
    <script type="text/javascript">
        function custom_template(obj) {
            var data = $(obj.element).data();
            var text = $(obj.element).text();
            if (data && data['img_src']) {
                img_src = data['img_src'];
                template = $("<div><img src=\"" + img_src + "\" style=\"width:100%;height:150px;\"/><p style=\"font-weight: 700;font-size:14pt;text-align:center;\">" + text + "</p></div>");
                return template;
            }
        }

        var options = {
            'templateSelection': custom_template,
            'templateResult': custom_template,
        }
        $('#id_select2_example').select2(options);
        $('.select2-container--default .select2-selection--single').css({'height': '220px'});

    </script>
@endsection

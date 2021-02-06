@extends('admin.layouts.layout')
@section('head')

@endsection
@section('page_title','İlan oluştur')
@section('optional_description','Yeni ilan oluştur')

@section('content')
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">İlan Oluştur</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="ajaxform" class="form-horizontal">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="logo" class="col-sm-2 control-label">İlan Resimleri</label>
                        <div class="col-sm-10">
                            <img src="" width="180px">
                            <input type="file" class="form-control" id="logo" placeholder="İlan Resimleri">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">İlan Başlığı</label>

                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title"
                                   value=""
                                   placeholder="İlan başlığını girin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Açıklama</label>
                        <div class="col-md-10">
                    <textarea id="description" name="description" rows="10" cols="80"
                              style="visibility: hidden; display: none;">

                    </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">İlan türü</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="type" id="type">

                                @foreach($types as $item)
                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-2 control-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category" id="category">

                                @foreach($categories as $item)
                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-sm-2 control-label">Fiyat</label>

                        <div class="col-sm-10">
                            <input type="text" name="price" class="form-control" id="price"
                                   value=""
                                   placeholder="İlan fiyatını girin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="agent" class="col-sm-2 control-label">İlanla ilginen danışman</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="agent" id="agent">

                                @foreach($agents as $item)
                                    <option value="{{$item['id']}}">{{$item['name_surname']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="year_built" class="col-sm-2 control-label">Yapım Yılı</label>

                        <div class="col-sm-4">
                            <input type="text" name="year_built" class="form-control" id="year_built"
                                   value=""
                                   placeholder="Yapım yılı">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="home_area" class="col-sm-2 control-label">Alan m²</label>

                        <div class="col-sm-4">
                            <input type="text" name="home_area" class="form-control" id="home_area"
                                   value=""
                                   placeholder="Metrekare cinsinden alan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rooms" class="col-sm-2 control-label">Oturma Odası</label>

                        <div class="col-sm-4">
                            <input type="text" name="rooms" class="form-control" id="rooms"
                                   value=""
                                   placeholder="Oda sayısı">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bedrooms" class="col-sm-2 control-label">Yatak Odası</label>

                        <div class="col-sm-4">
                            <input type="text" name="bedrooms" class="form-control" id="bedrooms"
                                   value=""
                                   placeholder="Yatak oda sayısı">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="garage" class="col-sm-2 control-label">Garaj</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="garage" id="garage">

                                <option value="1">Evet</option>
                                <option value="0">Hayır</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Durum</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status" id="status">

                                @foreach($statuses as $item)
                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                @endforeach
                            </select>
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
    <!-- CK Editor -->
    <script src="/backend/bower_components/ckeditor/ckeditor.js"></script>
    <script src="/backend/bower_components/ckeditor/adapters/jquery.js"></script>

    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('description');
            var strNotes = CKEDITOR.instances["description"].getData();
        });
    </script>
    <script>

        $(".save-data").click(function (event) {
            event.preventDefault();

            let id = $("#id").val();
            let title = $("#title").val();
            let description = 'strNotes';
            let type = $("#type").val();
            let category = $("#category").val();
            let price = $("#price").val();
            let agent = $("#agent").val();
            let home_area = $("#home_area").val();
            let rooms = $("#rooms").val();
            let bedrooms = $("#bedrooms").val();
            let garage = $("#garage").val();
            let status = $("#status").val();
            let year_built = $("#year_built").val();
            let image_path = 'image_path_to_be_added';

            let _token = $("input[name=_token]").attr('value');

            $.ajax({
                url: "/admin/create-property",
                type: "POST",
                data: {
                    id: id,
                    image_path: image_path,
                    title: title,
                    description: description,
                    type: type,
                    category: category,
                    price: price,
                    status: status,
                    year_built: year_built,
                    agent: agent,
                    home_area: home_area,
                    rooms: rooms,
                    bedrooms: bedrooms,
                    garage: garage,

                    _token: _token
                },
                success: function (response) {

                    if (response) {
                        //console.log(response);
                        $('.modal-success').removeClass('hidden').fadeIn();
                        $('.modal-success').delay(2000).fadeOut();
                        $('.callout-success').append(response.message);
                    }

                    setTimeout(window.location.replace("/admin/properties"), 3000);

                },
                error: function (data) {

                    alert(data.message);
                }
            });
        });

    </script>
@endsection

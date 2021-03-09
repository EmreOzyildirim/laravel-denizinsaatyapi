@extends('admin.layouts.layout')
@section('head')

@endsection
@section('page_title','Öne Çıkan İlan Oluştur')
@section('optional_description','İlanlarınızın websitenizin slider alanında görünmesi için ekleyin...')

@section('content')
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Öne Çıkan İlan Oluştur</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/admin/create-featured-property" class="form-horizontal" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">İlan Başlığı</label>

                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title"
                                   value=""
                                   placeholder="İlan başlığını girin">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Açıklama</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="description" rows="10" cols="80"
                                      id="description"></textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div style="margin:40px 0;">
                        <h4>Adres Bilgileri</h4>
                        <div class="form-group">
                            <label for="provinces" class="col-sm-2 control-label">Şehir</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="province_id" id="provinces">
                                    <option selected>Şehir seçin</option>
                                    @foreach($provinces as $item)
                                        <option value="{{$item['sehir_key']}}">{{$item['sehir_title']}}</option>
                                    @endforeach
                                </select>
                                @error('province')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="districts" class="col-sm-2 control-label">İlçe</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="district_id" id="districts">
                                    <option selected>Önce şehir seçin</option>
                                </select>
                                @error('province')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="neighborhoods" class="col-sm-2 control-label">Mahalle</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="neighborhood_id" id="neighborhoods">
                                    <option selected>Önce ilçe seçin</option>
                                </select>
                                @error('neighborhoods')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">İlan türü</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="type_id" id="type">

                                @foreach($types as $item)
                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                @endforeach
                            </select>
                            @error('type')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-2 control-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category_id" id="category">

                                @foreach($categories as $item)
                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-sm-2 control-label">Fiyat</label>

                        <div class="col-sm-10">
                            <input type="text" name="price" class="form-control" id="price"
                                   value=""
                                   placeholder="İlan fiyatını girin">
                            @error('price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
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
                            @error('agent')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="year_built" class="col-sm-2 control-label">Yapım Yılı</label>
                        <div class="col-sm-4">
                            <input type="text" name="year_built" class="form-control" id="year_built"
                                   value=""
                                   placeholder="Yapım yılı">
                            @error('year_built')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="home_area" class="col-sm-2 control-label">Alan m²</label>

                        <div class="col-sm-4">
                            <input type="text" name="home_area" class="form-control" id="home_area"
                                   value=""
                                   placeholder="Metrekare cinsinden alan">
                            @error('home_area')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bedrooms" class="col-sm-2 control-label">Oda</label>
                        <div class="col-sm-4">
                            <input type="text" name="bedrooms" class="form-control" id="bedrooms"
                                   value=""
                                   placeholder="Oda sayısı">
                            @error('bedrooms')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rooms" class="col-sm-2 control-label">Salon</label>

                        <div class="col-sm-4">
                            <input type="text" name="rooms" class="form-control" id="rooms"
                                   value=""
                                   placeholder="Salon sayısı">
                            @error('rooms')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="garage" class="col-sm-2 control-label">Garaj</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="garage" id="garage">

                                <option value="1">Evet</option>
                                <option value="0">Hayır</option>
                            </select>
                            @error('garage')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
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
                            @error('status')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
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

    <script src="/backend/bower_components/ckeditor/ckeditor.js"></script>
    <script src="/backend/bower_components/ckeditor/adapters/jquery.js"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('description');
            var strNotes = CKEDITOR.instances["description"].getData();

            $('#provinces').on('change', function () {
                var province_id = $(this).val();
                if (province_id) {

                    $.ajax({
                        type: 'POST',
                        url: '/admin/search-districts',
                        data: {
                            'province_id' : province_id,
                            '_token' : $( "input[name=_token]" ).val()
                        },
                        success: function (html) {
                            $('#districts').html(html);

                        }
                    });

                    $('#districts').on('change',function(){

                        var district_id = $('#districts').val();

                        $('#gel').text(district_id);

                        $.ajax({
                            type:'POST',
                            url:'/admin/search-neighborhoods',
                            data:{
                                '_token':$( "input[name=_token]" ).val(),
                                'district_id':district_id,
                            },
                            success:function(html){
                                $('#neighborhoods').html(html);
                            }
                        });

                    });

                } else {
                    ('#districts').html('<option value="">Önce şehir seçiniz</option>');
                    ('#neighborhoods').html('<option value="">Önce ilçe seçiniz</option>');
                }
            });


        });
    </script>
@endsection

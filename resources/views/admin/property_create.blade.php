@extends('admin.layouts.layout')
@section('page_title','İlan oluştur')
@section('optional_description','Yeni ilan oluştur')
@section('head')

@endsection

@section('content')
    @if(session('message'))
        <div class="modal modal-{{session('status') ? 'success' : 'danger'}} fade in"
             id="modal-{{session('status') ? 'success' : 'danger'}}" style="display: block; padding-right: 17px;">
            <div class="modal-dialog mt-4">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">{{session('status') ? 'İşlem başarılı' : 'İşlem başarısız'}}</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{session('message')}}</p>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endif
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h1 id="gel"></h1>
                <h3 class="box-title">İlan Oluştur</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/admin/create-property" method="POST" class="form-horizontal">
                @csrf
                <div class="box-body">
                    <!----<div class="form-group">
                        <label for="logo" class="col-sm-2 control-label">İlan Resimleri</label>
                        <div class="col-sm-10">
                            <img src="" width="180px">
                            <input type="file" class="form-control" id="logo" placeholder="İlan Resimleri">
                        </div>
                    </div>---->
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
                        <label for="rooms" class="col-sm-2 control-label">Salon</label>

                        <div class="col-sm-4">
                            <input type="text" name="rooms" class="form-control" id="rooms"
                                   value=""
                                   placeholder="Oda sayısı">
                            @error('rooms')
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
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-default">Kaydet</button>
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
    <script src="/backend/bower_components/ckeditor/ckeditor.js"></script>
    <script src="/backend/bower_components/ckeditor/adapters/jquery.js"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('description');
            var strNotes = CKEDITOR.instances["description"].getData();

            $('#gel').text("başta degisti....");



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

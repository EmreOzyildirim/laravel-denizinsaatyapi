@extends('admin.layouts.layout')
@section('head')

@endsection
@section('page_title','İlan Düzenle')
@section('optional_description','Seçtiğiniz ilanı buradan düzenleyebilirsiniz')

@section('content')
    <div class="col-md-12">
        <h1 id="testo"></h1>
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">İlan Düzenle</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/admin/update-property" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" value="{{$property->id}}" id="id" hidden>

                <div class="box-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="property_images" class="col-sm-2 control-label">İlan Resimleri</label>
                            <div class="col-sm-10">
                                <input type="file" name="property_images[]" class="form-control" id="property_images"
                                       placeholder="İlan Resimleri" multiple>
                                @error('property_images')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="row" style="margin: 20px 0px;">
                                    @foreach($property_images as $image)
                                        <div class="col-md-4">
                                            <img src="{{ '/images/properties/'.$image->image_path }}" width="180px" alt="{{$property->title}}">
                                            <a href="/admin/update-property/{{$property->id}}/remove_image/{{$image->id}}" class="text-danger text-sm-center">Kaldır</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">İlan Başlığı</label>

                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" id="title"
                                       value="{{$property->title}}"
                                       placeholder="İlan başlığını girin">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Açıklama</label>
                            <div class="col-md-10">
                            <textarea class="form-control" name="description" rows="10" cols="80"
                                      id="description">{{$details->description}}</textarea>
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
                                        @foreach($provinces as $item)
                                            <option
                                                value="{{$item->sehir_key}}"{{$property->province_id == $item->sehir_key ? ' selected':''}}>{{$item->sehir_title}}</option>
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="districts" class="col-sm-2 control-label">İlçe</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="district_id" id="districts">
                                        @foreach($districts as $item)
                                            <option
                                                value="{{$item['ilce_key']}}"{{$property['district_id'] == $item['ilce_key'] ? ' selected':''}}>{{$item['ilce_title']}}</option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="neighborhoods" class="col-sm-2 control-label">Mahalle</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="neighborhood_id" id="neighborhoods">
                                        @foreach($neighborhoods as $item)
                                            <option
                                                value="{{$item['mahalle_key']}}"{{$property['neighborhood_id'] == $item['mahalle_key'] ? ' selected':''}}>{{$item['mahalle_title']}}</option>
                                        @endforeach
                                    </select>
                                    @error('neighborhood_id')
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
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-2 control-label">Fiyat</label>

                            <div class="col-sm-10">
                                <input type="text" name="price" class="form-control" id="price"
                                       value="{{$property['price']}}"
                                       placeholder="İlan fiyatını girin">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="agent" class="col-sm-2 control-label">İlanla ilginen danışman</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="agent" id="agent">
                                    @foreach($agents as $item)
                                        <option
                                            value="{{$item['id']}}" {{$property['agent_id'] == $item['id'] ? ' selected' : '' }}>{{$item['name_surname']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="year_built" class="col-sm-2 control-label">Yapım Yılı</label>

                            <div class="col-sm-4">
                                <input type="text" name="year_built" class="form-control" id="year_built"
                                       value="{{isset($details['year_built'])}}"
                                       placeholder="Yapım yılı">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="home_area" class="col-sm-2 control-label">Alan m²</label>

                            <div class="col-sm-4">
                                <input type="text" name="home_area" class="form-control" id="home_area"
                                       value="{{$details['home_area']}}"
                                       placeholder="Metrekare cinsinden alan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bedrooms" class="col-sm-2 control-label">Yatak Odası</label>

                            <div class="col-sm-4">
                                <input type="text" name="bedrooms" class="form-control" id="bedrooms"
                                       value="{{$details['bedrooms']}}"
                                       placeholder="Oda sayısı">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rooms" class="col-sm-2 control-label">Salon</label>

                            <div class="col-sm-4">
                                <input type="text" name="rooms" class="form-control" id="rooms"
                                       value="{{$details['rooms']}}"
                                       placeholder="Salon sayısı">
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


            $('#provinces').on('change', function () {
                var province_id = $(this).val();
                if (province_id) {

                    $.ajax({
                        type: 'POST',
                        url: '/admin/search-districts',
                        data: {
                            'province_id': province_id,
                            '_token': $("input[name=_token]").val()
                        },
                        success: function (html) {
                            $('#districts').html(html);

                        }
                    });


                    $('#districts').on('change', function () {

                        var district_id = $('#districts').val();

                        $.ajax({
                            type: 'POST',
                            url: '/admin/search-neighborhoods',
                            data: {
                                '_token': $("input[name=_token]").val(),
                                'district_id': district_id,
                            },
                            success: function (html) {
                                $('#neighborhoods').html(html);
                            }
                        });

                    });

                } else {
                    /*('#districts').html('<option value="">Önce şehir seçiniz</option>');
                    ('#neighborhoods').html('<option value="">Önce ilçe seçiniz</option>');*/
                }
            });


        });
    </script>
@endsection

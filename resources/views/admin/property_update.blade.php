@extends('admin.layouts.layout')
@section('head')

@endsection
@section('page_title','İlan Düzenle')
@section('optional_description','Seçtiğiniz ilanı buradan düzenleyebilirsiniz')

@section('content')
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">İlan Düzenle</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/admin/update-property" method="POST" class="form-horizontal">
                @csrf
                <input type="text" name="id" value="{{$property['id']}}" id="id" hidden>
                <div class="box-body">
                    <div class="form-group">
                        <label for="logo" class="col-sm-2 control-label">Logo</label>
                        <div class="col-sm-10">
                            <img src="" width="180px">
                            <input type="file" class="form-control" id="logo" placeholder="Logo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">İlan Başlığı</label>

                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title"
                                   value="{{$property['title']}}"
                                   placeholder="İlan başlığını girin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Açıklama</label>
                        <div class="col-md-10">
                    <textarea id="description" name="description" rows="10" cols="80" style="visibility: hidden; display: none;">
                        {{$details['description']}}
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
                                   value="{{$property['price']}}"
                                   placeholder="İlan fiyatını girin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="agent" class="col-sm-2 control-label">İlanla ilginen danışman</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="agent" id="agent">
                                @foreach($agents as $item)
                                    <option value="{{$item['id']}}" {{$property['agent_id'] == $item['id'] ? ' selected' : '' }}>{{$item['name_surname']}}</option>
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
                        <label for="rooms" class="col-sm-2 control-label">Oturma Odası</label>

                        <div class="col-sm-4">
                            <input type="text" name="rooms" class="form-control" id="rooms"
                                   value="{{$details['rooms']}}"
                                   placeholder="Oda sayısı (yatak odası hariç)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bedrooms" class="col-sm-2 control-label">Yatak Odası</label>

                        <div class="col-sm-4">
                            <input type="text" name="bedrooms" class="form-control" id="bedrooms"
                                   value="{{$details['bedrooms']}}"
                                   placeholder="Oda sayısı (oda sayısı hariç)">
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
@endsection

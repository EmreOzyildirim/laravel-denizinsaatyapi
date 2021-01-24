@extends('admin.layouts.layout')
@section('page_title','Kategoriler')
@section('optional_description','Kategorilerinizi buradan inceleyebilir ve düzenleyebilirsiniz.')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tüm Kategoriler</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>Vitrin Resmi</th>
                            <th>Kategori Adı</th>
                            <th>URL</th>
                            <th>İşlem</th>
                        </tr>
                        @foreach($categories as $item)
                            <tr>
                                <td><img src="{{$item['image_path']}}" width="100px" alt="testo"></td>
                                <td>{{$item['name']}}</td>
                                <td>{{$item['url']}}</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="/admin/update-category/{{$item['id']}}">Düzenle</a>
                                    <a class="btn btn-xs btn-danger" href="/admin/category-delete/{{$item['id']}}">Sil</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

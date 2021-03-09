@extends('admin.layouts.layout')
@section('page_title','Kategoriler')
@section('optional_description','Kategorilerinizi buradan inceleyebilir ve düzenleyebilirsiniz.')

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
                                <td><img src="{{ empty($item['image_path']) ?: '/images/categories/'.$item['image_path'] }}" width="100px" alt="testo"></td>
                                <td>{{$item['name']}}</td>
                                <td>{{$item['url']}}</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="/admin/update-category/{{$item['id']}}">Düzenle</a>
                                    <a class="btn btn-xs btn-danger"
                                       href="/admin/category-delete/{{$item['id']}}">Sil</a>
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

@section('css')

@endsection
@section('js')
    <script>
        $(window).ready(function () {
            setInterval(function () {
                $('.modal').addClass("hidden")
            }, 2000);

        });
    </script>
@endsection

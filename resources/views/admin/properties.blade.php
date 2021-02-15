@extends('admin.layouts.layout')
@section('page_title','İlanlar')
@section('optional_description','Websitenizde bulunan tüm ilanlarınızı buradan görebilir, düzenleyebilirsiniz.')
@section('head')

@endsection

@section('content')

    @if(session('message'))
        <div class="modal modal-{{session('status') ? 'success' : 'danger'}} fade in" id="modal-{{session('status') ? 'success' : 'danger'}}" style="display: block; padding-right: 17px;">
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
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tüm İlanlar</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>Vitrin Resmi</th>
                            <th>Başlık</th>
                            <th>Fiyat</th>
                            <th>Durum</th>
                            <th>Danışman</th>
                            <th>Son güncelleme</th>
                            <th>İşlem</th>
                        </tr>


                        @foreach($properties as $item)
                            <tr>
                                <td><img src="{{$item->image_path}}agent_name" width="75px"
                                         alt="{{$item->image_alt_text}}">
                                </td>
                                <td>{{ strlen($item->title) > 50 ? substr($item->title,'0','50').'...' : $item->title }}</td>
                                <td>{{number_format($item->price,0) .' ₺'}}</td>
                                <td>
                                    <span
                                        class="label label-{{$item->status == 1 ? 'success':'warning'}}">{{$item->status == 1 ? 'Yayında':'Yayında değil'}}</span>
                                </td>
                                <td>{{$item->name_surname}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>
                                    <a href="/admin/update-property/{{$item->id}}" class="btn btn-xs btn-primary">Düzenle</a>
                                    <a href="/admin/delete-property/{{$item->id}}" class="btn btn-xs btn-danger">Sil</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection

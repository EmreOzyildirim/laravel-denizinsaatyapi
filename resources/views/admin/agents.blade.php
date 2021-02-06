@extends('admin.layouts.layout')
@section('page_title','Danışmanlar')
@section('optional_description','Danışmanlarınızla ilgili bilgileri buradan görebilir, düzenleyebilir ve silebilirsiniz.')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tüm Danışmanlar</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>Profil Resmi</th>
                            <th>İsim Soyisim</th>
                            <th>GSM</th>
                            <th>E-mail</th>
                            <th>Ünvan</th>
                            <th>Biyografi</th>
                            <th>İşlem</th>
                        </tr>
                        @foreach($agents as $item)
                            <tr>
                                <td><img src="{{$item['profile_image']}}" width="75px"></td>
                                <td>{{$item['name_surname']}}</td>
                                <td>{{$item['phone_number']}}</td>
                                <td>{{$item['email']}}</td>
                                <td>{{$item['title']}}</td>
                                <td>{{strlen($item['description']) > 50 ? substr($item['description'],0,50).'..' : $item['description'] }}</td>
                                <td><a href="/admin/update-agent/{{$item['id']}}" class="btn btn-xs btn-primary">Düzenle</a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger{{$item['id']}}">
                                        Sil
                                    </button>
                                </td>
                            </tr>

                            <div class="modal modal-danger fade" id="modal-danger{{$item['id']}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Danışman sil</h4>
                                        </div>
                                        <div class="modal-body">
                                            <strong style="font-size: 16px;">{{ $item['name_surname']}}</strong>
                                            <p>adlı danışmanı silmek istediğinizden emin misiniz?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">İptal</button>
                                            <a class="btn btn-outline pull-left" href="/admin/delete-agent/{{$item['id']}}">Evet, sil.</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

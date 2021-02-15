@extends('admin.layouts.layout')
@section('page_title','Müşteri Görüşleri')
@section('optional_description','Müşteri görüşleri ile ilgili bilgileri buradan görebilir, düzenleyebilir ve silebilirsiniz.')

@section('content')
    @if(session('message'))
        <div class="modal modal-{{session('status') === true ? 'success':'danger'}} fade in"
             id="modal-{{session('status') === false ? 'success':'danger'}}"
             style="display: block; padding-right: 17px;">
            <div class="modal-dialog mt-4">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">{{session('status') ? 'İşlem başarılı' : 'İşlem başarısız' }}</h4>
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
                    <h3 class="box-title">Müşteri Yorumları</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>Profil Resmi</th>
                            <th>İsim Soyisim</th>
                            <th>Meslek</th>
                            <th>Açıklama</th>
                            <th>Oylama</th>
                            <th>İşlem</th>
                        </tr>
                        @foreach($customer_feedbacks as $item)
                            <tr>
                                <td><img src="{{$item['profile_image']}}" width="75px"></td>
                                <td>{{$item['name_surname']}}</td>
                                <td>{{$item['job']}}</td>
                                <td>{{strlen($item['description']) > 50 ? substr($item['description'],0,50).'..' : $item['description'] }}</td>
                                <td>{{$item['star']}}</td>
                                <td><a href="/admin/update-customer-feedbacks/{{$item['id']}}"
                                       class="btn btn-xs btn-primary">Düzenle</a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                            data-target="#modal-danger{{$item['id']}}">
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
                                            <p>adlı Müşteri yorumunu silmek istediğinizden emin misiniz?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left"
                                                    data-dismiss="modal">İptal
                                            </button>
                                            <a class="btn btn-outline pull-left"
                                               href="/admin/delete-agent/{{$item['id']}}">Evet, sil.</a>
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

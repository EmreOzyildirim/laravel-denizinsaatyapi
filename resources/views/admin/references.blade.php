@extends('admin.layouts.layout')
@section('page_title','Referanslarımız')


@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Referanslarımız</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>23
                            <th>Resim</th>
                            <th>Başlık</th>
                            <th>Açıklama</th>
                            <th>Danışman</th>
                            <th>Değerlendirme Tarihi</th>
                            <th>İşlem</th>
                        </tr>
                        @foreach($references['references'] as $reference)
                            <tr>
                                <td><img src="{{asset('images/references/'.$reference['image'])}}"
                                         alt="{{$reference['title']}}" width="100px"></td>
                                <td>{{strlen($reference['title']) > 26 ? substr($reference['title'],0,26).'...':$reference['title']}}</td>
                                <td>{{strlen($reference['description']) > 42 ? substr($reference['description'],0,42).'...':$reference['description']}}</td>
                                <td>{{strlen($reference['agent']) > 16 ? substr($reference['agent'],0,16).'...':$reference['agent']}}</td>
                                <td>{{$reference['created_at']}}</td>
                                <td>
                                    <a href="/admin/reference-details/{{$reference['id']}}" class="btn btn-xs btn-success">İncele</a>
                                    <a href="/admin/delete-reference/{{$reference['id']}}" class="btn btn-xs btn-danger">Sil</a>
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

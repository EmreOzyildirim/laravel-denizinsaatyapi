@extends('admin.layouts.layout')

@section('page_title','Sitenizden Gelenler Mesajlar')
@section('optional_description','Websitenizin iletişim sayfasında size gönderilmek üzere doldurulmuş formları buradan görebilir ve yönetebilirsiniz.')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Gelenler</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>Adı Soyadı</th>
                            <th>Telefon Numarası</th>
                            <th>Mesaj</th>
                            <th>Websitesi</th>
                            <th>Tarih</th>
                            <th>İşlem</th>
                        </tr>

                        @foreach($contact_forms as $item)
                            <tr>
                                <td>{{ strlen($item['name_surname']) > 15 ? substr($item['name_surname'],0,15).'..':$item['name_surname'] }}</td>
                                <td>{{ strlen($item['phone_number']) > 11 ? substr($item['phone_number'],0,11).'..':$item['phone_number'] }}</td>
                                <td>{{ strlen($item['message']) > 32 ? substr($item['message'],0,32).'..':$item['message'] }}</td>
                                <td>{{ strlen($item['website']) > 18 ? substr($item['website'],0,18).'..':$item['website'] }}</td>
                                <td>{{ $item['created_at'] }}</td>
                                <td>
                                    <a href="/admin/contact-form-detail/{{$item['id']}}" class="btn btn-xs btn-success">İncele</a>
                                    <a href="/admin/delete-contact-form/{{$item['id']}}" class="btn btn-xs btn-danger">Sil</a>
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

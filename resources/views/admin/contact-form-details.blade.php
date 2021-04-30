@extends('admin.layouts.layout')

@section('page_title','Mesaj')
@section('optional_description','Websitenizin iletişim sayfasında size gönderilmek üzere doldurulmuş formları buradan görebilir ve yönetebilirsiniz.')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Mesaj Detayı</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-read-info">
                        <h5>Gönderen: İletişim Formu
                            <span
                                class="mailbox-read-time pull-right">{{ date("Y-m-d H:i:s",strtotime($details['created_at'])) }}</span>
                        </h5>
                    </div>
                    <div class="mailbox-read-message">
                        <p>{{$details['message']}}</p>

                    </div>
                    <!-- /.mailbox-read-message -->
                </div>
                <div class="box-footer">
                    <a href="/admin/delete-contact-form/{{$details['id']}}" class="btn btn-default"><i class="fa fa-trash-o"></i> Sil</a>
                    <button type="button" class="btn btn-default" onclick="window.print()"><i class="fa fa-print"></i> Yazdır</button>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
@endsection

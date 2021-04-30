@extends('admin.layouts.layout')
@section('page_title','Referans Detayları')
@section('optional_description','Referans detaylarını buradan güncelleyebilir yada silebilirsiniz.')


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
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Referans Detayları</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="/admin/update-reference-detail" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="{{$reference_details->id}}" name="id" class="hidden">
                        @csrf
                        <div class="form-group">
                            <img src="{{asset('images/references/'.$reference_details->image_path)}}" alt="{{$reference_details->title}}" width="300px" id="image">
                        </div>
                        <div class="form-group">
                            <label for="image">Vitrin Resmi</label>
                            <input type="file" name="image">
                        </div>
                        <div class="form-group">
                            <label>Başlık</label>
                            <input type="text" name="title" class="form-control" placeholder="Başlık"
                                   value="{{$reference_details->title}}">
                        </div>
                        <div class="form-group">
                            <label>Açıklama</label>
                            <textarea class="form-control" rows="3" name="description"
                                      placeholder="Açıklama">{{$reference_details->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Select</label>
                            <select class="form-control" name="agent_id">
                                @foreach($agents as $agent)
                                    <option value="{{$agent['id']}}" {{$agent['id'] == $reference_details->agent_id ? ' selected' : '' }}>{{$agent['name_surname']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-success">Güncelle</button>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
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

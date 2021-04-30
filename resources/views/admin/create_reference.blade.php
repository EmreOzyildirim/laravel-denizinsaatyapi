@extends('admin.layouts.layout')
@section('page_title','Referans Ekle')

@section('optional_description','Buradan yeni bir referans ekleyebilirsiniz.')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Referans Detayları</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="/admin/create-reference" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">Vitrin Resmi</label>
                            <input type="file" name="image">
                        </div>
                        <div class="form-group">
                            <label>Başlık</label>
                            <input type="text" name="title" class="form-control" placeholder="Başlık">
                        </div>
                        <div class="form-group">
                            <label>Açıklama</label>
                            <textarea class="form-control" rows="3" name="description" placeholder="Açıklama"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Select</label>
                            <select class="form-control" name="agent_id">
                                @foreach($agents as $agent)
                                    <option value="{{$agent['id']}}">{{$agent['name_surname']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-success">Oluştur</button>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection

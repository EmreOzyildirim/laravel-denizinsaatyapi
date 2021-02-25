@extends('admin.layouts.layout')

@section('content')
    <div class="col-md-12">
        <div class="box box-solid">
            <section class="content" style="min-height: 0;">
                <div class="row">
                    <div class="col-md-12">
                        <img src="/backend/know-how/menu.PNG" width="100%">
                    </div>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.box -->
    </div>
    <!-- logo -->
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Ana Menü</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            {{$menu}}
                        </div>
                        <div class="col-md-6 field_wrapper">
                            <!---Buraya yeni eklenecek item için doldurulacak field lazimdir--->
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" id="submit" class="btn btn-default">Kaydet</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
    <!-- phone number ends -->
@endsection

@section('css')

@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@endsection

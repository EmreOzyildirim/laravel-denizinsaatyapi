@extends('admin.layouts.layout')
@section('head')

@endsection
@section('page_title','Danışman Bilgilerini Düzenle')
@section('optional_description','Seçtiğiniz danışman bilgilerini düzenleyebilirsiniz')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Danışman Düzenle</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="/admin/update-agent" class="form-horizontal" method="POST">
                    @csrf
                    <input type="text" name="id" value="{{$agent['id']}}" hidden>
                    <div class="box-body"><!----
                    <div class="form-group">
                        <label for="logo" class="col-sm-2 control-label">Logo</label>
                        <div class="col-sm-10">
                            <img src="" width="180px">
                            <input type="file" name="logo" class="form-control" id="logo" placeholder="Logo">
                        </div>
                    </div>---->
                        <div class="form-group">
                            <label for="agent_image" class="col-sm-2 control-label">Danışman Resmi</label>

                            <div class="col-sm-10">
                                <img src="{{asset('images/agents/'.$agent['profile_image'])}}" width="200px" alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name_surname" class="col-sm-2 control-label">Danışman Adı</label>

                            <div class="col-sm-10">
                                <input type="text" name="name_surname" class="form-control" id="name_surname"
                                       value="{{$agent['name_surname']}}"
                                       placeholder="Danışman adını girin">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Ünvan</label>

                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" id="title"
                                       value="{{$agent['title']}}"
                                       placeholder="https://www.denizinsaatyapi.com sonrasında görünecek dizini girin">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="email"
                                       value="{{$agent['email']}}"
                                       placeholder="Email girin">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="facebook" class="col-sm-2 control-label">Facebook Hesabı</label>

                            <div class="col-sm-10">
                                <input type="text" name="facebook" class="form-control" id="facebook"
                                       value="{{$agent['facebook']}}"
                                       placeholder="Facebook hesabınızı başında domain adı olmadan girin. Örnek: muratkarakaya546">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="twitter" class="col-sm-2 control-label">Twitter Hesabı</label>

                            <div class="col-sm-10">
                                <input type="text" name="facebook" class="form-control" id="twitter"
                                       value="{{$agent['twitter']}}"
                                       placeholder="Twitter hesabınızı başında domain adı olmadan girin. Örnek: muratkarakaya546">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone_number" class="col-sm-2 control-label">GSM Telefon</label>

                            <div class="col-sm-10">
                                <input type="text" name="phone_number" class="form-control" id="phone_number"
                                       value="{{$agent['phone_number']}}"
                                       placeholder="GSM Telefon numarası girin" maxlength="12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Biyografi</label>

                            <div class="col-sm-10">
                            <textarea name="description" id="description" class="form-control"
                                      rows="10">{{$agent['description']}}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default">Kaydet</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
    <!-- phone number ends -->
@endsection

<?php
$find_browser = 'Firefox';

$agent_browser = $_SERVER['HTTP_USER_AGENT'];

if (strpos($agent_browser, $find_browser) !== false) {
    $fire = '/*firefox number arrow hiddener */ input[type=number] { -webkit-appearance: none; } ';
} ?>
@section('css')
    <style type="text/css">
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        <?php echo isset($fire) ? $fire : '' ?>
    </style>
@endsection
@section('js')
    <script>

    </script>
@endsection

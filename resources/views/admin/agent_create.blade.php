@extends('admin.layouts.layout')
@section('head')

@endsection
@section('page_title','Danışman Ekle')
@section('optional_description','Buradan yeni bir danışman ekleyebilirsiniz.')

@section('content')
<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Danışman Ekle</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="/admin/create-agent" class="form-horizontal" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="logo" class="col-sm-2 control-label">Danışman Resmi</label>
                    <div class="col-sm-10">
                        <div id="image_preview"></div>
                        <img id="agent_image" src="" width="180px">
                        <input type="file" class="form-control" placeholder="Logo" name="profile_image" id="profile_image">
                        @error('logo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="name_surname" class="col-sm-2 control-label">Danışman Adı</label>
                    <div class="col-sm-10">
                        <input type="text" name="name_surname" class="form-control" id="name_surname"
                               placeholder="Danışman adını girin">
                        @error('name_surname')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Ünvan</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title"
                               placeholder="Ünvan (örnek: Danışman)">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" id="email"
                               value=""
                               placeholder="Email girin">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="facebook" class="col-sm-2 control-label">Facebook Hesabı</label>

                    <div class="col-sm-10">
                        <input type="text" name="facebook" class="form-control" id="facebook"
                               value=""
                               placeholder="Facebook hesabınızın linkini domain adı olmadan girin. Örnek: muratkarakaya546">
                        @error('facebook')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="twitter" class="col-sm-2 control-label">Twitter Hesabı</label>
                    <div class="col-sm-10">
                        <input type="text" name="twitter" class="form-control" id="twitter"
                               value=""
                               placeholder="Twitter hesabınızın linkini domain adı olmadan girin. Örnek: muratkarakaya546">
                        @error('twitter')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone_number" class="col-sm-2 control-label">GSM Telefon</label>

                    <div class="col-sm-10">
                        <input type="text" name="phone_number" class="form-control" id="phone_number"
                               value=""
                               placeholder="GSM Telefon numarası girin" maxlength="12">
                        @error('phone_number')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Biyografi</label>

                    <div class="col-sm-10">
                            <textarea name="description" id="description" class="form-control"
                                      placeholder="Danışmanla ilgili bilgiler, eğitim, deneyim vs."
                                      rows="10"></textarea>
                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
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
        <?php echo isset($fire) ? $fire : ''; ?>
    </style>
@endsection
@section('js')
    <script>
        //upload the image gallery.............
        $("#profile_image").change(function () {
            $('#image_preview').html("");
            $('#agent_image').hide();
            var total_file = document.getElementById("profile_image").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' width=\"200px\" />");
            }

        });
    </script>
@endsection

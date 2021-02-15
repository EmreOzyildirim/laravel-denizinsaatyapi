@extends('admin.layouts.layout')
@section('page_title','Sosyal Medya Hesapları')
@section('optional_description','Buradan websitenizde görünecek olan sosyal medya linklerinizi paylaşabilirsiniz.')
@section('head')
    @csrf
@endsection
@section('content')
    <div class="col-md-12">
        <div class="box box-solid">
            <section class="content" style="min-height: 0;">
                <div class="row">
                    <div class="col-md-12">
                        <img src="/backend/know-how/social_1.PNG" width="20%">
                    </div>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.box -->
    </div>
    @if(session('message'))
        <div class="modal modal-{{session('status') === true ? 'success':'danger'}} fade in" id="modal-{{session('status') === false ? 'success':'danger'}}"
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
    <!-- logo -->
    <div class="col-md-12">
        <div class="box default">
            <div class="box-header with-border">
                <h3 class="box-title">Sosyal Medya Hesapları</h3>
            </div>
            <form action="/admin/social-media" class="form-horizontal" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="facebook_url" class="col-sm-2 control-label">Facebook</label>

                        <div class="col-sm-10">
                            <input type="text" name="facebook_url" class="form-control" id="facebook_url"
                                   value="{{isset($social_media['facebook_url']) ? $social_media['facebook_url'] : ''}}"
                                   placeholder="Facebook">
                        </div>
                        @error('facebook_url')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="twitter_url" class="col-sm-2 control-label">Twitter</label>

                        <div class="col-sm-10">
                            <input type="text" name="twitter_url" class="form-control" id="twitter_url"
                                   value="{{isset($social_media['twitter_url']) ? $social_media['twitter_url'] : ''}}"
                                   placeholder="Twitter">
                        </div>
                        @error('twitter_url')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="instagram_url" class="col-sm-2 control-label">Instagram</label>

                        <div class="col-sm-10">
                            <input type="text" name="instagram_url" class="form-control" id="instagram_url"
                                   value="{{isset($social_media['instagram_url']) ? $social_media['instagram_url'] : ''}}"
                                   placeholder="Instagram">
                        </div>
                        @error('instagram_url')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="youtube_url" class="col-sm-2 control-label">Youtube</label>

                        <div class="col-sm-10">
                            <input type="text" name="youtube_url" class="form-control" id="youtube_url"
                                   value="{{isset($social_media['youtube_url']) ? $social_media['youtube_url'] : ''}}"
                                   placeholder="Youtube">
                        </div>
                        @error('youtube_url')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="linkedin_url" class="col-sm-2 control-label">LinkedIn</label>

                        <div class="col-sm-10">
                            <input type="text" name="linkedin_url" class="form-control" id="linkedin_url"
                                   value="{{isset($social_media['linkedin_url']) ? $social_media['linkedin_url'] : ''}}"
                                   placeholder="LinkedIn">
                        </div>
                        @error('youtube_url')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-default" type="submit">Kaydet</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('css')

@endsection
@section('js')
    <script>
        $(window).ready(function(){
            setInterval(function(){
                $('.modal').addClass("hidden")
            }, 2000);

        });
    </script>
@endsection

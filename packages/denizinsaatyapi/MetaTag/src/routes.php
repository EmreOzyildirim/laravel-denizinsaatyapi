<?php


//ServiceProvider Testing
Route::get('meta-tags',function(){
    echo "hi, from serviceprovider :)";
});

Route::get('meta-tag/{name}/{content}','denizinsaatyapi\MetaTag\MetaTagController@meta_tag');

Route::get('toplama/{a}/{b}','denizinsaatyapi\MetaTag\MetaTagController@toplama');
Route::get('cikarma/{a}/{b}','denizinsaatyapi\MetaTag\MetaTagController@cikarma');

<?php
use Illuminate\support\Facades\Config;


function get_language(){
    // App\Models\Language::where('active',1)->select('id','name','abbr','direction','active')-get();
        //or
    App\Models\Language::active()->selection()->get();
}

function get_language_deafult(){
    return Config::get('app.locale');
}
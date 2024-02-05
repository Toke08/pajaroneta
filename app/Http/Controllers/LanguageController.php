<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{

    //locale ---> es, eu, en...
    function setLanguage($locale){

        //\App::setLocale($locale);
        //Crear cookie (SERVIDOR)
        $cookie = cookie('locale', $locale,60*24*30);//un mes
        return back()->withCookie($cookie);

    }
}

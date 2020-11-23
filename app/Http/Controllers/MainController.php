<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function lang($lang)
    {
        if(Language::where('lang', $lang)->count() > 0) {
            setLang($lang);
        }
        return back();
    }
}

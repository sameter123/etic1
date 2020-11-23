<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
      return view('back.uye-listele');
    }


    public function profil_duzenle()
    {
      return view('back.profil-duzenle');
    }

    public function sifre_guncelle()
    {
      return view('back.sifre-guncelleme');
    }
}

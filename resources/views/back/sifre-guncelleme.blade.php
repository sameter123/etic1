@extends('back.layouts.app')
@section('css')

@endsection
@section('body')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">Şifre Güncelleme</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('panel')}}">@lang('admin.anasayfa')</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Şifre Güncelleme
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-md-center">
  <div class="col-md-9">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="horz-layout-card-center">Profil Düzenle</h4>
        <p>Şifrenizi bu sayfadan güncelleyebilirsiniz.
        </p>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
          <ul class="list-inline mb-0">
            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
            <li><a data-action="close"><i class="ft-x"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="card-content collpase show">
        <!--  <div class="card-body">
        <div class="card-text">
            <p>Profilinizi bu sayfadan düzenleyebilirsiniz.
            </p>
       </div>  -->
          <form id="sifreguncelle" class="form form-horizontal" method="post">
            <div class="form-body">
              <div class="form-group row">
                <label class="col-md-3 label-control" for="eventRegInput2">Güncel Şifreniz</label>
                <div class="col-md-7">
                  <input type="password" id="eventRegInput2" class="form-control" placeholder="Güncel Şifreniz" name="sifreguncel">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 label-control" for="eventRegInput1">Yeni Şifreniz</label>
                <div class="col-md-7">
                  <input type="password" id="sifre1" class="form-control" placeholder="Yeni Şifreniz" name="sifreg1">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 label-control" for="eventRegInput2">Yeni Şifreniz Tekrar</label>
                <div class="col-md-7">
                  <input type="password" id="sifre2" class="form-control" placeholder="Yeni Şifreniz Tekrar" name="sifreg1">
                </div>
              </div>
            </div>
            <div class="form-actions center">
              <button type="submit" class="btn btn-primary">
                <i class="la la-check-square-o"></i> GÜNCELLE
              </button>
            </div>
          </form>
        </div>
      </div>
      </div>
      </div>
                 @endsection

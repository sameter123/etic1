@extends('back.layouts.app')
@section('css')

@endsection
@section('body')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">Profil Düzenleme</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('panel')}}">@lang('admin.anasayfa')</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Profil Düzenleme
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
        <p>Profilinizi bu sayfadan düzenleyebilirsiniz.
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
          <form class="form form-horizontal">
            <div class="form-body">
              <div class="form-group row">
                <label class="col-md-3 label-control" for="eventRegInput1">İsim</label>
                <div class="col-md-7">
                  <input type="text" id="eventRegInput1" class="form-control" placeholder="isim" name="isim">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 label-control" for="eventRegInput2">Soyisim</label>
                <div class="col-md-7">
                  <input type="text" id="eventRegInput2" class="form-control" placeholder="Soyisim" name="soyisim">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 label-control" for="eventRegInput3">E-posta</label>
                <div class="col-md-7">
                  <input type="email" id="eventRegInput3" class="form-control" placeholder="E-posta"
                  name="email">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 label-control" for="eventRegInput4">Telefon Numarası</label>
                <div class="col-md-7">
                  <input type="tel" id="eventRegInput4" class="form-control" placeholder="Telefon Numarası"
                  name="telefon">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 label-control">Profil Fotoğrafı Yükle</label>
                <div class="col-md-7">
                  <div class="input-group">
                    <div class="d-inline-block custom-control custom-radio mr-1">
                    </div>
                    <div class="d-inline-block custom-control custom-radio">
                      <input style="background-color: white;" type="FILE" name="ppfoto">
                    <!--  <label type="FILE" class="btn btn-warning mr-1">
                       Fotoğraf Yükle
                     </label>-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-actions center">
              <button type="submit" class="btn btn-primary">
                <i class="la la-check-square-o"></i> Kaydet
              </button>
            </div>
          </form>
  </div>
  </div>
    </div>
      </div>
                 @endsection

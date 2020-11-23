<?php
use App\Models\Settings;
use App\Models\Language;
use App\Models\Notify;
setlocale(LC_TIME, "turkish"); //başka bir dil içinse burada belirteceksin.
setlocale(LC_ALL,'turkish'); //başka bir dil içinse burada belirteceksin.
?>
<body class="horizontal-layout horizontal-menu 2-columns @if(getUrl() == route('diller')) content-detached-left-sidebar @endif   menu-expanded" data-open="hover"
      data-menu="horizontal-menu"  @if(getUrl() == route('diller')) data-col="content-detached-left-sidebar" @else data-col="2-columns" @endif>
<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-dark navbar-brand-center">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="{{route('panel')}}">
                        <img class="brand-logo" alt="Ifeelcode Logo" src="{{env('ROOT')}}public/ifc/logo_siyah.png">
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                    <li class="dropdown nav-item mega-dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">IFC</a>
                        <ul class="mega-dropdown-menu dropdown-menu row">
                            <li class="col-md-2">
                                <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-newspaper-o"></i> Haberler</h6>
                                <div id="mega-menu-carousel-example">
                                    <div>
                                        <img class="rounded img-fluid mb-1" src="{{env('BACK')}}app-assets/images/slider/slider-2.png"
                                             alt="First slide"><a class="news-title mb-0" href="#">Poster Frame PSD</a>
                                        <p class="news-content">
                                            <span class="font-small-2">January 26, 2018</span>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-3">
                                <h6 class="dropdown-menu-header text-uppercase"><i class="la la-random"></i> Hızlı Erişim Menüsü</h6>
                                <ul class="drilldown-menu">
                                    <li class="menu-list">
                                        <ul>
                                            <li>
                                                <a class="dropdown-item" href="/"><i class="ft-mail"></i> E-posta Gönder</a>
                                            </li>
                                            <li><a class="dropdown-item" href="/"><i class="ft-phone"></i> Telefonla Ara</a></li>
                                            <li><a class="dropdown-item" href="/"><i class="ft-minimize-2"></i> Güncelleme Notları</a></li>
                                            <li>
                                                <a class="dropdown-item" href="/"><i class="la la-life-ring"></i> Müşteri Hizmetleri</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="col-md-3">
                                <h6 class="dropdown-menu-header text-uppercase"><i class="la la-list-ul"></i>SSS</h6>
                                <div id="accordionWrap" role="tablist" aria-multiselectable="true">
                                    <div class="card border-0 box-shadow-0 collapse-icon accordion-icon-rotate">
                                        <div class="card-header p-0 pb-2 border-0" id="headingOne" role="tab">
                                            <a data-toggle="collapse" data-parent="#accordionWrap" href="#accordionOne" aria-expanded="true" aria-controls="accordionOne">Müşteri Hizmetlerine Nasıl Ulaşabilirim</a></div>
                                        <div class="card-collapse collapse show" id="accordionOne" role="tabpanel" aria-labelledby="headingOne"
                                             aria-expanded="true">
                                            <div class="card-content">
                                                <p class="accordion-text text-small-3">
                                                    Müşteri hizmetlerine ulaşmak için bizi telefonla arayabilir, e-posta gönderebilir veya iletişim formunu doldurarak bize ulaşabilirsiniz.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card-header p-0 pb-2 border-0" id="headingTwo" role="tab">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionWrap" href="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                                                Bir Sorun Yaşıyorum
                                            </a>
                                        </div>
                                        <div class="card-collapse collapse" id="accordionTwo" role="tabpanel" aria-labelledby="headingTwo"
                                             aria-expanded="false">
                                            <div class="card-content">
                                                <p class="accordion-text">
                                                    Yaşadığınız sorunu bize ulaşarak iletebilirsiniz, teknik destek ekibimiz sorununuzun çözümü için size yardımcı olacaktır.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-4">
                                <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-envelope-o"></i> Bize Ulaşın</h6>
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 form-control-label" for="inputName1">Adınız</label>
                                            <div class="col-sm-9">
                                                <div class="position-relative has-icon-left">
                                                    <input class="form-control" type="text" id="inputName1" name="name" value="{{Auth::user()->name}}">
                                                    <div class="form-control-position pl-1"><i class="la la-user"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 form-control-label" for="inputEmail1">Email</label>
                                            <div class="col-sm-9">
                                                <div class="position-relative has-icon-left">
                                                    <input class="form-control" type="email" id="inputEmail1" name="email" value="{{Auth::user()->email}}">
                                                    <div class="form-control-position pl-1"><i class="la la-envelope-o"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 form-control-label" for="inputMessage1">Mesajınız</label>
                                            <div class="col-sm-9">
                                                <div class="position-relative has-icon-left">
                                                    <textarea class="form-control" id="inputMessage1" rows="2"></textarea>
                                                    <div class="form-control-position pl-1"><i class="la la-commenting-o"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 mb-1">
                                                <button class="btn btn-info float-right" type="button"><i class="la la-paper-plane-o"></i> Gönder </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="mr-1">
                              <span class="user-name text-bold-700">{{Auth::user()->name ." " . Auth::user()->last_name}}</span>
                            </span>
                            <span class="avatar avatar-online">
                                <img src="{{env('AVATAR')}}{{Auth::user()->avatar}}" alt="avatar"><i></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{env('ROOT')}}panel/profil-duzenle"><i class="ft-user"></i> Profili Düzenle</a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{env('ROOT')}}panel/sifre-guncelle"><i class="ft-lock"></i> Şifre Güncelle</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="{{route('cikis')}}"><i class="ft-power"></i> Çıkış Yap</a>
                        </div>
                    </li>
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="{{route('lang', getLang())}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon flag-icon-{{getLang()}}"></i><span class="selected-language"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            @foreach(Language::whereNull('deleted_at')->get() as $u)
                            <a class="dropdown-item" href="{{route('lang', $u->lang)}}"><i class="flag-icon flag-icon-{{$u->lang}}"></i> {{$u->langName}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                            <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">{{Notify::where('user_id', '0')->orWhere('user_id', Auth::user()->id)->where('is_read', '0')->count()}}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">Bildirimler</span>
                                </h6>
                                <span class="notification-tag badge badge-default badge-danger float-right m-0">{{Notify::where('user_id', '0')->orWhere('user_id', Auth::user()->id)->where('is_read', '0')->count()}}</span>
                            </li>
                            <li class="scrollable-container media-list w-100">
                                @foreach(Notify::where('user_id', '0')->orWhere('user_id', Auth::user()->id)->where('is_read', '0')->get() as $u)
                                <a href="{{$u->link}}">
                                    <div class="media">
                                        <div class="media-left align-self-center"><i class="ft-info icon-bg-circle bg-{{$u->type}}"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">{{$u->title}}</h6>
                                            <p class="notification-text font-small-3 text-muted">{{$u->text}}</p>
                                            <small>
                                                <time class="media-meta text-muted">
                                                    {{iconv('latin5','utf-8',strftime(' %d %B %Y %H:%M',strtotime($u->created_at)))}}
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                @endforeach

                            </li>
                            <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Tüm Bildirimleri Görüntüle</a></li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-notification nav-item">
                        <a id="update-control" class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                            <i id="update-control-spinner" class="ficon ft-refresh-ccw"></i>
                        </a>
                    </li>
                    <script>
                        $( "#update-control" ).click(function() {
                            $("#update-control-spinner").addClass('spinner');
                            $.ajax({
                                url : '{{env('ROOT')}}getFile.php',
                                data : { filename : 'http://dev.ifeelcode.com/api/versions/version.txt'},
                                success : function (r) {
                                    if(r == '{{Settings::first()->version}}' ) {
                                        toastr.success('Şu anda e-ticaret sisteminiz en son sürüm olan {{Settings::first()->version}} sürümünü kullanmaktadır.',
                                            'Güncel Yazılım',
                                            {
                                                "progressBar": true,
                                                positionClass: 'toast-top-left',
                                                "hideDuration": 5000
                                            }
                                        );
                                        setTimeout(
                                            function()
                                            {
                                                $("#update-control-spinner").removeClass('spinner');
                                            }, 1000);

                                    } else {
                                        var gelen = r;

                                        toastr.warning('Şu anda e-ticaret sisteminiz {{Settings::first()->version}} sürümünü kullanmaktadır fakat son sürüm '+gelen+' sürümüdür. Lütfen Güncelleyin.',
                                            'Güncel Olmayan Yazılım',
                                            {
                                                "progressBar": true,
                                                positionClass: 'toast-top-right',
                                                "hideDuration": 5000
                                            }
                                        );
                                        setTimeout(
                                            function()
                                            {
                                                $("#update-control-spinner").removeClass('spinner');
                                            }, 4000);

                                    }
                                }
                            })
                        });
                    </script>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow"
     role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="dropdown nav-item" data-menu="dropdown">
                <a class="dropdown-toggle nav-link" href="index.html" data-toggle="dropdown"><i class="la la-home"></i>
                    <span>Dashboard</span>
                </a>
                <ul class="dropdown-menu">
                    <li data-menu=""><a class="dropdown-item" href="dashboard-ecommerce.html" data-toggle="dropdown">eCommerce</a>
                    </li>
                    <li data-menu=""><a class="dropdown-item" href="dashboard-crypto.html" data-toggle="dropdown">Crypto</a>
                    </li>
                    <li data-menu=""><a class="dropdown-item" href="dashboard-sales.html" data-toggle="dropdown">Sales</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(getUrl() == route('diller')) active @endif" href="{{route('diller')}}">
                    <i class="la la-language"></i>
                    <span>Diller</span>
                </a>
            </li>
            <li class="dropdown nav-item" data-menu="dropdown">
                <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-dashcube"></i>
                    <span>Site Yönetimi</span>
                </a>
                <ul class="dropdown-menu">
                    <li data-menu=""><a class="dropdown-item" href="{{route('uyeler')}}" data-toggle="dropdown">Üyeler</a>
                    </li>
                    <li data-menu=""><a class="dropdown-item" href="dashboard-crypto.html" data-toggle="dropdown">Crypto</a>
                    </li>
                    <li data-menu=""><a class="dropdown-item" href="dashboard-sales.html" data-toggle="dropdown">Sales</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
<div class="app-content content">
    <div class="content-wrapper">

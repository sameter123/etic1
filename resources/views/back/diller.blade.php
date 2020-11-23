@extends('back.layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{env('BACK')}}app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #e34724;
        }

        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }

        table.table td .add {
            display: none;
        }
    </style>
    <script src="{{env('BACK')}}app-assets/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
    <script src="{{env('BACK')}}app-assets/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{env('BACK')}}app-assets/vendors/css/forms/selects/select2.min.css">
@endsection
@section('body')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">@lang('admin.diller')</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('panel')}}">@lang('admin.anasayfa')</a>
                        </li>
                        <li class="breadcrumb-item active">
                            @lang('admin.diller')
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-detached content-right">
        <div class="content-body">
            <!-- Description -->
            <section id="descriptioin" class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('admin.diller')</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="card-text">
                            <p>


                            <div class="table-responsive">
                                <table id="users-contacts"
                                       class="zero-configuration1 table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                    <thead>
                                    <tr>
                                        <th>Ayraç</th>
                                        <th>Karşılık</th>
                                        <th>#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $gelenler = include 'resources/lang/tr/admin.php';
                                    ?>
                                    @foreach($gelenler as $u=>$value)
                                        <tr>
                                            <td id="not">{{$u}}</td>
                                            <td>{{$value}}</td>
                                            <td>
                                                <a class="add" title="Kaydet" data-toggle="tooltip"><i
                                                        class="material-icons">&#xE03B;</i></a>
                                                <a class="edit" title="Düzenle" data-toggle="tooltip"><i
                                                        class="material-icons">&#xE254;</i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Ayraç</th>
                                        <th>Karşılık</th>
                                        <th>#</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Description -->
        </div>
    </div>
    <div class="sidebar-detached sidebar-left sidebar-sticky">
        <div class="sidebar">
            <div class="bug-list-sidebar-content">
                <!-- Predefined Views -->
                <div class="card">
                    <div class="card-head ml-1 mt-1 mb-1">
                        <h2>Diller</h2>
                    </div>
                    <div class="card-body">

                        <ul class="list-group">
                            @foreach(DB::table('langs')->whereNull('deleted_at')->get() as $u)
                                <li class="list-group-item" data-lang="{{$u->lang}}">
                                    <span
                                        data-toggle="modal"
                                        data-target="#dilDuzenle{{$u->id}}"
                                    >
                                    {{$u->langName}} - {{$u->lang}}
                                </span>
                                    @if(DB::table('langs')->whereNull('deleted_at')->count() < 2)
                                        <button id="delete-confirm{{$u->id}}"
                                                class="btn btn-outline-danger btn-sm float-right"><i class="ft-x"></i>
                                        </button>
                                        <script>
                                            $(document).ready(function () {
                                                $('#delete-confirm{{$u->id}}').on('click', function () {
                                                    swal({
                                                        title: "Dil Silme",
                                                        text: "{{$u->langName}} - Dil silinecektir. Onaylıyor musunuz?",
                                                        icon: "warning",
                                                        buttons: {
                                                            cancel: {
                                                                text: "Hayır",
                                                                value: null,
                                                                visible: true,
                                                                className: "btn-outline-success",
                                                                closeModal: false,
                                                            },
                                                            confirm: {
                                                                text: "Evet",
                                                                value: true,
                                                                visible: true,
                                                                className: "btn-outline-danger",
                                                                closeModal: false
                                                            }
                                                        }
                                                    }).then(isConfirm => {
                                                        if (isConfirm) {
                                                            $.ajaxSetup({
                                                                headers: {
                                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                }
                                                            });
                                                            $.post("{{route('diller_post')}}", {
                                                                id: '{{$u->id}}',
                                                                sil: '1',
                                                                lang: '{{$u->lang}}'
                                                            }, function (data) {
                                                                if (data == 1) { //başarılı
                                                                    $('*[data-lang="{{$u->lang}}"]').remove();
                                                                    toastr.success('Dil silme işleminiz başarılı',
                                                                        'Başarılı',
                                                                        {
                                                                            "progressBar": true,
                                                                            positionClass: 'toast-top-right',
                                                                            "hideDuration": 1000
                                                                        }
                                                                    );

                                                                } else { //başarısız

                                                                }
                                                            });
                                                            swal("Başarılı", "Silme işlemi başarılı", "success");
                                                        } else {
                                                            swal("Dikkat", "Silme işlemi iptal edildi...", "error");
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--/ Groups-->
                    <!--More-->
                    <div class="card-body ">
                        <p class="lead">Yeni Dil Ekle</p>

                        <form method="post" action="{{route('diller_post')}}" class="form" autocomplete="off">
                            @csrf
                            <div class="form-body">

                                <div class="form-group">
                                    <div class="position-relative has-icon-left">
                                        <select class="form-control select2" name="lang" required>
                                            <option value="0" disabled selected>Dil Seçin</option>
                                            @foreach(DB::table('languages')->get() as $u)
                                                @if(DB::table('langs')->where('lang', $u->iso_639_1)->whereNull('deleted_at')->count() < 1)
                                                    <option value="{{$u->iso_639_1}}">{{$u->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="position-relative has-icon-left">
                                        <select class="form-control select2" name="copyLang" required>
                                            <option value="0" disabled selected>Kopyalanacak Dili Seçin</option>
                                            @foreach(DB::table('langs')->whereNull('deleted_at')->get() as $u)
                                                <option value="{{$u->lang}}">{{$u->langName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions right">
                                <input type="hidden" name="ekle" value="1">
                                <button type="submit" class="btn btn-outline-primary">
                                    <i class="la la-check-square-o"></i> Kaydet
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{env('BACK')}}app-assets/vendors/js/extensions/jquery.raty.js" type="text/javascript"></script>
    <script src="{{env('BACK')}}app-assets/vendors/js/extensions/nouislider.min.js" type="text/javascript"></script>
    <script src="{{env('BACK')}}app-assets/js/scripts/pages/content-sidebar.js" type="text/javascript"></script>
    <script src="{{env('BACK')}}app-assets/vendors/js/tables/datatable/datatables.min.js"
            type="text/javascript"></script>
    <script src="{{env('BACK')}}app-assets/js/scripts/tables/datatables/datatable-basic.js"
            type="text/javascript"></script>
    <script src="{{env('BACK')}}app-assets/js/scripts/extensions/toastr.js" type="text/javascript"></script>
    <script src="{{env('BACK')}}app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
    <script src="{{env('BACK')}}app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.zero-configuration1').DataTable({
                columnDefs: [{orderable: false, targets: [2]}],
                pageLength: 10,
                "order": [[0, "desc"]],
                "language": {
                    "decimal": "",
                    "emptyTable": "Henüz hiç veri yok.",
                    "info": "_TOTAL_ adet veri içinden _START_ - _END_ arası gösteriliyor",
                    "infoEmpty": "Toplamda 0 veri var.",
                    "infoFiltered": "(_MAX_ adet veri içinde arama yapılıyor)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "_MENU_ veri gösteriliyor",
                    "loadingRecords": "Yükleniyor...",
                    "processing": "İşleniyor...",
                    "search": "Ara:",
                    "zeroRecords": "Eşleşen veri bulunamadı",
                    "paginate": {
                        "first": "İlk",
                        "last": "Son",
                        "next": "Sonraki",
                        "previous": "Önceki"
                    },
                }
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("table td:last-child").html();

            // Add row on add button click
            $(document).on("click", ".add", function () {
                var empty = false;
                var input = $(this).parents("tr").find('input[type="text"]');

                var key;
                var value;

                var i = 0;

                input.each(function () {
                    if (!$(this).val()) {
                        $(this).addClass("error");
                        empty = true;
                    } else {
                        if (i == 0) {
                            key = $(this).val();
                        } else {
                            value = $(this).val();
                        }
                        i = i + 1;
                        $(this).removeClass("error");
                    }
                    $.ajax({
                        url: '{{env('ROOT')}}resources/lang/update.php',
                        data: {filename: 'admin.php', key: key, value: value, lang: '<?=getLang()?>'},
                        success: function (r) {
                            if (r == '1') {
                                toastr.success('Dil düzenlemeniz başarıyla kaydedildi.',
                                    'Başarılı',
                                    {
                                        "progressBar": true,
                                        positionClass: 'toast-top-right',
                                        "hideDuration": 1000
                                    }
                                );

                            } else if (r == '0') {
                                toastr.warning('Dil düzenlemeniz kaydedilirken bir hata meydana geldi.',
                                    'Hata!',
                                    {
                                        "progressBar": true,
                                        positionClass: 'toast-top-right',
                                        "hideDuration": 1000
                                    }
                                );
                            }
                        }
                    })
                });
                $(this).parents("tr").find(".error").first().focus();
                if (!empty) {
                    input.each(function () {
                        $(this).parent("td").html($(this).val());
                    });
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").removeAttr("disabled");
                }
            });
            // Edit row on edit button click
            $(document).on("click", ".edit", function () {
                $(this).parents("tr").find("td:not(:last-child)").each(function () {
                    if ($(this)[0].id == 'not') {
                        $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '" readonly>');
                    } else {
                        $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
                    }

                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").attr("disabled", "disabled");
            });
        });
    </script>

@endsection

@extends('back.layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{env('BACK')}}app-assets/vendors/css/tables/datatable/datatables.min.css">
@endsection
@section('body')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Üyeler</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('panel')}}">@lang('admin.anasayfa')</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Üyeler
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
                    <h4 class="card-title">Üyeler</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="card-text">
                            <p>

                            <div class="table-responsive">
                                <table id="users-contacts" class="zero-configuration1 table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                    <thead>
                                    <tr>
                                        <th>Adı - Soyadı</th>
                                        <th>E-postası</th>
                                        <th>Kayıt Tarihi</th>
                                        <th>Yetki</th>
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
                                            <a class="add" title="Kaydet" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                            <a class="edit" title="Düzenle" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
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
            <div class="sidebar-content card d-none d-lg-block">
                <div class="card-body">

                    <div class="category-title pb-1">
                        <h6>Card example</h6>
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
    <script src="{{env('BACK')}}app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
    <script src="{{env('BACK')}}app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.zero-configuration1').DataTable( {
                columnDefs: [ { orderable: false, targets: [ 2 ] } ],
                pageLength: 10,
                "order": [[ 0, "desc" ]],
                "language": {
                    "decimal":        "",
                    "emptyTable":     "Henüz hiç veri yok.",
                    "info":           "_TOTAL_ adet veri içinden _START_ - _END_ arası gösteriliyor",
                    "infoEmpty":      "Toplamda 0 veri var.",
                    "infoFiltered":   "(_MAX_ adet veri içinde arama yapılıyor)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "_MENU_ veri gösteriliyor",
                    "loadingRecords": "Yükleniyor...",
                    "processing":     "İşleniyor...",
                    "search":         "Ara:",
                    "zeroRecords":    "Eşleşen veri bulunamadı",
                    "paginate": {
                        "first":      "İlk",
                        "last":       "Son",
                        "next":       "Sonraki",
                        "previous":   "Önceki"
                    },
                }
            } );
        } );
    </script>


    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("table td:last-child").html();

            // Add row on add button click
            $(document).on("click", ".add", function(){
                var empty = false;
                var input = $(this).parents("tr").find('input[type="text"]');

                var key;
                var value;

                var i = 0;

                input.each(function(){
                    if(!$(this).val()){
                        $(this).addClass("error");
                        empty = true;
                    } else {
                        if(i == 0) {
                            key = $(this).val();
                        } else {
                            value = $(this).val();
                        }
                        i = i +1;
                        $(this).removeClass("error");
                    }
                    $.ajax({
                        url : '{{env('ROOT')}}resources/lang/update.php',
                        data : { filename : 'admin.php', key : key, value : value, lang: '<?=getLang()?>' },
                        success : function (r) {
                            if(r == '1' ) {
                                toastr.success('Dil düzenlemeniz başarıyla kaydedildi.',
                                    'Başarılı',
                                    {
                                        "progressBar": true,
                                        positionClass: 'toast-top-right',
                                        "hideDuration": 1000
                                    }
                                );
                                setTimeout(
                                    function()
                                    {
                                        $("#update-control-spinner").removeClass('spinner');
                                    }, 1000);

                            } else if (r == '0') {
                                toastr.warning('Dil düzenlemeniz kaydedilirken bir hata meydana geldi.',
                                    'Hata!',
                                    {
                                        "progressBar": true,
                                        positionClass: 'toast-top-right',
                                        "hideDuration": 1000
                                    }
                                );
                                setTimeout(
                                    function()
                                    {
                                        $("#update-control-spinner").removeClass('spinner');
                                    }, 1000);
                            }
                        }
                    })
                });
                $(this).parents("tr").find(".error").first().focus();
                if(!empty){
                    input.each(function(){
                        $(this).parent("td").html($(this).val());
                    });
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").removeAttr("disabled");
                }
            });
            // Edit row on edit button click
            $(document).on("click", ".edit", function(){
                $(this).parents("tr").find("td:not(:last-child)").each(function(){
                    if($(this)[0].id == 'not') {
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

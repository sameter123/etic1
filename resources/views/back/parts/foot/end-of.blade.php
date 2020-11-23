<!-- BEGIN VENDOR JS-->
<script src="{{env('BACK')}}app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script type="text/javascript" src="{{env('BACK')}}app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script type="text/javascript" src="{{env('BACK')}}app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
<script src="{{env('BACK')}}app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
<script src="{{env('BACK')}}app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js"
        type="text/javascript"></script>
<script src="{{env('BACK')}}app-assets/vendors/js/extensions/toastr.min.js" type="text/javascript"></script>
<script src="{{env('BACK')}}app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
<script src="{{env('BACK')}}app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{env('BACK')}}app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="{{env('BACK')}}app-assets/js/core/app.js" type="text/javascript"></script>
<script src="{{env('BACK')}}app-assets/js/scripts/customizer.js" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script type="text/javascript" src="{{env('BACK')}}app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
<script src="{{env('BACK')}}app-assets/js/scripts/extensions/toastr.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
@yield('js')
</body>
</html>


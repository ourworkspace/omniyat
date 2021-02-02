<!-- plugins:css -->
<link rel="stylesheet" href="{{asset('public/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{asset('public/assets/vendors/iconfonts/ionicons/css/ionicons.css') }}">
<link rel="stylesheet" href="{{asset('public/assets/vendors/iconfonts/typicons/src/font/typicons.css') }}">
<link rel="stylesheet" href="{{asset('public/assets/vendors/fontawesome/font-awesome.css') }}">
<link rel="stylesheet" href="{{asset('public/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
<link rel="stylesheet" href="{{asset('public/assets/vendors/css/vendor.bundle.base.css') }}">
<link rel="stylesheet" href="{{asset('public/assets/vendors/css/vendor.bundle.addons.css') }}">
<link rel="stylesheet" href="{{asset('public/assets/css/demo/style.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/css/shared/style.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/vendors/icheck/skins/all.css')}}">

<link rel="stylesheet" href="{{asset('public/assets/vendors/datepicker/datepicker3.css') }}">

<!-- DataTables -->
<!-- <link rel="stylesheet" href="{{asset('public/assets/vendors/datatables/dataTables.bootstrap.css')}}"> -->
<link rel="stylesheet" href="{{asset('public/assets/vendors/datatables/new/jquery.dataTables.min.css')}}">

<link href="{{asset('public/assets/vendors/filesFilters/css/jquery.filer.css')}}" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/vendors/filesFilters/css/plugins/themes/jquery.filer-dragdropbox-theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/vendors/filesFilters/css/plugins/prettify/tomorrow.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/vendors/filesFilters/css/custom.css')}}">
<link href="{{asset('public/assets/vendors/filesFilters/css/themes/jquery.filer-dragdropbox-theme.css')}}" type="text/css" rel="stylesheet" />
<script src="{{asset('public/assets/vendors/jquery/jquery-3.1.1.min.js')}}"></script>

<!-- <script src="{{asset('public/assets/vendors/ckeditor/ckeditor.js')}}"></script> -->
<script src="{{asset('public//ckeditor/ckeditor.js')}}"></script>
<link rel="stylesheet" href="{{asset('public/assets/css/theme.css')}}">

<script src="{{asset('public/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('public/assets/vendors/js/vendor.bundle.addons.js')}}"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
<!-- link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
    This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for
    HTML files. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js
   3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->

<!-- the main fileinput plugin file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/fileinput.min.js"></script>
<!-- optionally if you need a theme like font awesome theme you can include it as mentioned below -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/themes/fa/theme.js"></script>
<!-- optionally if you need translation for your language then include  locale file as mentioned below -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/locales/(lang).js"></script>
<script src="{{asset('public/assets/vendors/datepicker/bootstrap-datepicker.js')}}"></script>

<script>
    var public_path = "{{asset('public/')}}";
    //alert(public_path);
    function CKEditorChange(name,fileName) {
        CKEDITOR.replace(name,{
            customConfig: fileName,
        });
    }
</script>
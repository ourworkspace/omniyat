<script src="{{asset('public/assets/js/shared/off-canvas.js')}}"></script>
<script src="{{asset('public/assets/js/shared/misc.js')}}"></script>
<script src="{{asset('public/assets/vendors/filesFilters/js/jquery.filer.min.js')}}"></script>
<script src="{{asset('public/assets/vendors/filesFilters/js/prettify.js')}}"></script>
<script src="{{asset('public/assets/vendors/filesFilters/js/custom.js')}}"></script>
<!-- DataTables -->
<!-- <script src="{{asset('public/assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('public/assets/vendors/datatables/dataTables.bootstrap.min.js')}}"></script> -->
<script src="{{asset('public/assets/vendors/datatables/new/jquery.dataTables.min.js')}}"></script>

<script>
      
    $(document).ready(function(){    
        $(".datepicker").datepicker({
            autoclose: true,
            todayHighlight: true
            
        });
        $('.datepicker').change(function(event) {
            $('label[for="date"]').hide();
        });
    });

    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
    });

    $(".dataTables").DataTable();

    $('.customDataTables').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });
    $(".fileUploadPlugIn").fileinput();
    $(".fileUploadPlugInCustom").fileinput({'showUpload':false, 'previewFileType':'any'});
    $(document).ready(function() {
        $('.filer_plugin_single').filer({
            button: "Choose File",
            feedback: "Choose file To Upload",
            limit : 1,
            extensions : ["jpeg","png","jpg"],
        });       
    });
</script>
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{asset('/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{asset('/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{asset('/js/app.min.js')}}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
	  

    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
       
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{asset('plugins/morris/morris.min.js')}}" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="{{asset('plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('plugins/knob/jquery.knob.js')}}" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
 
    <!-- datepicker -->
    <script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
  <!--   <script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script> 
   -->
    <!-- Slimscroll -->
    <script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    
   
        

     <!-- DataTable -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
     <script src="{{asset('plugins/datatables/dataTables.bootstrap.js')}}" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#contactdata').DataTable();
			} );
		</script>     
 
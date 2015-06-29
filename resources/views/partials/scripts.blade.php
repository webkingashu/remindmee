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
    
    <!-- Sparkline -->
    <script src="{{asset('plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <!-- jvectormap -->
    <!-- jQuery Knob Chart -->
    
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
  <!-- <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script> -->
    <!-- datepicker -->
    <script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
  <!--   <script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script> 
   -->
    <!-- Slimscroll -->
    <script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- Full Calendar -->
    <!-- fullCalendar 2.2.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="{{asset('plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
    
     <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
 
    <script>
    
  
    $( "#create_contact" ).validate({
        rules: {
            spouse_fullname: {
                required: function(){
                          if($("#emp_relship").val()=='yes'){
                              return true;
                          }
                          /* if($("#have_children").val()!=='no'){
                              return true;
                          }
                          */
                          }
            },
            spouse_dob: {
                required: function(){
                            if($("#emp_relship").val()=='yes'){
                                return true;
                            }
                          }
            },
            anniversary: {
                required: function(){
                            if($("#emp_relship").val()=='yes'){
                                return true;
                            }
                          }
            },
            fchild_name: {
                required: function(){
                            if($("#have_children").val()=='yes'){
                                return true;
                            }
                          }
            },
            fchild_dob:{
                required: function(){
                            if($("#have_children").val()=='yes'){
                                return true;
                            }
                          }
            }
            
            
        }
    });
    $(function() {
    $('#is_married_yes').hide(); 
    $('#have_children_yes').hide();
    $('#emp_relship').change(function(){
                        if($('#emp_relship').val() == 'yes') {
                            $('#is_married_yes').show(); 
                        } else {
                            $('#is_married_yes').hide(); 
                            $('#have_children_yes').hide();
                        } 
                    });
    $('#have_children').change(function(){
                        if($('#have_children').val() == 'yes') {
                            $('#have_children_yes').show(); 
                            $('#is_married_yes').show();
                        } else {
                            $('#have_children_yes').hide(); 
                        } 
                    });
    });
    
  //  $( "#emp_dob" ).datepicker({
  //    dateFormat: 'dd-mm-yy'
  //    });
  $(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        // put your options and callbacks here
    })
    // initialize the data table
   

});
    </script>
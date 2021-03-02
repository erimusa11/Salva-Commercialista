   <!-- jQuery  -->
   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/js/bootstrap.bundle.min.js"></script>
   <script src="assets/js/waves.js"></script>
   <script src="assets/js/simplebar.min.js"></script>

   <!-- Sparkline Js-->
   <script src="plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

   <!-- Chart Js-->
   <script src="plugins/jquery-knob/jquery.knob.min.js"></script>

   <!-- Morris Js-->
   <script src="plugins/morris-js/morris.min.js"></script>
   <!-- Raphael Js-->
   <script src="plugins/raphael/raphael.min.js"></script>

   <!-- Custom Js -->
   <script src="assets/pages/dashboard-demo.js"></script>

   <!-- App js -->
   <script src="assets/js/theme.js"></script>

   <!-- Sweet Alerts Js-->
   <script src="plugins/sweetalert2/sweetalert2.min.js"></script>

   <!-- Sweet Alerts Js-->
   <script src="assets/pages/sweet-alert-demo.js"></script>

   <!-- Plugins js -->
   <script src="plugins/autonumeric/autoNumeric-min.js"></script>
   <script src="plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
   <script src="plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
   <script src="plugins/moment/moment.js"></script>
   <script src="plugins/daterangepicker/daterangepicker.js"></script>
   <script src="plugins/select2/select2.min.js"></script>
   <script src="plugins/select2/it.js"></script>
   <script src="plugins/switchery/switchery.min.js"></script>
   <script src="plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
   <script src="plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

   <!-- Custom Js -->
   <script src="assets/pages/advanced-plugins-demo.js"></script>

   <!-- Validation custom js-->
   <script src="assets/pages/validation-demo.js"></script>

   <!-- Mask Js-->
   <script src="plugins/jquery-mask/jquery.mask.min.js"></script>
   <!-- Mask Custom Js-->
   <script src="assets/pages/mask-demo.js"></script>

   <!-- third party js -->
   <script src="plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="plugins/datatables/dataTables.bootstrap4.js"></script>
   <script src="plugins/datatables/dataTables.responsive.min.js"></script>
   <script src="plugins/datatables/responsive.bootstrap4.min.js"></script>
   <script src="plugins/datatables/dataTables.buttons.min.js"></script>
   <script src="plugins/datatables/buttons.bootstrap4.min.js"></script>
   <script src="plugins/datatables/buttons.html5.min.js"></script>
   <script src="plugins/datatables/buttons.flash.min.js"></script>
   <script src="plugins/datatables/buttons.print.min.js"></script>
   <script src="plugins/datatables/dataTables.keyTable.min.js"></script>
   <script src="plugins/datatables/dataTables.select.min.js"></script>
   <script src="plugins/datatables/pdfmake.min.js"></script>
   <script src="plugins/datatables/vfs_fonts.js"></script>
   <!-- third party js ends -->

   <!-- Datatables init -->
   <script src="assets/pages/datatables-demo.js"></script>
   <script src="assets/js/formulas.js"></script>


   <script>
$(document).ready(function() {
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }


    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.nav-sidebar a').filter(function() {
        return this.href == url;
    }).addClass('text-style');

    // for treeview
    $('ul.nav-treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active1');


    // Jquery draggable
    $('.modal-dialog').draggable({
        handle: ".modal-header"
    });

});
</script>
<!--**********************************************************************************************************************************************************************************************************


  This site was  Developed By 
                              //******  You can find us on ****//

                      //!  Eri Musa  
           //? Website  : http://dilavermusa.com/
           //? Linkedin : https://www.linkedin.com/in/eri-musa-681332181/


                  //!    Alban Delishi 
           //? Website  : http://delishicodes.com/
         //?  Linkedin : :https://www.linkedin.com/in/alban-delishi-22b485186
 

 ********************************************************************************************************************************************************************************************************** --->
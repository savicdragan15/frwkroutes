   <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
      
    <!-- METISMENU SCRIPTS -->
    <script src="<?=_WEB_PATH?>modules/admin/views/assets/js/jquery.metisMenu.js"></script>
    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?=_WEB_PATH?>modules/admin/views/assets/js/custom.js"></script>
    <script>
     $(document).ready(function(){
         $('#main-menu').metisMenu();
            /*====================================
              LOAD APPROPRIATE MENU BAR
           ======================================*/
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });
     });
      
    </script>

</body>
</html>

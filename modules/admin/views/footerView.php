   <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
      <script>
 
     $(document).ready(function(){
         
 /*********************************************************************************************************************************************/        
        /**
         * kada se bira kategorija i podkategorija
         */
        $('body').on('change', '#category',function(){ 
            var formData = {
                'category_id' : $(this).val()
            }
            //$('.subsubcategorylist').hide();
            ajaxCall(formData, '<?=_WEB_PATH?>admin/getSubcategories', function(data){
                data = JSON.parse(data);
                var content = '';
                $('#subcategory').empty();
                if(data.error == false){
                   content = "<option value='0'>Izaberite podkategoriju</option>";
                    $.each(data.data, function(index, value){
                       content += "<option value='"+value.ID+"'>"+value.name+"</option>";
                    });
                    $('#subcategory').append(content); 
                }else{
                    $('#subcategory').append("<option value='0'>"+data.message+"</option>");
                }
            });
        }); 
      /********************************************************************************************************************************/ 
       /*
        * kada se bira podkategorija
        */
       $('body').on('change', '#subcategory',function(){
           //alert($(this).val());
           var formData = {
                'subcategory_id' : $(this).val()
           }
           
           ajaxCall(formData, '<?=_WEB_PATH?>admin/getSubSubCategories', function(data){
                data = JSON.parse(data);
                var content = '';
               // $('.subsubcategorylist').hide();
                $('#sub_subcategory').empty();
                if(data.error == false){
                    $('.subsubcategorylist').show();
                   content = "<option value='-1'>Izaberite pod podkategoriju</option>";
                    $.each(data.data, function(index, value){
                       content += "<option value='"+value.ID+"'>"+value.name+"</option>";
                    });
                    $('#sub_subcategory').append(content); 
                }else{
                    $('#sub_subcategory').append("<option value='0'>"+data.message+"</option>");
                }
            });
        });

});
/**********************************************************************************************************************************************/
</script>
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

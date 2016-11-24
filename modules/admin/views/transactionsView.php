<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Transakcije</h2>
                <!-- Trigger the modal with a button -->
                <!-- <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
                <br>
                
                <!-- Table -->
            <div class="row">
                <div class="col-md-12">
                    <button data-tooltip="tooltip" onclick="getTransactions($('.pagination > li.active').find('a').attr('data-page'));" title="Osvezi tabelu" class="btn btn-default"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    <p></p>
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Transakcije  
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Id transakcije</th>
                                            <th>Ime Prezime</th>
                                            <th>Email</th>
                                            <th>Nacin placanja</th>
                                            <th>Datum</th>
                                            <th>Cena</th>
                                            <th>Status</th>
                                            <th>Akcije</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
                <div class="col-md-7" style="float: right;"> 
                    <ul class="pagination pagination-large">
                        
                   </ul>
                </div>
            </div>
                <!--End Advanced Tables -->
                </div>
            </div>
            <!-- Modal view transaction -->
                <div class="modal fade" id="viewTRansaction" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Pregled transakcije</h4>
                            </div>
                            <div class="modal-body">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori <i class="fa fa-times" aria-hidden="true"></i></button>                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of view transaction modal -->   
                
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

    </div>
    <!-- /. PAGE INNER  -->
</div>

<script>
    
    //When documetn ready
    $('body').ready(function(){
       getTransactions();
    });
    
    //When click on pagination page
    $('body').on('click','.pager', function(e){
         e.preventDefault();
         getTransactions($(this).attr('data-page'));
    });
    
    //Funcion for get products
    function getTransactions(page){
        data = {}
        page = typeof page !== 'undefined' ? page : 1 ;
        $('.span-loader-edit-image').show();
        var content = '';
            ajaxCall(data, "<?=_WEB_PATH?>admin/getTransactions/"+page+"", function(data){
            response = JSON.parse(data);
            //console.log(response);
            if(response.error == false){
               
                $.each(response.transactions, function(index, value){
                    var status;
                    if(value.status == 1) status = '<i data-tooltip="tooltip" title="Uspešna transakcija" class="fa fa-check" aria-hidden="true"></i>';
                    if(value.status == 0) status = '<i data-tooltip="tooltip" title="Neuspela transakcija" class="fa fa-times" aria-hidden="true"></i>';
                    if(value.status == 2) status = '<i data-tooltip="tooltip" title="Započeta transakcija" class="fa fa-spinner" aria-hidden="true"></i>';
                   content +='';
                   content += '<tr>';
                    content +=    '<td>'+value.ID+'</td>';
                   content +=    '<td>'+value.transaction_id+'</td>';
                   content +=    '<td>'+value.first_name+' '+value.last_name+'</td>';
                   content +=    '<td>'+value.email+' </td>';
                   content +=    '<td>'+value.payment_method+' </td>';
                   content +=    '<td>'+value.transaction_date+'</td>';
                   content +=    '<td class="center">'+value.total_price+' €</td>';
                   content +=    '<td class="center">'+status+'</td>';
                   content +=    '<td>';
                   content +=       '<button data-tooltip="tooltip" id="editProductBtn" data-product-id='+value.ID+' title="Vidi" type="button" class="btn btn-success " data-toggle="modal" data-target="#viewTRansaction"><i class="fa fa-search" aria-hidden="true"></i></button>  &nbsp;';
                   content +=    '</td>'
                   content += '</tr>';
                });
                
                var pagination = '';
                $.each(response.pagination, function(index, value){
                        if(value == 'current'){
                           pagination += '<li class="active"><a class="pager" data-page='+index+' href="<?=_WEB_PATH?>admin/getProducts">'+index+'</a></li>'; 
                        }else if(value == 'less' || value == 'more'){
                             pagination += '<li><a class="pager" data-page='+index+' href="<?=_WEB_PATH?>admin/getProducts">...</a></li>';
                        }else if(value == 'last'){
                             pagination += '<li><a title="last" class="pager" data-page='+index+' href="<?=_WEB_PATH?>admin/getProducts"> >></a></li>';
                        }else if(value == 'first'){
                             pagination += '<li><a title="first" class="pager" data-page='+index+' href="<?=_WEB_PATH?>admin/getProducts"><< </a></li>';
                        }else{
                            pagination += '<li><a class="pager" data-page='+index+' href="<?=_WEB_PATH?>admin/getProducts">'+index+'</a></li>';
                        }
                });
                pagination += '<li><a class="pager span-loader-edit-image" style="display: none;"><img id="insert_ajaxLoader" style="width: 18px;" src="<?= _WEB_PATH ?>views/images/ajaxloader.gif" /></a></li>';
                $('.span-loader-edit-image').hide('slow');
                $('.pagination, .pagination-large').html(pagination);
                $('.table-responsive').find('tbody').html(content).hide();
                $('.table-responsive').find('tbody').html(content).show("slow");
            }
            $('[data-tooltip="tooltip"]').tooltip(); 
        }, "POST"); 
      }
      
      /**
      * 

       * @param {type} productID
       * @returns {undefined}       */
    function getImage(productID){
        data = {
            'product_id' : productID
        };
         ajaxCall(data, "<?=_WEB_PATH?>admin/getImageByProductId", function(data){
             response = JSON.parse(data);
             if(response.error == false){
                //console.log(response.image);
                 $('#modal-image-product').attr("src", "<?=_WEB_PATH?>views/images/products_gallery/normal/"+response.image.image_name+"");
                 $('#modal-image-product').attr("data-product-id",response.image.product_id);
                 $('#modal-image-product').attr("data-image-id",response.image.ID);
             }else{
                 $('#modal-image-product').attr("src", "");
                 $('#modal-image-product').attr("data-product-id",productID);
                 //$('#modal-image-product').attr("data-image-id",response.image.ID);
                 alert(response.message);
             }
         });
      }
      
      /**
      *  When click on icon edit image
       */
      $('body').on('click', '#editImageProduct' , function(){
         var product_id = $(this).attr('data-product-id');
         getImage(product_id);
      });
      
      /**
       * When upload image, on change browse button
       */
      $("#uploadImagePoduct").on("change", function() {
          var product_id = $('#modal-image-product').attr('data-product-id');
          var image_id = $('#modal-image-product').attr('data-image-id');   
          //updateImage(product_id);
          formdata = new FormData();
      
         var image = this.files[0];
      
      $('.span-loader-edit-image').show();
        formdata.append("image", image);
        formdata.append("product_id", product_id);
        formdata.append("image_id", image_id);
        ajaxCall(formdata, '<?= _WEB_PATH ?>admin/updateImage', function(data){
            data = JSON.parse(data);
            if(data.error == false){
                $('#modal-image-product').attr('data-product-id',data.product_id);
                $('#modal-image-product').attr('data-image-id', data.image_id);
                $('#modal-image-product').attr("src", "<?=_WEB_PATH?>views/images/products_gallery/normal/"+data.image_name+"");
                $('#uploadImagePoduct').val('');
                $('.span-loader-edit-image').hide();
            }else{
                $('.span-loader-edit-image').hide();
                alert(data.message);
            }
        }, "POST", true);
      });  
      
      function getSubcategories(categoryId){
         data = {
            'category_id' : categoryId
          };
         var subcategories = {};
          
         ajaxCall(data, "<?=_WEB_PATH?>admin/getSubcategories/", function(data){
              data = JSON.parse(data);
              //console.log(data);
         });
      }
      
      /**
      * When click on edit product
       */
      $('body').on('click', '#editProductBtn', function(){
        //console.log($(this).attr('data-product-id'));
           var product_id  = $(this).attr('data-product-id');
           data = {
               'product_status' : 5
           }
           ajaxCall(data, "<?=_WEB_PATH?>admin/getProduct/"+product_id+"", function(data){
               data = JSON.parse(data);
               //console.log(data);
            if(data.error == false){
                $('#btn_update').attr('data-product-id', data.product.product_id);
                $('#proizvod_naziv').val(data.product.product_name);
                tinyMCE.activeEditor.setContent(data.product.product_description);
                $('#proizvod_kolicina').val(data.product.product_quantity);
                $('#proizvod_cena').val(data.product.product_price);
                $('#product_status option').prop("value ="+data.product.product_status);

                $('#category option').each(function(){
                    if(data.product.product_category == $(this).val())
                      $(this).attr("selected","selected");   
                });
                
                var categoryID = {
                    'category_id' : data.product.product_category,
                    'subcategory_id' : data.product.product_subcategory
                };
                 $('#subcategory').empty();
                //get subcategories
                ajaxCall(categoryID, "<?=_WEB_PATH?>admin/getSubcategories/", function(data){
                        data = JSON.parse(data);
                        if(data.error == false){
                            
                          $.each(data.data, function(index, value){
                            //console.log(value);
                            var content = "<option value="+value.ID+">"+value.name+"</option>";
                            $('#subcategory').append(content);
                            $('#subcategory option').each(function(){
                                //console.log(value);
                               if(data.subcategory_id == value.ID){
                                    $(this).attr("selected","selected");
                               }
                           });
                      });
                  }else{
                      $('#subcategory').append("<option value='0'>"+data.message+"</option>"); 
                  }
                });
                
                var subcategory_id = {
                    'subcategory_id' : data.product.product_subcategory,
                    'sub_subcategory_id' : data.product.product_sub_subcategory
                };
                
                //get sub subcategories
                ajaxCall(subcategory_id, "<?=_WEB_PATH?>admin/getSubSubCategories/", function(data){
                        data = JSON.parse(data);
                        $('#sub_subcategory').empty();
                        
                        if(data.error == false){
                            
                          $.each(data.data, function(index, value){
                            //console.log(value);
                            var content = "<option value="+value.ID+">"+value.name+"</option>";
                            $('#sub_subcategory').append(content);
                            $('#sub_subcategory option').each(function(){
                                if(value.ID == data.sub_subcategory_id)
                                  $(this).attr("selected","selected");   
                          });
                      });
                  }else{
                      $('#sub_subcategory').append("<option value='0'>"+data.message+"</option>");
                  }
                });
                
               $("#product_status").val(data.product.product_status).change();
               
            }
           });
      });
    $(document).ready(function(){
    
       $('body').on('click', '#btn_update', function(e){
        e.preventDefault();
        tinymce.triggerSave();
        
        data = {
            'product_id' : $(this).attr('data-product-id'),
            'product_name': $("#proizvod_naziv").val(),
            'product_category': $("#category").val(),
            'product_subcategory': $("#subcategory").val(),
            'product_subsubcategory' : $("#sub_subcategory").val(),
            'product_status': $("#product_status").val(),
            'product_description': $('#proizvod_opis').val(),
            'quantity': $('#proizvod_kolicina').val(),
            'product_price' : $('#proizvod_cena').val()
        }
        
        if(formValidate()){
         alertify.confirm("Da li ste sigurni?",function(){
            $('#insert_ajaxLoader').show();
            ajaxCall(data, '<?=_WEB_PATH?>admin/updateProduct', function(data){
                 data = JSON.parse(data);
                 if(data.error == false){
                    //$('#image').empty();
                    //$('#insert_product')[0].reset();
                    $('#insert_ajaxLoader').hide();
                    //$.notify(data.message, "success");
                    getProducts($('.pagination > li.active').find('a').attr('data-page'));
                    alert(data.message);
                }else{
                    //$.notify(data.message, "error");
                    alert(data.message);
                } 
            });  
        },function(){
             //alertify.error('Cancel');
         });
     }
   });
   
    function formValidate(){
             if($('#proizvod_naziv').val() == ''){
                //$("#proizvod_naziv").notify("Obavezno polje", "error" ,{ position:"right" });
                alert('Naziv proizvoda je obavezan.');
                $("#proizvod_naziv").focus();
                return false;
             }
             
             if($("#category").val() == 0 ){
                //$("#category").notify("Izaberite kategoriju", "error" ,{ position:"right" });
                alert('Izaberite kategoriju.');
                $("#category").focus();
                return false; 
             }
             if($("#subcategory").val() == 0 ){
                //$("#subcategory").notify("Izaberite podkategoriju", "error" ,{ position:"right" });
                alert('Izaberite podkategoriju.');
                $("#subcategory").focus();
                return false; 
             }
             
            /* if($("#sub_subcategory").val() == 0 ){
                //$("#sub_subcategory").notify("Izaberite podkategoriju", "error" ,{ position:"right" });
                alert('Izaberite pod podkategoriju.');
                $("#sub_subcategory").focus();
                return false; 
             }*/
             
             
             if($("#proizvod_kolicina").val() == '' ){
                //$("#proizvod_kolicina").notify("Obavezno polje", "error" ,{ position:"right" });
                alert('Unesite količinu proizvoda.');
                $("#proizvod_kolicina").focus();
                return false; 
             }
             
             if($("#proizvod_cena").val() == '' ){
                //$("#proizvod_cena").notify("Obavezno polje", "error" ,{ position:"right" });
                alert('Unesti cenu proizvoda.');
                $("#proizvod_cena").focus();
                return false; 
             }
             
             if($('#product_status').val() == -1){
                alert('Izaberite status');
                $("#product_status").focus();
                return false; 
             }
             
             return true;
         }
    });
  
</script>
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Modal Example</h2>
                <!-- Trigger the modal with a button -->
                <!-- <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
                
                
                <!-- Table -->
            <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Proizvodi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Naziv proizvoda</th>
                                            <th>Cena</th>
                                            <th>Kolicina</th>
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
                 
                <!-- End table-->
                <!-- Modal edit image -->
                <div class="modal fade" id="editImage" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Izmeni sliku</h4>
                            </div>
                            <div class="modal-body">
                                <div style="width: 50%; margin: 0 auto;">
                                    <img style="width: 100%;" id="modal-image-product" src=""  alt="Slika nije pronadjena"/>
                                </div>
                                <div  style="width: 50%; margin: 1em auto;">
                                    <input type="file" id="uploadImagePoduct" name="image_product" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                <!-- End of edit image product modal -->
                
                <!-- Modal edit product-->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            <div class="modal-body">
                            <div class="form-group">
                                <form action="" method="POST" id="insert_product">

                                    <div class="form-group">
                                        <i class="fa fa-file-text-o"></i> <label for="proizvod_naziv">Naziv proizvoda</label>
                                        <input class="form-control" id="proizvod_naziv" name="proizvod_naziv"  placeholder="Naziv proizvoda">
                                    </div>

                                    <div class="form-group">
                                        <i class="fa fa-picture-o"></i> <label>Proizvod slika</label>
                                        <input type="file" id="image_to_upload"><br>
                                        <span id="image"></span> 
                                        <img id="ajaxLoader" style="display: none; width: 34px;" src="<?= _WEB_PATH ?>views/images/ajaxloader.gif" />
                                    </div>

                                    <br>

                                    <i class="fa fa-file-text-o"></i> <label for="proizvod_opis">Opis proizvoda</label>
                                    <textarea id="proizvod_opis"></textarea>

                                    <br>

                                    <div class="form-group">
                                        <label for="category"><i class="fa fa-file-text-o"></i> Kategorija</label>
                                        <select class="form-control" id="category">
                                            <option value="0">Izaberite kategoriju</option>
                                            <?php foreach ($categories as $category) { ?>
                                                <option value="<?= $category->ID ?>"> <?= $category->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="subcategory"><i class="fa fa-file-text-o"></i> Podkategorija</label>
                                        <select class="form-control" id="subcategory">
                                            <option value="0">Izaberite podkategoriju</option>
                                        </select>
                                    </div>

                                    <div class="form-group subsubcategorylist" >
                                        <label for="sub_subcategory"><i class="fa fa-file-text-o"></i> Pod podkategorija</label>
                                        <select class="form-control" id="sub_subcategory">
                                            <option value="0">Izaberite pod podkategoriju</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <i class="fa fa-file-text-o"></i> <label for="proizvod_kolicina">Količina</label>
                                        <input class="form-control" id="proizvod_kolicina" name="proizvod_kolicina"  placeholder="Količina">
                                    </div>

                                    <div class="form-group">
                                        <i class="fa fa-file-text-o"></i> <label for="proizvod_cena">Cena</label>
                                        <input class="form-control" id="proizvod_cena" name="proizvod_cena"  placeholder="Cena">
                                    </div>

                                    <div class="form-group">
                                        <label for="product_status">Proizvod status:</label>
                                        <select class="form-control" id="product_status">
                                            <option value="-1">Izaberite status:</option>
                                            <option value="1">Proizvod vidljiv</option>
                                            <option value="0">Proizvod na cekanju</option>
                                        </select>
                                    </div>

                                    <button class="btn btn-success" type="submit" name="btn_submit" id="btn_unos_proizvoda" value="Unesi">Unesi  <i class="fa fa-angle-right"></i></button>
                                    <img id="insert_ajaxLoader" style="display: none; width: 34px;" src="<?= _WEB_PATH ?>views/images/ajaxloader.gif" />
                                    <button class="btn btn-default" type="reset">Reset  <i class="fa fa-refresh"></i></button>
                                </form>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
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
       getProducts();
    });
    
    //When click on pagination page
    $('body').on('click','.pager', function(e){
         e.preventDefault();
         getProducts($(this).attr('data-page'));
    });
    
    //Funcion for get products
    function getProducts(page){
        data = {}
        page = typeof page !== 'undefined' ? page : 1 ;
        var content = '';
            ajaxCall(data, "<?=_WEB_PATH?>admin/getProducts/"+page+"", function(data){
            response = JSON.parse(data);
            if(response.error == false){
                $.each(response.products, function(index, value){
                   content +='';
                   content += '<tr>';
                   content +=    '<td>'+value.ID+'</td>';
                   content +=    '<td>'+value.product_name+'</td>';
                   content +=    '<td>'+value.product_price+' €</td>';
                   content +=    '<td>'+value.product_quantity+'</td>';
                   content +=    '<td class="center">'+value.product_status+'</td>';
                   content +=    '<td>';
                   content +=       '<button id="editImageProduct" data-product-id='+value.ID+' title="Izmeni sliku" type="button" class="btn btn-primary " data-toggle="modal" data-target="#editImage"><i class="fa fa-picture-o actions" aria-hidden="true"></i></button> &nbsp;';
                   content +=       '<button title="Izmena porizvoda" type="button" class="btn btn-success " data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil actions" aria-hidden="true"></i></button>  &nbsp;';
                   content +=       '<button title="Obirsi proizvod" type="button" class="btn btn-danger " data-toggle="modal" data-target="#123"><i class="fa fa-trash-o  actions actions-basket" aria-hidden="true"></i></button>';
                   content +=    '</td>'
                   content += '</tr>';
                });
                
                var pagination = '';
                $.each(response.pagination, function(index, value){
                        if(value == 'current'){
                           pagination += '<li class="active"><a class="pager" data-page='+index+' href="<?=_WEB_PATH?>admin/getProducts">'+index+'</a></li>'; 
                        }else if(value == 'less' || value == 'more'){
                             pagination += '<li><a class="pager" data-page='+index+' href="<?=_WEB_PATH?>admin/getProducts">...</a></li>';
                        }else{
                            pagination += '<li><a class="pager" data-page='+index+' href="<?=_WEB_PATH?>admin/getProducts">'+index+'</a></li>';
                        }
                });
                
                $('.pagination, .pagination-large').html(pagination);
                $('.table-responsive').find('tbody').html(content);
            }
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
                console.log(response.image);
                 $('#modal-image-product').attr("src", "<?=_WEB_PATH?>views/images/products_gallery/normal/"+response.image.image_name+"");
                 $('#modal-image-product').attr("data-product-id",response.image.product_id);
                 $('#modal-image-product').attr("data-image-id",response.image.ID);
             }else{
                 $('#modal-image-product').attr("src", "");
                 $('#modal-image-product').attr("data-product-id",response.product_id);
                 $('#modal-image-product').attr("data-image-id",response.image.ID);
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
      
      $('#ajaxLoader').show();
        formdata.append("image", image);
        formdata.append("product_id", product_id);
        formdata.append("image_id", image_id);
        ajaxCall(formdata, '<?= _WEB_PATH ?>admin/updateImage', function(data){
            data = JSON.parse(data);
            if(data.error == false){
                $('#modal-image-product').attr('data-product-id',data.product_id);
                $('#modal-image-product').attr('data-image-id', data.image_id);
                $('#modal-image-product').attr("src", "<?=_WEB_PATH?>views/images/products_gallery/normal/"+data.image_name+"");
            }else{
                alert(data.message);
            }
        }, "POST", true);
      });  
</script>
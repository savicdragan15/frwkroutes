<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                          <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
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
                              <br/>
                              <br/>
                              <div class="form-group">
                                        <i class="fa fa-file-text-o"></i> <label for="proizvod_naziv">Unesite kategoriju</label>
                                        <input class="form-control" id="kategorija_naziv" name="kategorija_naziv"  placeholder="Unesite kategoriju">
                                        <br/>
                                        <i class="fa fa-file-text-o"></i> <label for="proizvod_naziv">Unesite redni broj prikaza</label>
                                        <br/><input class="form-control" id="kategorija_sort" name="kategorija_sort"  placeholder="Unesite redni broj prikaza">
                                        <br/><button type="button" class="btn btn-success" id='kat_btn'>Unesi</button>
                                    </div>
                              <div class="form-group">
                                        <i class="fa fa-file-text-o"></i> <label for="proizvod_naziv">Unesite Podkategoriju</label>
                                        <input class="form-control" id="podkategorija_naziv" name="podkategorija_naziv"  placeholder="Unesite podkategoriju">
                                        <br/>
                                        <i class="fa fa-file-text-o"></i> <label for="proizvod_naziv">Unesite redni broj prikaza</label>
                                        <br/><input class="form-control" id="podkategorija_sort" name="podkategorija_sort"  placeholder="Unesite redni broj prikaza">
                                        <br/>
                                        <select class="form-control" id="has_subcategory">
                                            <option value="0">Imace podkategorije</option>
                                            <option value="0">Ne</option>
                                            <option value="1">Da</option>
           
                                        </select>
                                        <br/><button type="button" class="btn btn-success" id='podkat_btn'>Unesi</button>
                                    </div>
                              <div class="form-group">
                                        <i class="fa fa-file-text-o"></i> <label for="proizvod_naziv">Unesite Pod podkategoriju</label>
                                        <input class="form-control" id="podpodkategorija_naziv" name="podpodkategorija_naziv"  placeholder="Unesite Pod podkategoriju">
                                        <br/>
                                        <i class="fa fa-file-text-o"></i> <label for="proizvod_naziv">Unesite redni broj prikaza</label>
                                        <br/><input class="form-control" id="podpodkategorija_sort" name="podpodkategorija_sort"  placeholder="Unesite redni broj prikaza">
                                        <br/><button type="button" class="btn btn-success" id='podpodkat_btn'>Unesi</button>
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
        $('body').on('click', '#kat_btn',function(){
           // alert("123");
           if($("#kategorija_naziv").val()=="" || $("#kategorija_sort").val()=="")
           {
               alert("Popunite polja Naziv kategorije i Redni broj za sortitanje");
               return false;
           }
           if(isNaN($("#kategorija_sort").val()))
           {
               alert("Polje Redni broj za sortiranje mora biti broj");
               return false;
           }
            var formData = {
                'Name' : $("#kategorija_naziv").val(),
                'Link' : "",
                'Sort' : $("#kategorija_sort").val(),
                'Parent' : 1,
                'SubParent' : 0,
                'IdParent' : $("#category").val(),
                'IdSubParent' : $("#subcategory").val(),
           }
            ajaxCall(formData, '<?=_WEB_PATH?>admin/insertCategory', function(data){
                data = JSON.parse(data);
                if(data.error==false)
                {
                    alert(data.message);
                }
                else
                {
                    alert(data.message);
                }
            });
         });
         $('body').on('click', '#podkat_btn',function(){
           // alert("123");
           if($("#category").val()==0)
           {
              alert("Izaberite kategoriju kojoj ce pripadati podkategorija");
               return false; 
           }
           if($("#podkategorija_naziv").val()=="" || $("#podkategorija_sort").val()=="")
           {
               alert("Popunite polja Naziv podkategorije i Redni broj za sortitanje");
               return false;
           }
            if(isNaN($("#podkategorija_sort").val()))
           {
               alert("Polje Redni broj za sortiranje mora biti broj");
               return false;
           }
            var formData = {
                'Name' : $("#podkategorija_naziv").val(),
                'Link' : "",
                'Sort' : $("#podkategorija_sort").val(),
                'Parent' : 0,
                'SubParent' : $("#has_subcategory").val(),
                'IdParent' : $("#category").val(),
                'IdSubParent' : $("#subcategory").val(),
           }
            ajaxCall(formData, '<?=_WEB_PATH?>admin/insertCategory', function(data){
                data = JSON.parse(data);
                if(data.error==false)
                {
                    alert(data.message);
                }
                else
                {
                    alert(data.message);
                }
            });
         });
         $('body').on('click', '#podpodkat_btn',function(){
           // alert("123");
           if($("#category").val()==0 || $("#subcategory").val()==0)
           {
              alert("Izaberite kategoriju i podkategoriju");
               return false; 
           }
           if($("#podpodkategorija_naziv").val()=="" || $("#podpodkategorija_sort").val()=="")
           {
               alert("Popunite polja Naziv Pod podkategorije i Redni broj za sortitanje");
               return false;
           }
            if(isNaN($("#podpodkategorija_sort").val()))
           {
               alert("Polje Redni broj za sortiranje mora biti broj");
               return false;
           }
            var formData = {
                'Name' : $("#podpodkategorija_naziv").val(),
                'Link' : "",
                'Sort' : $("#podpodkategorija_sort").val(),
                'Parent' : 0,
                'SubParent' : 0,
                'IdParent' : $("#category").val(),
                'IdSubParent' : $("#subcategory").val(),
           }
            ajaxCall(formData, '<?=_WEB_PATH?>admin/insertCategory', function(data){
                data = JSON.parse(data);
                if(data.error==false)
                {
                    alert(data.message);
                }
                else
                {
                    alert(data.message);
                }
            });
         });
</script>

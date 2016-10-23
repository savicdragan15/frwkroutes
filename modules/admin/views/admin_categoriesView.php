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
                                        <input type="hidden" id="kat_hidden" name="kat_hidden" value="">
                                        <br/><button type="button" class="btn btn-success" id='kat_btn'>Unesi</button> &nbsp; &nbsp;<button type="button" class="btn btn-warning" id="kat_popuni">Popuni polja</button>&nbsp; &nbsp;<button type="button" class="btn btn-info" id="kat_izmeni">Izmeni</button>
                                    </div>
                              <div class="form-group">
                                        <i class="fa fa-file-text-o"></i> <label for="proizvod_naziv">Unesite Podkategoriju</label>
                                        <input class="form-control" id="podkategorija_naziv" name="podkategorija_naziv"  placeholder="Unesite podkategoriju">
                                        <br/>
                                        <i class="fa fa-file-text-o"></i> <label for="proizvod_naziv">Unesite redni broj prikaza</label>
                                        <br/><input class="form-control" id="podkategorija_sort" name="podkategorija_sort"  placeholder="Unesite redni broj prikaza">
                                        <br/>
                                        <select class="form-control" id="has_subcategory">
                                            <option value="-1">Imace podkategorije</option>
                                            <option value="0">Ne</option>
                                            <option value="1">Da</option>
           
                                        </select>
                                        <input type="hidden" id="podkat_hidden" name="podkat_hidden" value="">
                                        <br/><button type="button" class="btn btn-success" id='podkat_btn'>Unesi</button> &nbsp; &nbsp;<button type="button" class="btn btn-warning" id="podkat_popuni">Popuni polja</button>&nbsp; &nbsp;<button type="button" class="btn btn-info" id="podkat_izmeni">Izmeni</button>
                                    </div>
                              <div class="form-group">
                                        <i class="fa fa-file-text-o"></i> <label for="proizvod_naziv">Unesite Pod podkategoriju</label>
                                        <input class="form-control" id="podpodkategorija_naziv" name="podpodkategorija_naziv"  placeholder="Unesite Pod podkategoriju">
                                        <br/>
                                        <i class="fa fa-file-text-o"></i> <label for="proizvod_naziv">Unesite redni broj prikaza</label>
                                        <br/><input class="form-control" id="podpodkategorija_sort" name="podpodkategorija_sort"  placeholder="Unesite redni broj prikaza">
                                        <input type="hidden" id="podpodkat_hidden" name="kat_hidden" value="">
                                        <br/><button type="button" class="btn btn-success" id='podpodkat_btn'>Unesi</button> &nbsp; &nbsp;<button type="button" class="btn btn-warning" id="podpodkat_popuni">Popuni polja</button>&nbsp; &nbsp;<button type="button" class="btn btn-info" id="podpodkat_izmeni">Izmeni</button>
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
    function populateCategories()
    {
    var formData = {
                
            }
            //$('.subsubcategorylist').hide();
            ajaxCall(formData, '<?=_WEB_PATH?>admin/getCategories', function(data){
                data = JSON.parse(data);
                var content = '';
                $('#category').empty();
                if(data.error == false){
                   content = "<option value='0'>Izaberite kategoriju</option>";
                    $.each(data.data, function(index, value){
                       content += "<option value='"+value.ID+"'>"+value.name+"</option>";
                    });
                    $('#category').append(content); 
                }else{
                    $('#category').append("<option value='0'>"+data.message+"</option>");
                }
            });
     }
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
                'IdParent' : 0,
                'IdSubParent' : 0,
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
            if($("#has_subcategory").val()==-1)
           {
              alert("Odaberite da li ce podkategorija sadrzati podkategorije");
               return false; 
           }
            var formData = {
                'Name' : $("#podkategorija_naziv").val(),
                'Link' : "",
                'Sort' : $("#podkategorija_sort").val(),
                'Parent' : 0,
                'SubParent' : $("#has_subcategory").val(),
                'IdParent' : $("#category").val(),
                'IdSubParent' : 0,
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
                populateCategories();
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
                populateCategories();
            });
         });
         $('body').on('click', '#kat_popuni',function(){
           // alert("123");
           if($("#category").val()==0)
           {
               alert("Odaberite kategoriju");
               return false;
           }
          
            var formData = {
             
           }
            ajaxCall(formData, '<?=_WEB_PATH?>admin/getCategory/'+$("#category").val(), function(data){
                data = JSON.parse(data);
                if(data.error==true)
                {
                    alert(data.message);
                }
                else
                {
                    $("#kategorija_naziv").val(data.response.name);
                    $("#kategorija_sort").val(data.response.sort);
                    $("#kat_hidden").val(data.response.ID);
                }
            },'GET');
         });
         $('body').on('click', '#kat_izmeni',function(){
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
                'ID':$("#kat_hidden").val(),
                'Name' : $("#kategorija_naziv").val(),
                'Link' : "",
                'Sort' : $("#kategorija_sort").val(),
                'Parent' : 1,
                'SubParent' : 0,
                'IdParent' : 0,
                'IdSubParent' :0,
           }
            ajaxCall(formData, '<?=_WEB_PATH?>admin/updateCategory', function(data){
                data = JSON.parse(data);
                if(data.error==false)
                {
                    alert(data.message);
                }
                else
                {
                    alert(data.message);
                }
                populateCategories();
            },'POST');
         });
         $('body').on('click', '#podkat_popuni',function(){
           // alert("123");
          if($("#category").val()==0 || $("#subcategory").val()==0)
           {
              alert("Izaberite kategoriju i podkategoriju");
               return false; 
           }
           
           
            var formData = {
             
           }
            ajaxCall(formData, '<?=_WEB_PATH?>admin/getCategory/'+$("#subcategory").val(), function(data){
                data = JSON.parse(data);
                if(data.error==true)
                {
                    alert(data.message);
                }
                else
                {
                    $("#podkategorija_naziv").val(data.response.name);
                    $("#podkategorija_sort").val(data.response.sort);
                   // $("#has_subcategory select").val(data.response.subparent);
                   //$('#has_subcategory option['+data.response.subparent+']').attr('selected','selected');
                   $("#has_subcategory").val(data.response.subparent).change();
                    $("#podkat_hidden").val(data.response.ID);
                    
                }
            },'GET');
         });
         $('body').on('click', '#podkat_izmeni',function(){
           // alert("123");
         if($("#category").val()==0)
           {
              alert("Izaberite kategoriju i podkategoriju");
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
           if($("#has_subcategory").val()==-1)
           {
              alert("Odaberite da li ce podkategorija sadrzati podkategorije");
               return false; 
           }
            var formData = {
                'ID':$("#podkat_hidden").val(),
                'Name' : $("#podkategorija_naziv").val(),
                'Link' : "",
                'Sort' : $("#podkategorija_sort").val(),
                'Parent' : 0,
                'SubParent' : $("#has_subcategory").val(),
                'IdParent' : $("#category").val(),
                'IdSubParent' :0,
           }
            ajaxCall(formData, '<?=_WEB_PATH?>admin/updateCategory', function(data){
                data = JSON.parse(data);
                if(data.error==false)
                {
                    alert(data.message);
                }
                else
                {
                    alert(data.message);
                }
                populateCategories();
            },'POST');
         });
         $('body').on('click', '#podpodkat_popuni',function(){
           // alert("123");
          if($("#category").val()==0 || $("#subcategory").val()==0 || $("#sub_subcategory").val()==-1)
           {
              alert("Izaberite kategoriju i podkategoriju i pod podkategoriju");
               return false; 
           }
      
            var formData = {
             
           }
            ajaxCall(formData, '<?=_WEB_PATH?>admin/getCategory/'+$("#sub_subcategory").val(), function(data){
                data = JSON.parse(data);
                if(data.error==true)
                {
                    alert(data.message);
                }
                else
                {
                    $("#podpodkategorija_naziv").val(data.response.name);
                    $("#podpodkategorija_sort").val(data.response.sort);
                 //  $("#has_subcategory").val(data.response.subparent).change();
                    $("#podpodkat_hidden").val(data.response.ID);
                    
                }
            },'GET');
         });
         $('body').on('click', '#podpodkat_izmeni',function(){
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
                'ID':$("#podpodkat_hidden").val(),
                'Name' : $("#podpodkategorija_naziv").val(),
                'Link' : "",
                'Sort' : $("#podpodkategorija_sort").val(),
                'Parent' : 0,
                'SubParent' : 0,
                'IdParent' : $("#category").val(),
                'IdSubParent' :$("#subcategory").val(),
           }
            ajaxCall(formData, '<?=_WEB_PATH?>admin/updateCategory', function(data){
                data = JSON.parse(data);
                if(data.error==false)
                {
                    alert(data.message);
                }
                else
                {
                    alert(data.message);
                }
                populateCategories();
            },'POST');
         });
</script>

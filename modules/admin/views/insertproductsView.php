<div id="page-wrapper" >
<div id="page-inner">
         <div class="row">
             <div class="col-md-12">
              <h2>Unos proizvoda</h2>
    <div id="page-inner">
        <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
            <div class="form-group">
                <form action="" method="POST" id="unos_proizvoda">
                    <div class="form-group">
                        <i class="fa fa-file-text-o"></i> <label for="proizvod_naziv">Naziv proizvoda</label>
                        <input class="form-control" id="proizvod_naziv" name="proizvod_naziv"  placeholder="Naziv proizvoda">
                    </div>
                    <div class="form-group">
                       <i class="fa fa-picture-o"></i> <label>Proizvod slika</label>
                       <input type="file" id="image_to_upload"><br>
                        <span id="image"></span> 
                        <img id="ajaxLoader" style="display: none" src="<?=_WEB_PATH?>views/images/ajaxloader.gif" />
                    </div>
                    <br>
                    <i class="fa fa-file-text-o"></i> <label for="surname">Opis proizvoda</label>
                    <textarea id="proizvod_opis"></textarea>
                    <br>
                    <div class="form-group">
                    <label for="category"><i class="fa fa-file-text-o"></i> Kategorija</label>
                      <select class="form-control" id="category">
                          <option value="-1">Izaberite kategoriju</option>
                       <?php foreach ($categories as $category){?>
                          <option value="<?=$category->ID?>"> <?= $category->name?></option>
                       <?php } ?>
                      </select>
                    </div>
                     <div class="form-group">
                    <label for="subcategory"><i class="fa fa-file-text-o"></i> Podkategorija</label>
                      <select class="form-control" id="subcategory">
                          <option value="-1">Izaberite podkategoriju</option>
                      </select>
                    </div>
                    
                    <div class="form-group subsubcategorylist" >
                    <label for="sub_subcategory"><i class="fa fa-file-text-o"></i> Pod podkategorija</label>
                      <select class="form-control" id="sub_subcategory">
                          <option value="-1">Izaberite pod podkategoriju</option>
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
                        <i class="fa fa-file-text-o"></i> <label>Porizvod status <b style="color: red"> 1 - prikazuj 0 - ne prikazuj </b></label>
                       <input class="form-control" id="proizvod_status" name="proizvod_status"  placeholder="Proizvod status">
                    </div>
                    
                    <button class="btn btn-success" type="submit" name="btn_submit" id="btn_unos_proizvoda" value="Unesi">Unesi  <i class="fa fa-angle-right"></i></button>
                    <img id="insert_ajaxLoader" style="display: none;" src="<?=_WEB_PATH?>views/images/ajaxloader.gif" />
                    <button class="btn btn-default" type="reset">Reset  <i class="fa fa-refresh"></i></button>
                </form>
            </div>
        </div>
    </div>
    <!-- /. PAGE INNER  -->
</div>
             </div>
         </div>
          <!-- /. ROW  -->
    <hr />
</div>
      <!-- /. PAGE INNER  -->
</div>

<script>
 
     $(document).ready(function(){
         function formValidate(){
             if($('#proizvod_naziv').val() == ''){
                $("#proizvod_naziv").notify("Obavezno polje", "error" ,{ position:"right" });
                $("#proizvod_naziv").focus();
                return false;
             }
             if($("#kategorija").val() == -1 ){
                $("#kategorija").notify("Izaberite kategoriju", "error" ,{ position:"right" });
                $("#kategorija").focus();
                return false; 
             }
             if($("#podkategorija").val() == -1 ){
                $("#podkategorija").notify("Izaberite podkategoriju", "error" ,{ position:"right" });
                $("#podkategorija").focus();
                return false; 
             }
             if($("#proizvod_kolicina").val() == '' ){
                $("#proizvod_kolicina").notify("Obavezno polje", "error" ,{ position:"right" });
                $("#proizvod_kolicina").focus();
                return false; 
             }
             if($("#proizvod_cena").val() == '' ){
                $("#proizvod_cena").notify("Obavezno polje", "error" ,{ position:"right" });
                $("#proizvod_cena").focus();
                return false; 
             }
             
             if($("#proizvod_status").val() == '' ){
                $("#proizvod_status").notify("Obavezno polje", "error" ,{ position:"right" });
                $("#proizvod_status").focus();
                return false; 
             }
             
             return true;
         }
         
         
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
                   content = "<option value='-1'>Izaberite podkategoriju</option>";
                    $.each(data.data, function(index, value){
                       content += "<option value='"+value.ID+"'>"+value.name+"</option>";
                    });
                    $('#subcategory').append(content); 
                }else{
                    $('#subcategory').append("<option>"+data.message+"</option>");
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
                    $('#sub_subcategory').append("<option>"+data.message+"</option>");
                }
            });
        });
 
    //kada se klikne na dugme unesi
    $('#btn_unos_proizvoda').click(function(e){
        e.preventDefault();
        tinymce.triggerSave();
        data = {
            'proizvod_naziv': $("#proizvod_naziv").val(),
            'kategorija_id': $("#kategorija").val(),
            'podkategorija_id': $("#podkategorija").val(),
            'proizvod_status': $("#proizvod_status").val(),
            'proizvod_opis': $('#proizvod_opis').val(),
            'slika_id': $('#uploaded_image').attr('data-id'),
            'proizvod_kolicina': $('#proizvod_kolicina').val(),
            'proizvod_cena' : $('#proizvod_cena').val()
        }
           
        if(formValidate()){
         alertify.confirm("Da li ste sigurni?",function(){
             $('#insert_ajaxLoader').show();
           $.ajax({
            url: "<?=_WEB_PATH?>admin/unesiProizvod",
            type: "POST",
            dataType: 'json',
            data: data,
            success: function(response){
                console.log(response);
                if(response.error == false){
                    $('#image_to_upload').removeAttr('disabled','disabled');
                    $('#image').empty();
                    $('#unos_proizvoda')[0].reset();
                    $('#insert_ajaxLoader').hide();
                    $.notify(response.message, "success");
                }else{
                    $.notify(response.message, "error");
                }
            }
        });
        },function(){
             //alertify.error('Cancel');
         });
     }
    });
    
    function getImage(id){
        data = {'id': id}
        var content = '';
         $.ajax({
            url: "<?=_WEB_PATH?>admin/dobaviSliku",
            type: "POST",
            dataType: 'json',
            data: data,
            success: function(response){
                console.log(response);
                if(response.error == false){
                  content +="<img id='uploaded_image' data-id='"+response.data.id+"' src='<?=_WEB_PATH?>views/images/"+response.data.slika_naziv_mala+"'></img>";
                 $('#image').html(content);
                }else{
                    content +="Doslo je do greske! Pokusajte ponovo";
                    $('#image').html(content);
                }
            }
        }); 
    }
    //upload slike za porizvod
    //jQuery.noConflict();    
    formdata = new FormData();      
    $("#image_to_upload").on("change", function() {
      $('#ajaxLoader').show();
        var file = this.files[0];
        console.log(file);
        if (formdata) {
            formdata.append("image", file);
            console.log(formdata);
            jQuery.ajax({
                url: "<?=_WEB_PATH?>admin/unesiSliku",
                type: "POST",
                data: formdata,
                dataType: 'json',
                processData: false,
                contentType: false,
                success:function(response){
                if(response.error == false){
                    $('#ajaxLoader').hide();
                    //$('#image_to_upload').attr('disabled', 'disabled');
                    getImage(response.last_id);
                   }
                }
            });
            }
        });                      
    }); 

</script>
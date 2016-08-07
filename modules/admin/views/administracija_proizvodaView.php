<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 

<div id="page-wrapper" >
<div id="page-inner">
    <?php //var_dump($proizvodi); ?>
         <div class="row">
             <div class="col-md-12">
              <h2>Administracija proizvoda</h2>
                 <div class="panel panel-default">
                        <div class="panel-heading">
                             Proizvodi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Naziv</th>
                                            <th>Status</th>
                                            <th>Količina</th>
                                            <th>Akcije</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($proizvodi as $proizvod){ ?>
                                        <tr class='odd gradeX'>
                                            <td><?=$proizvod->id?></td>
                                            <td><?=$proizvod->proizvod_naziv?></td>
                                            <td><?php echo ($proizvod->proizvod_status == 1)?'objavljen':'nije objavljen';?></td>
                                            <td><?=$proizvod->proizvod_kolicina?></td>
                                            <td>
                                                <button title='izmeni proizvod' data-id="<?=$proizvod->id?>" id="izmeni" class="btn btn-link"><img  style="width: 20px;" src="<?=_WEB_PATH?>modules/admin/views/assets/ikonice/edit.png" /></button>
                                                <button title='promeni sliku' data-id="<?=$proizvod->slika_id?>" id='izmeni_sliku' class="btn btn-link"><img  style="width: 20px;" src="<?=_WEB_PATH?>modules/admin/views/assets/ikonice/img.png" /></button>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                     
             </div>
         </div>
          <!-- /. ROW  -->
    <hr />
</div>
      <!-- /. PAGE INNER  -->
</div>
    <script>
      $(document).ready(function () {
          $('#dataTables-example').dataTable();
          
          function dobaviSveProizvode(){
              var content = '';
               $.ajax({
                url: "<?=_WEB_PATH?>admin/dobaviSveProizvode",
                type: "POST",
                dataType: 'json',
                success: function(response){
                    //console.log(response);
                    $.each(response.data, function(index, value){
                        content += "<tr class='odd gradeX'>";
                        content += "<td>"+value.id+"</td>";
                        content += "<td>"+value.proizvod_naziv+"</td>";
                        content += "<td>Win 95+</td>";
                        content += "<td>4</td>";
                        content += "<td>X</td>";
                        content += "</tr>";
                    });
                   //$('#proizvodi_tbl').html(content);
                }
            }); 
          }
       //dobaviSveProizvode(); 
       
  function getImageArticle(id){
  $('#ajaxLoader').show();
    var content = '';
      data = {'id':id};
       $.ajax({
        url: "<?=_WEB_PATH?>admin/dobaviSliku",
        type: "POST",
        data: data,
        dataType: 'json',
        success:function(response){
            if(response.error == false){
             content +="<input type='hidden' id='id_slike' data-id-slike="+response.data.id+">";
             content +="<img id='image_proizvod' data-id='"+response.data.proizvod_id+"' src='<?=_WEB_PATH?>views/images/"+response.data.slika_naziv_mala+"' />";
             content +="<p><input id='image_to_upload' type='file' /></p>";
             content +="<span id='poruka_span' style='display:none'></span>";
             content +="<img id='ajaxLoader' style='display: none' src='<?=_WEB_PATH?>views/images/ajaxloader.gif' />";
             $('#dialog_image').html(content);
          }else{
              content +="<p>Došlo je do greške. Pokusajte ponovo</p>";
              $('#dialog_image').html(content);
          }
      }
    });
  } 
  /**
  *funkscija dobavlja proizvod po id-u i kategroije i podkategorije
  */
  function dobaviProizvod(id){
  $('#loader_change_proizvod').show();
  tinymce.remove("textarea");
      data = {'id':id};
       $.ajax({
        url: "<?=_WEB_PATH?>admin/dobaviProizvodPoId",
        type: "POST",
        data: data,
        dataType: 'json',
        success:function(response){
           //console.log(response);
          if(response.error == false){
             $('#loader_change_proizvod').hide();
             $('#kategorija').empty();
             $('#proizvod_naziv').val(response.data.proizvod_naziv);
             if(response.kategorije.length !== 0){
            $.each(response.kategorije,function(index, value){
                  var content = "<option value="+value.id+">"+value.kategorija_naziv+"</option>";
                  $('#kategorija').append(content);
                  $('#kategorija option').each(function(){
                    if(value.id == response.data.kategorija_id){
                      $(this).attr("selected","selected");
                  }
                });
        });
        }else{
            $('#kategorija').append("Kategorije za proizvod nije nadjena");
        }
         $('#podkategorija').empty();
         if(response.podkategorije.length !== 0){
        $.each(response.podkategorije,function(index, value){
            var content_podkategorije = "<option value="+value.id+">"+value.podkategorija_naziv+"</option>";
            $('#podkategorija').append(content_podkategorije);
            $('#podkategorija option').each(function(){
              if(value.id == response.data.podkategorija_id)
                $(this).attr("selected","selected");   
        });
        });
    }else{
        $('#podkategorija').append("<option value='0'>Ova kategorija nema podkategoriju</option>");
    }
      $('#proizvod_kolicina').val(response.data.proizvod_kolicina);
      $('#proizvod_cena').val(response.data.proizvod_cena);
      $('#proizvod_status').val(response.data.proizvod_status);
      $('#h_id').val(response.data.id);
         tinymce.init({
            selector:'textarea', 
            height : 200
         });
       tinyMCE.activeEditor.setContent(response.data.proizvod_opis);
    }
      }
    });
  }
  /*
   * funkcija koja snima izmene proizvoda
   */
  function izmeniProzivod(){
   tinymce.triggerSave();
    data = {
        'id':$('#h_id').val(),
        'proizvod_naziv': $('#proizvod_naziv').val(),
        'proizvod_opis': $('#proizvod_opis').val(),
        'kategorija': $('#kategorija').val(),
        'podkategorija': $('#podkategorija').val(),
        'proizvod_kolicina': $('#proizvod_kolicina').val(),
        'proizvod_cena': $('#proizvod_cena').val(),
        'proizvod_status': $('#proizvod_status').val()
        };
     $.ajax({
        url: "<?=_WEB_PATH?>admin/izmenaProizvoda",
        type: "POST",
        data: data,
        dataType: 'json',
        success:function(response){
            if(response.error == false){
               $.notify(response.message, "success");
            }else{
               $.notify(response.message, "info");
            }
        }
    });
  }
    /**
    * kada se klikn e na izmeni sliku
     */
    $('body').on('click','#izmeni_sliku', function(){
       dialog_image.dialog('open');
       getImageArticle($(this).attr('data-id'));
    });
    
    /**
    * kada se klikne na izmenu proizvoda
     */
     $('body').on('click','#izmeni', function(){
         izmena_proizvoda.dialog('open');
         var id = $(this).attr('data-id');
         dobaviProizvod(id);
         //console.log(id);
     });
       /**
         * kada se bira kategorija i podkategorija
         */
         $('body').on('change', '#kategorija', function(){
             dobaviPodkategoriju($(this).val());
    }); 
    
    function dobaviPodkategoriju(id){
         var content = '';
            $('#podkategorija').empty();
             $.ajax({
                url: "<?=_WEB_PATH?>admin/dobaviPodkategoriju",
                type: "POST",
                dataType: 'json',
                data: "kategorija_id="+id,
                success: function(response){
                  if(response.error == false){
                      content = "<option value='-1'>Izaberite podkategoriju</option>";
                      $.each(response.data, function(index, value){
                         content += "<option value='"+value.id+"'>"+value.podkategorija_naziv+"</option>";
                      });
                      $('#podkategorija').append(content);
                  }else{
                      $('#podkategorija').append("<option>Nema podkategorija</option>");
                  }
                }
        });
    }
    /**
    * upload zamena slike
     */
      formdata = new FormData();      
    $("body").on("change","#image_to_upload", function() {
      $('#ajaxLoader').show();
        var file = this.files[0];
        //console.log(file);
        //id='id_slike' data-id-slike
        if (formdata) {
            formdata.append('image_id', $('#id_slike').attr('data-id-slike'));
            formdata.append("image", file);
            //console.log(formdata);
            jQuery.ajax({
                url: "<?=_WEB_PATH?>admin/promeniSliku",
                type: "POST",
                data: formdata,
                dataType: 'json',
                processData: false,
                contentType: false,
                success:function(response){
                formdata.delete('image');
                if(response.error == false){
                    console.log($('#id_slike').attr('data-id-slike'));
                    setTimeout(function() {
                       getImageArticle($('#id_slike').attr('data-id-slike'));
                       $('#ajaxLoader').hide();
                       $.notify(response.message, "success");
                      }, 1000);
                    //console.log(formdata);
                   }else{
                     $.notify(response.message, "error");
                   }
                }
            });
            }
        });   
 
       
       
    /**
     * dialog image options
     * 
     */
    var dialog_image = $( "#dialog_image" ).dialog({
      autoOpen: false,
      height: 500,
      width: 325,
      modal: true,
      buttons: {
        'Close': function() {
          dialog_image.dialog( "close" );
        }
      },
      close: function() {
        dialog_image.dialog( "close" ); 
      }
    });
    
var izmena_proizvoda = $( "#izmena_proizvoda" ).dialog({
      autoOpen: false,
      height: 900,
      width: 700,
      modal: true,
      buttons: {
        'Izmeni': function(){
            izmeniProzivod();
            dobaviProizvod($('#h_id').val());
        },
        'Izadji': function() {
          izmena_proizvoda.dialog( "close" );
        }
      },
      close: function() {
        izmena_proizvoda.dialog( "close" ); 
      }
    });
          
      });
   </script>
<div id="dialog_image" title="Izmena slike">
    <img id="loader_change_image" src="<?=_WEB_PATH?>views/images/ajaxloader.gif" alt="loader"/>
</div>
   
   <div id="izmena_proizvoda" title="Izmena proizvoda">
       <img id="loader_change_proizvod" style="display: none;" src="<?=_WEB_PATH?>views/images/ajaxloader.gif" alt="loader"/>
       <input type="hidden" id="h_id" />
       <div class='form-group'>
           <label for='proizvod_naziv'>Naziv proizvoda:</label>
            <input id='proizvod_naziv' type='text' value='' class='form-control'>
       </div>
       <textarea id="proizvod_opis" ></textarea>
       <div class='form-group'>
           <label for='kategorija'>Kategorija</label>
           <select class='form-control' id='kategorija'>
           </select>
       </div>
       <div class='form-group'>
           <label for='podkategorija'>Podkategorija</label>
           <select class='form-control' id='podkategorija'>
           </select>
       </div>
        <div class='form-group'>
            <label for="proizvod_kolicina">Količina:</label>
            <input id='proizvod_kolicina' type='text' value='' class='form-control'>
       </div>   
        <div class='form-group'>
            <label for="proizvod_cena">Cena:</label>
            <input id='proizvod_cena' type='text' value='' class='form-control'>
       </div>
       <div class='form-group'>
            <label for="proizvod_status">Status <b style="color: red"> 1 - prikazuj 0 - ne prikazuj </b></label>
            <input id='proizvod_status' type='text' value='' class='form-control'>
       </div>
</div>
   
   
  
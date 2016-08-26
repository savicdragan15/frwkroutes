<div class="container main-container">
        <div class="row">
        	<div class="col-lg-3 col-md-3 col-sm-12">
        	</div>

        	<div class="clearfix visible-sm"></div>
			<!-- Cart -->
        	<div class="col-lg-9 col-md-9 col-sm-12">
        		<div class="col-lg-12 col-sm-12">
            		<span class="title">Korpa</span>
            	</div>
	            <div class="col-lg-12 col-sm-12 hero-feature">
                    <div class="table-responsive">
                        <table class="table table-bordered tbl-cart">
                            <thead>
                                <tr>
                                    <td class="hidden-xs">Slika</td>
                                    <td>Naziv proizvoda</td>
<!--                                    <td>Size</td>-->
<!--                                    <td class="td-qty">Quantity</td>-->
                                    <td>Cena</td>
                                    <td>Obrisi</td>
                                </tr>
                            </thead>
                            <tbody id="content_table">    
                            </tbody>
                            </table>
                            </div>
                        <?php if(!empty($_SESSION['korpa'])){?>
                            <div class="btn-group btns-cart">
                                <a href="<?=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:_WEB_PATH;?>" <button type="button" class="btn btn-primary">
                                        <i class="fa fa-arrow-circle-left"></i> Nastavi kupovinu</button></a>
<!--                                    <button type="button" class="btn btn-primary">Update Cart</button>-->
                               <a href="<?=_WEB_PATH?>korpa/naruci">
                                   <button type="button" class="btn btn-primary">
                                       Naruči 
                                       <i class="fa fa-arrow-circle-right"></i>
                                   </button>
                               </a>
                        <?php }?>
                            </div>
	            </div>
        	</div>
        	<!-- End Cart -->
        </div>
	</div>
<script>
    $(document).ready(function(){
        var content = '';
        var content_table = $('#content_table');
        content_table.empty();
        $.ajax({
            url: "<?=_WEB_PATH?>korpa/dobaviProizvodeZaKorpu",
            type: "POST",
            dataType: 'json',
            success: function(response){
              if(response.error == false){
              $.each(response.proizvodi, function(index, value){
                content +="<tr data-remove='"+value.proizvod_id+"'>";
                content +="<td class='hidden-xs'>";
                    content +="<a href='<?=_WEB_PATH?>proizvodi/proizvod/"+value.proizvod_id+"/"+value.url+"'>";
                        content +="<img src='<?=_WEB_PATH?>views/images/"+value.proizvod_slika+"' alt='slika' title='"+value.proizvod_naziv+"' width='47' height='47' />";
                        content +="</a>";
                        content +="</td>";
                        content +="<td><a href='<?=_WEB_PATH?>proizvodi/proizvod/"+value.proizvod_id+"/"+value.url+"'>"+value.proizvod_naziv+"</a>";
                        content +="</td>";
                        content +="<td class='price'>"+value.proizvod_cena+"</td>";
                        content +="<td class='text-center'>";
                        content +="<a href='#' class='remove_cart' data-id="+value.proizvod_id+" rel='2'>";
                        content +="<i class='fa fa-trash-o'></i>";
                    content +="</a>";
                content +="</td>";
               content +="</tr>";
              });
              content +="<tr>";
                content +="<td colspan='2' align='right'>Ukupno</td>";
                   content +=" <td class='total' colspan='2'><b>"+response.ukupno+" RSD </b>";
                   content +="</td>";
                content +="</tr>";
              }else{
                 content +="<tr>";
                 content +="<td>";
                  content += response.message;
                  content +="</td>";
                 content +="</tr>";
              }
               content_table.append(content);
            }
        });
    });
   
   $('body').on('click', '.remove_cart', function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var data = {'id':id};
        $.ajax({
            url: "<?=_WEB_PATH?>korpa/obrisiProizvodIzKorpe",
            type: "POST",
            dataType: 'json',
            data: data,
            success: function(response){
              $('#content_table').find("[data-remove$='"+id+"']").remove();
              $('.total').find('b').text(response.ukupna_cena);
              $('#korpa').text('Korpa: '+response.broj_proizvoda+' proizvoda '+response.ukupna_cena+' RSD');
              if(response.broj_proizvoda > 0){
                 $("[data-proizvod-id$='"+response.obrisan_proizvod_id+"']").remove();
                 $('#ukupna_cena_korpa').text('Ukupno: '+response.ukupna_cena+' RSD');
                 $.notify("Uspešno ste izbacili proizvod iz korpe.", "info");
              }
              if(response.broj_proizvoda == 0){
                  $('#content_table').html("<tr><td>Vaša korpa je prazna.</td></tr>");
                  $('#sadrzaj').html('<li><a href="<?=_WEB_PATH?>korpa/prikaz">Vaša korpa je prazna</a></li>');
                   $('.btns-cart').remove();
                  $.notify("Vaša korpa je prazna.", "info");
                  $.notify("Uspešno ste izbacili proizvod iz korpe.", "info");
              }
            }
        });
   });
</script>
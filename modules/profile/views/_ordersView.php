<div class="row">
            <div class="span12">
            <div class="col-md-12">
                <!-- Table -->
                <div class="col-md-12">
                  
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
<!--                            Transakcije  -->
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Prodžbina</th>
                                            <th>Nacin placanja</th>
                                            <th>Datum</th>
                                            <th>Cena</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <span id="pagination_pages"></span>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
                 
                <div class="col-md-7" style="float: right; margin-top: -3em;"> 
                    <ul class="pagination pagination-large">
                        
                   </ul>
                </div>
                <!--End Advanced Tables -->
                </div>
            </div>
</div>

<script>
      window.onload = function() {
          $('.tab-menu').find("a[href$='<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>']").parent().addClass("active-tab");
         //When body ready
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
            ajaxCall(data, "<?=_WEB_PATH?>profile/getTransactionsByUser/"+page+"", function(data){
            response = JSON.parse(data);
            //console.log(response);
            if(response.error == false){
               
                $.each(response.transactions, function(index, value){
                    
                   content +='';
                   content += '<tr>';
                   content +=    '<td>'+value.ID+'</td>';
                   content +=    '<td>'+value.transaction_id+'</td>';
                   content +=    '<td>'+value.preview_name+' </td>';
                   content +=    '<td>'+value.transaction_date+'</td>';
                   content +=    '<td class="center">'+value.total_price+' €</td>';
                   content += '</tr>';
                });
               
                var pagination_pages = '';
                pagination_pages += ''+response.current_page+' od '+response.total_pages+'';
                $('#pagination_pages').html(pagination_pages);
                
                var pagination = '';
                if(response.total_pages > 1){
                    pagination += '<li><a title="first" data-tooltip="tooltip" class="pager" data-page='+1+' href="<?=_WEB_PATH?>admin/getProducts"><<</a></li>';
                }
                $.each(response.pagination, function(index, value){
                        if(value == 'current'){
                           pagination += '<li class="active"><a class="pager" data-page='+index+' href="<?=_WEB_PATH?>admin/getProducts">'+index+'</a></li>'; 
                        }else if(value == 'less' || value == 'more'){
                             pagination += '<li><a class="pager" data-page='+index+' href="<?=_WEB_PATH?>admin/getProducts">...</a></li>';
                        }else{
                            pagination += '<li><a class="pager" data-page='+index+' href="<?=_WEB_PATH?>admin/getProducts">'+index+'</a></li>';
                        }
                });
                if(response.total_pages > 1){
                    pagination += '<li><a title="last" class="pager" data-tooltip="tooltip" data-page='+response.total_pages+' href="<?=_WEB_PATH?>admin/getProducts">>></a></li>';
                }
                pagination += '<li><a class="pager span-loader-edit-image" style="display: none;"><img id="insert_ajaxLoader" style="width: 18px;" src="<?= _WEB_PATH ?>views/images/ajaxloader.gif" /></a></li>';
                $('.span-loader-edit-image').hide('slow');
                $('.pagination, .pagination-large').html(pagination);
                $('.table-responsive').find('tbody').html(content).hide();
                $('.table-responsive').find('tbody').html(content).show("slow");
            }else{
                content += '<tr>';
                  content += '<td>'+response.message+'</td>';
                content += '</tr>';
                $('.table-responsive').find('tbody').html(content).show("slow");
            }
            var body = $("html, body");
            body.stop().animate({scrollTop:50}, '500', 'swing', function() {});
            $('[data-tooltip="tooltip"]').tooltip(); 
        }, "POST"); 
      }
      };
</script>
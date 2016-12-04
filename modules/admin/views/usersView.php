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
                    <button data-tooltip="tooltip" onclick="getUsers($('.pagination > li.active').find('a').attr('data-page'));" title="Osvezi tabelu" class="btn btn-default"><i class="fa fa-refresh" aria-hidden="true"></i></button>
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
                                            <th>Email</th>
                                            <th>Ime Prezime</th>
                                            <th>Poslednja poseta</th>
                                            <th>Status</th>
                                            <th>Akcije</th>
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
            </div>
                <!--End Advanced Tables -->
                </div>
            </div>
            <!-- Modal view transaction -->
<!--                <div class="modal fade" id="viewTRansaction" role="dialog">
                    <div class="modal-dialog">

                         Modal content
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
                </div>-->
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
       getUsers();
    });
    
    //When click on pagination page
    $('body').on('click','.pager', function(e){
         e.preventDefault();
         getUsers($(this).attr('data-page'));
    });
    
    //Funcion for get products
    function getUsers(page){
        data = {}
        page = typeof page !== 'undefined' ? page : 1 ;
        $('.span-loader-edit-image').show();
        var content = '';
            ajaxCall(data, "<?=_WEB_PATH?>admin/getUsers/"+page+"", function(data){
            response = JSON.parse(data);
            //return;
            if(response.error == false){
                
                $.each(response.users, function(index, value){
                    var status;  var is_active; var user_status;
                    
                    if(value.active == 1){
                        status = '<i data-tooltip="tooltip" style="color: green; cursor: pointer;" class="fa fa-circle" title="Aktivan" aria-hidden="true"></i>';
                        is_active = '<img class="switch-status" data-tooltip="tooltip" title="Deaktiviraj" style="cursor: pointer;" data-userid="'+value.ID+'" data-active="0" src="<?=_WEB_PATH?>modules/admin/views/assets/img/switch-off.png" />';
                    }
                   
                    if(value.active == 0) {
                        status = '<i data-tooltip="tooltip" style="color: red; cursor: pointer;" class="fa fa-circle" title="Neaktivan" aria-hidden="true"></i>';
                        is_active = '<img class="switch-status" data-tooltip="tooltip" title="Aktiviraj" style="cursor: pointer;" data-userid="'+value.ID+'" data-active="1" src="<?=_WEB_PATH?>modules/admin/views/assets/img/switch-on.png" />';
                    }
                    
                   content +='';
                   content += '<tr>';
                   content +=    '<td>'+value.email+' </td>';
                   content +=    '<td>'+value.first_name+' '+value.last_name+'</td>';
                   content +=    '<td>'+value.last_login+' </td>';
                   content +=    '<td class="center">'+status+'</td>';
                   content +=    '<td>';
                   content +=       '<button data-tooltip="tooltip" id="viewTransaction" data-product-id='+value.ID+' title="Vidi" type="button" class="btn btn-success " data-toggle="modal" data-target="#viewTRansaction"><i class="fa fa-search" aria-hidden="true"></i></button>  &nbsp;';
                   content +=       ''+is_active+'';
                   content +=    '</td>'
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
      
    $('body').on('click', '.switch-status', function(e){
         e.stopPropagation();
         var active = $(this).attr('data-active');
         var user_id = $(this).attr('data-userid');
         switchStatus(user_id, active);
    });
    
  function switchStatus(user_id, status){
      data = {
        'user_id': user_id,
        'active' : status 
      };
       ajaxCall(data, "<?=_WEB_PATH?>admin/switchStatus/", function(data){
           response = JSON.parse(data);
           if(response.error == false){
             getUsers($('.pagination > li.active').find('a').attr('data-page'));  
           }
      }, "POST"); 
  }
</script>
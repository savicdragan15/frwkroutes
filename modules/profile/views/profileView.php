<style>
    .active-tab {
        background-color: #f71919;
    }
    .active-tab > a {
        color: white;
    }
    .active-tab:hover > a:hover {
        background-color: #f71919;
    }
</style>
<script>
     window.onload = function() {
       $('.tab-menu').find("a[href$='<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>']").parent().addClass("active-tab");
    };
</script>
<!-- PRODUCT-OFFER -->
<div class="product_wrap">

    <div class="container">
        <div class="row">
            <div class="span12">
               <ul class="nav nav-pills tab-menu">
                    <li role="presentation" ><a href="<?=_WEB_PATH?>profile/edit/information">Information</a></li>
                    <li role="presentation"><a href="<?=_WEB_PATH?>profile/edit/changePassword">Password change</a></li>
                    <li role="presentation"><a href="<?=_WEB_PATH?>profile/edit/orders">Orders</a></li>
                </ul>
            </div>
        </div>
    


<?php 

   if(isset($scenario) && $scenario != ''){
      
       switch ($scenario){
           case 'information':
               Loader::loadPartialView("_information", "profile",false, array('user' => $user));
           break;
           case 'changePassword':
               Loader::loadPartialView("_change_password", "profile",false, array('user' => $user));
           break;
           case 'orders':
               Loader::loadPartialView("_orders", "profile",false, array('user' => $user , 'transactions' => $transactions));
           break;
           default :
               
           break;
       }
      
   }
?>
</div>
</div>
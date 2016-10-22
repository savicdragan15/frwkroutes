<?php 
/* if(!isset($_SESSION['status']) || $_SESSION['status'] !== '1'){
     header("Location:"._WEB_PATH."admin/index");
 }*/
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All out shine Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?=_WEB_PATH?>modules/admin/views/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?=_WEB_PATH?>modules/admin/views/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?=_WEB_PATH?>modules/admin/views/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!-- CSS ALERTIFY -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.6.1/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.6.1/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.6.1/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.6.1/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="<?=_WEB_PATH?>modules/admin/views/assets/js/dataTables/dataTables.bootstrap.css" />
    <!-- End CSS ALERTIFY -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="<?=_WEB_PATH?>modules/admin/views/assets/js/notify.js"></script>
      <!-- DATA TABLE SCRIPTS -->
    <script src="<?=_WEB_PATH?>modules/admin/views/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?=_WEB_PATH?>modules/admin/views/assets/js/dataTables/dataTables.bootstrap.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?=_WEB_PATH?>modules/admin/views/assets/js/bootstrap.min.js"></script>
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
   
 <script>
    tinymce.init({ 
      selector:'textarea', 
      height: 250
    });
    $(document).ready(function(){
       $('#main-menu').find("a[href$='<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>']").addClass("active-menu");
    });
</script>
   <!-- Alertify CDN -->
  <script src="//cdn.jsdelivr.net/alertifyjs/1.6.1/alertify.min.js"></script>
  <script src="<?=_WEB_PATH?>modules/admin/views/assets/js/custom.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=_WEB_PATH?>admin">All out shine</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="<?=_WEB_PATH?>login/adminLogOut" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="<?=_WEB_PATH?>modules/admin/views/assets/img/logo.jpg" class="user-image img-responsive"/>
                </li>
                    
                    <li>
                        <a  href="<?=_WEB_PATH?>admin/kontrolnaTabla"><i class="fa fa-dashboard fa-2x"></i>Kontrolna tabla</a>
                    </li>
                    <li>
                        <a  href="<?=_WEB_PATH?>admin/insertProducts"><i class="fa fa-archive fa-2x"></i>Unos proizvoda</a>
                    </li>
                     <li>
                        <a  href="<?=_WEB_PATH?>admin/productsAdministration"><i class="fa fa-pencil fa-2x"></i>Adminitracija proizvoda</a>
                    </li>
                                       
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
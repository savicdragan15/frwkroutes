<!doctype html>
<!--[if IE 7]>    <html class="ie7" > <![endif]-->
<!--[if IE 8]>    <html class="ie8" > <![endif]-->
<!--[if IE 9]>    <html class="ie9" > <![endif]-->
<!--[if IE 10]>    <html class="ie10" > <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> 
  <html lang="en-US"> <!--<![endif]-->
		<head>
                <!-- META TAGS -->
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width" />

                <!-- Title -->
                <title>All shine out</title>

                <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700,600,800' rel='stylesheet' type='text/css'>
                <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
                <link href='http://fonts.googleapis.com/css?family=Quattrocento:400,700' rel='stylesheet' type='text/css'>

                <!-- Style Sheet-->
                <link rel="stylesheet" href="<?=_WEB_PATH?>/views/css/tooltipster.css">
                <link href="<?=_WEB_PATH?>/views/css/ie.css" rel="stylesheet" media="all">
                <link rel="stylesheet" href="<?=_WEB_PATH?>/views/css/bootstrap.css">
                <link rel="stylesheet" href="<?=_WEB_PATH?>/views/style.css">
                <link rel="stylesheet" href="<?=_WEB_PATH?>/views/css/responsive.css">
                <link rel="stylesheet" href="<?=_WEB_PATH?>/views/css/prettyPhoto.css">
                
				
                <!-- favicon -->
                <link rel="shortcut icon" href="<?=_WEB_PATH?>/views/images/favicon.jpg">

            <!-- Include the HTML5 shiv print polyfill for Internet Explorer browsers 8 and below -->
            <!--[if lt IE 10]><script src="js/html5shiv-printshiv.js" media="all"></script><![endif]-->
            
		</head>
		<body>				
                    <!-- HEADER -->
                <div class="header-bar">
                    <div class="container">
                        <div class="row">
                            <div class="pric-icon span2">
                                <a href="#" class="active">&#x20ac;</a>
                                <a href="#">&#xa3;</a>
                                <a href="#">&#36;</a>
                            </div>

                            <div class="span10 right">
                                <div class="social-strip">
                                    <ul>
                                        <li><a href="#" class="account">My Account</a></li>
                                        <li><a href="#" class="wish">Wish List</a></li>
                                        <li><a href="#" class="check">Checkout</a></li>
                                    </ul>
                                </div>

                                <div class="languages">
                                    <a href="#" class="english active"><img src="<?=_WEB_PATH?>/views/images/english.png" alt=""></a>
                                    <a href="#" class="german"><img src="<?=_WEB_PATH?>/views/images/german.png" alt=""></a>
                                    <a href="#" class="japan"><img src="<?=_WEB_PATH?>/views/images/japan.png" alt=""></a>
                                    <a href="#" class="turkish"><img src="<?=_WEB_PATH?>/views/images/turkish.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>

                <div class="header-top">
                    <div class="container">
                        <div class="row">

                            <div class="span5">
                                <div class="logo">
                                    <a href="<?=_WEB_PATH?>"><img style="width: 100px; height: 70px;" src="<?=_WEB_PATH?>/views/images/1_o.jpg" alt=""></a>
                                    <h1><a href="<?=_WEB_PATH?>">Ultra Customizable<span> All shine out </span>Theme</a></h1>
                                </div>
                            </div>

                            <div class="span5">
                                <form>
                                    <input type="text" placeholder="Type and hit enter">
                                    <input type="submit" value="">
                                </form>
                            </div>

                            <div class="span2">
                                <div class="cart">
                                    <ul>
                                        <li class="first"><a href="#"></a><span></span></li>
                                        <li id="cart-info"><?=(isset($_SESSION['korpa']))?$_SESSION['korpa']['ukupno_proizvoda_u_korpi'].' items':'0 items'?></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <header>
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                            <nav class="desktop-nav">
                                <ul class="clearfix">
                                    <?php $navigation = new Navigation(); echo $navigation->renderNav();?>
                                </ul>
                            </nav>
                                <select>
                                    <?php echo $navigation->renderCategory()?>
                                </select>
                            </div>
                        </div>
                    </div>
                </header>
<!-- HEADER -->

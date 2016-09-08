<style>
        
        /* jssor slider bullet navigator skin 01 css */
        /*
        .jssorb01 div           (normal)
        .jssorb01 div:hover     (normal mouseover)
        .jssorb01 .av           (active)
        .jssorb01 .av:hover     (active mouseover)
        .jssorb01 .dn           (mousedown)
        */
        .jssorb01 {
            position: absolute;
        }
        .jssorb01 div, .jssorb01 div:hover, .jssorb01 .av {
            position: absolute;
            /* size of bullet elment */
            width: 12px;
            height: 12px;
            filter: alpha(opacity=70);
            opacity: .7;
            overflow: hidden;
            cursor: pointer;
            border: #000 1px solid;
        }
        .jssorb01 div { background-color: gray; }
        .jssorb01 div:hover, .jssorb01 .av:hover { background-color: #d3d3d3; }
        .jssorb01 .av { background-color: #fff; }
        .jssorb01 .dn, .jssorb01 .dn:hover { background-color: #555555; }

        /* jssor slider arrow navigator skin 02 css */
        /*
        .jssora02l                  (normal)
        .jssora02r                  (normal)
        .jssora02l:hover            (normal mouseover)
        .jssora02r:hover            (normal mouseover)
        .jssora02l.jssora02ldn      (mousedown)
        .jssora02r.jssora02rdn      (mousedown)
        */
        .jssora02l, .jssora02r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 55px;
            height: 55px;
            cursor: pointer;
            background: url('http://localhost/all_shine_out/views/img/a02.png') no-repeat;
            overflow: hidden;
        }
        .jssora02l { background-position: -3px -33px; }
        .jssora02r { background-position: -63px -33px; }
        .jssora02l:hover { background-position: -123px -33px; }
        .jssora02r:hover { background-position: -183px -33px; }
        .jssora02l.jssora02ldn { background-position: -3px -33px; }
        .jssora02r.jssora02rdn { background-position: -63px -33px; }
    </style>
<div class="wrapper">
                    <div class="container">
                        <div class="row" style="margin-left:0px">

                            <!-- SLIDER -->
                            
              <div class="" id="jssor_1" style="position: relative; margin: 0 auto 20px; top: 0px; left: 0px; width: 870px; height: 373px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('<?=_WEB_PATH?>/views/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 870px; height:373px; overflow: hidden;">
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="http://placehold.it/870x373" />
                <div data-u="caption" data-t="0" style="position: absolute; top: 320px; left: 30px; width: 350px; height: 30px; background-color: rgba(235,81,0,0.5); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">mobile ready, touch swipe</div>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="<?=_WEB_PATH?>/views/img/007.jpg" />
                <div data-u="caption" data-t="1" data-3d="1" style="position: absolute; top: -50px; left: 125px; width: 350px; height: 30px; background-color: rgba(235,81,0,0.5); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">time lined layer animation</div>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="<?=_WEB_PATH?>/views/img/003.jpg" />
                <div data-u="caption" data-t="2" style="position: absolute; top: 30px; left: -380px; width: 350px; height: 30px; background-color: rgba(235,81,0,0.5); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">finger catchable right to left</div>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="<?=_WEB_PATH?>/views/img/004.jpg" />
                <div data-u="caption" data-t="3" style="position: absolute; top: 30px; left: 30px; width: 350px; height: 30px; background-color: rgba(235,81,0,0.5); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">responsive, scale smoothly</div>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="<?=_WEB_PATH?>/views/img/005.jpg" />
                <div data-u="caption" data-t="4" style="position: absolute; top: 30px; left: 30px; width: 350px; height: 30px; background-color: rgba(235,81,0,0.6); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">image, text, and custom layers</div>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="<?=_WEB_PATH?>/views/img/006.jpg" />
                <div data-u="caption" data-t="5" style="position: absolute; top: 30px; left: 600px; width: 350px; height: 30px; background-color: rgba(235,81,0,0.5); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">tons of transition type</div>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="<?=_WEB_PATH?>/views/img/009.jpg" />
                <div data-u="caption" data-t="6" style="position: absolute; top: 30px; left: 30px; width: 350px; height: 30px; background-color: rgba(235,81,0,0.5); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">visual slider maker</div>
            </div>
            <div data-b="0" data-p="112.50" style="display: none;">
                <img data-u="image" src="<?=_WEB_PATH?>/views/img/008.jpg" />
                <div data-u="caption" data-t="7" style="position: absolute; top: -50px; left: 30px; width: 350px; height: 30px; background-color: rgba(235,81,0,0.5); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">play in and play out</div>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="<?=_WEB_PATH?>/views/img/011.jpg" />
                <div data-u="caption" data-t="8" data-3d="1" style="position: absolute; top: 25px; left: 150px; width: 250px; height: 250px; background-color: rgba(40,177,255,0.6); overflow: hidden;">
                    <div data-u="caption" data-t="9" style="position: absolute; top: 100px; left: 25px; width: 200px; height: 50px; font-size: 24px; line-height: 50px;">A Child Layer</div>
                </div>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="<?=_WEB_PATH?>/views/img/010.jpg" />
                <div data-u="caption" data-t="10" data-3d="1" style="position: absolute; top: 25px; left: 100px; width: 250px; height: 250px; background-color: rgba(40,177,255,0.6);">
                    <div style="margin: 15px; font-size: 20px;">
                        <p>This is full customized content layer.<br />
                        </p>
                        <p>
                            Everything is allowed
                            
                        </p>
                        You can put
                        
                        <a href="http://wwww.jssor.com">
                            a link
                        </a> or an image
                        
                        <img src="<?=_WEB_PATH?>/views/img/icon_chrome.png" /> here.
                        
                    </div>
                </div>
            </div>
            <a data-u="add" href="http://www.jssor.com/demos/image-slider.slider" style="display:none">Image Slider</a>
        
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb01" style="bottom:16px;right:16px;">
            <div data-u="prototype" style="width:12px;height:12px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora02l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora02r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
    </div>
                            
                            <!-- SLIDER -->

                            <!-- SPECIAL-OFFER -->
                            <!-- <div class="span3">
                                <div class="offers">
                                    <figure>
                                        <a href="#"><img src="http://placehold.it/270x171" alt=""></a>
                                        <div class="overlay">
                                            <h1>SUMMER<span> COLLECTION 35% OFF</span> <small>  - Limited Offer</small></h1>
                                        </div>
                                    </figure>
                                </div> 
                                 <div class="offers">
                                    <figure>
                                        <a href="#"><img src="http://placehold.it/270x171" alt=""></a>
                                        <div class="overlay">
                                            <h1>SUMMER<span> COLLECTION 35% OFF</span> <small>  - Limited Offer</small></h1>
                                        </div>
                                    </figure>
                                </div>
                            </div> -->
                            <!-- SPECIAL-OFFER -->

                        </div>
                    </div>
                </div>

                <!-- PRODUCT-OFFER -->
               <div class="product_wrap">
                    <div class="container">
                        <div class="row heading-wrap">
                            <div class="span12 heading">
                                <h2>Neue produkte <span></span></h2>
                            </div>
                        </div>
                        
                        <div class="row">
                             <?php foreach($latestProducts as $product){?>
                                    <div class="span3 product">
                                        <div>
                                            <figure>
                                                <a href="#"><img src="<?=_WEB_PATH?>views/images/products_gallery/thumbnail/<?=$product->image_name?>" alt=""></a>
                                                <div class="overlay">
                                                    <a href="<?=_WEB_PATH?>views/images/products_gallery/normal/<?=$product->image_name?>" class="zoom"></a>
                                                    <a href="<?=_WEB_PATH?>products/singleProduct/<?=$product->ID?>/<?=$product->product_name_url?>" class="link"></a>
                                                </div>
                                            </figure>
                                            <div class="detail">
                                                <span><?=$product->product_price?> €</span>
                                                <a href="<?=_WEB_PATH?>products/singleProduct/<?=$product->ID?>/<?=$product->product_name_url?>"><h4><?=$product->product_name?></h4></a>
                                                <div class="icon">
                                                    <a href="#" class="add-to-cart one tooltip" data-id="<?=$product->ID?>" data-price="<?=$product->product_price?>" data-name="<?=$product->product_name?>" data-img="<?=$product->image_name?>" data-quantity="1" title="Add to wish list"></a>
                                                    <a href="#" class="two tooltip " title="Add to cart"></a>
                                                    <a href="#" class="three tooltip" title="Add to compare"></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                <?php } ?>
                        </div>
                            <div class="row heading-wrap">
                                <div class="span12 heading">
                                    <h2>Lager <span></span></h2>
                                </div>
                            </div>
                        <div class="row">
                            <div class="span3 product">

                                <div>
                                    <figure>
                                        <a href="#"><img src="http://placehold.it/270x186" alt=""></a>
                                        <div class="overlay">
                                            <a href="http://placehold.it/270x186" class="zoom"></a>
                                            <a href="#" class="link"></a>
                                        </div>
                                    </figure>
                                    <div class="detail">
                                        <span>$244.00</span>
                                        <h4>Brown Wood Chair</h4>
                                        <div class="icon">
                                            <a href="#" class="one tooltip" title="Add to wish list"></a>
                                            <a href="#" class="two tooltip " title="Add to cart"></a>
                                            <a href="#" class="three tooltip" title="Add to compare"></a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="span3 product">

                                <div>
                                    <figure>
                                        <a href="#"><img src="http://placehold.it/270x186" alt=""></a>
                                        <div class="overlay">
                                            <a href="http://placehold.it/270x186" class="zoom"></a>
                                            <a href="#" class="link"></a>
                                        </div>
                                    </figure>
                                    <div class="detail">
                                        <span>$244.00</span>
                                        <h4>Brown Wood Chair</h4>
                                        <div class="icon">
                                            <a href="#" class="one tooltip" title="Add to wish list"></a>
                                            <a href="#" class="two tooltip " title="Add to cart"></a>
                                            <a href="#" class="three tooltip" title="Add to compare"></a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="span3 product">

                                <div>
                                    <figure>
                                        <a href="#"><img src="http://placehold.it/270x186" alt=""></a>
                                        <div class="overlay">
                                            <a href="http://placehold.it/270x186" class="zoom"></a>
                                            <a href="#" class="link"></a>
                                        </div>
                                    </figure>
                                    <div class="detail">
                                        <span>$244.00</span>
                                        <h4>Brown Wood Chair</h4>
                                        <div class="icon">
                                            <a href="#" class="one tooltip" title="Add to wish list"></a>
                                            <a href="#" class="two tooltip " title="Add to cart"></a>
                                            <a href="#" class="three tooltip" title="Add to compare"></a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="span3 product">

                                <div>
                                    <figure>
                                        <a href="#"><img src="http://placehold.it/270x186" alt=""></a>
                                        <div class="overlay">
                                            <a href="http://placehold.it/270x186" class="zoom"></a>
                                            <a href="#" class="link"></a>
                                        </div>
                                    </figure>
                                    <div class="detail">
                                        <span>$244.00</span>
                                        <h4>Brown Wood Chair</h4>
                                        <div class="icon">
                                            <a href="#" class="one tooltip" title="Add to wish list"></a>
                                            <a href="#" class="two tooltip " title="Add to cart"></a>
                                            <a href="#" class="three tooltip" title="Add to compare"></a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- PRODUCT-OFFER -->
                
                <!-- CLIENTS -->
                <div class="clients-wrap">
                    <div class="container">
                        <div class="row heading-wrap">
                            <div class="span12 heading">
                                <h2>Our Brands <span></span></h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="span12 clients">
                                <ul class="elastislide-list clearfix" id="carousel">
                                    <li><a href="#"><img src="http://placehold.it/141x28" alt=""></a></li>
                                    <li><a href="#"><img src="http://placehold.it/141x28" alt=""></a></li>
                                    <li><a href="#"><img src="http://placehold.it/141x28" alt=""></a></li>
                                    <li><a href="#"><img src="http://placehold.it/141x28" alt=""></a></li>
                                    <li><a href="#"><img src="http://placehold.it/141x28" alt=""></a></li>
                                    <li><a href="#"><img src="http://placehold.it/141x28" alt=""></a></li>
                                    <li><a href="#"><img src="http://placehold.it/141x28" alt=""></a></li>
                                    <li><a href="#"><img src="http://placehold.it/141x28" alt=""></a></li>
                                    <li><a href="#"><img src="http://placehold.it/141x28" alt=""></a></li>
                                    <li><a href="#"><img src="http://placehold.it/141x28" alt=""></a></li>
                                    <li><a href="#"><img src="http://placehold.it/141x28" alt=""></a></li>
                                    <li><a href="#"><img src="http://placehold.it/141x28" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CLIENTS -->
                
                <!-- CATEGORIES -->
                <div class="categories-wrap">
                    <div class="container">
                        <div class="row">

                            <div class="span4">
                                <div class="categories">
                                    <figure>
                                        <img src="http://placehold.it/370x133" alt="">
                                        <div class="cate-overlay">
                                            <a href="#">Single Seat</a>
                                        </div>
                                    </figure>
                                </div>
                            </div>

                            <div class="span4">
                                <div class="categories">
                                    <figure>
                                        <img src="http://placehold.it/370x133png" alt="">
                                        <div class="cate-overlay">
                                            <a href="#">Surfaces</a>
                                        </div>
                                    </figure>
                                </div>
                            </div>

                            <div class="span4">
                                <div class="categories">
                                    <figure>
                                        <img src="http://placehold.it/370x133" alt="">
                                        <div class="cate-overlay">
                                            <a href="#">Storage</a>
                                        </div>
                                    </figure>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- CATEGORIES -->

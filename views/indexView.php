    <style>
        .swiper-container {
            width: 100%;
            height: 100%;
            margin-bottom: 1.5em;
        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
        .swiper-pagination-bullet-active {
            background: #000;
        }
    </style>
    <div class="wrapper">
                    <div class="container">
                        <div class="row" >
                           <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="<?=_WEB_PATH?>views/img/007.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?=_WEB_PATH?>views/img/002.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?=_WEB_PATH?>views/img/003.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?=_WEB_PATH?>views/img/004.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?=_WEB_PATH?>views/img/005.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?=_WEB_PATH?>views/img/006.jpg" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?=_WEB_PATH?>views/img/012.jpg" />
                                </div>
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-black"></div>
                            <div class="swiper-button-prev swiper-button-black"></div>
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
                        
                        <div class="row product-slick">
                             <?php foreach($latestProducts as $product){?>
                                    <div class="span3 product">
                                        <div>
                                            <figure>
                                                <a href="#"><img src="<?=_WEB_PATH?>views/images/products_gallery/thumbnail/<?=$product->image_name?>" alt=""></a>
                                                <div class="overlay">
                                                    <a href="<?=_WEB_PATH?>views/images/products_gallery/normal/<?=$product->image_name?>" class="zoom"></a>
                                                    <a href="<?=_WEB_PATH?>products/singleProduct/<?=$product->product_id?>/<?=$product->product_name_url?>" class="link"></a>
                                                </div>
                                            </figure>
                                            <div class="detail">
                                                <span><?=$product->product_price?> €</span>
                                                <a href="<?=_WEB_PATH?>products/singleProduct/<?=$product->product_id?>/<?=$product->product_name_url?>"><h4><?=$product->product_name?></h4></a>
                                                <div class="icon">
                                                    <a href="#" class="add-to-cart one tooltip" data-id="<?=$product->product_id?>" data-price="<?=$product->product_price?>" data-name="<?=$product->product_name?>" data-img="<?=$product->image_name?>" data-quantity="1" title="Add to wish list"></a>
<!--                                                    <a href="#" class="two tooltip " title="Add to cart"></a>
                                                    <a href="#" class="three tooltip" title="Add to compare"></a>-->
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
                       <div class="row product-slick">
                             <?php foreach($latestProducts as $product){?>
                                    <div class="span3 product">
                                        <div>
                                            <figure>
                                                <a href="#"><img src="<?=_WEB_PATH?>views/images/products_gallery/thumbnail/<?=$product->image_name?>" alt=""></a>
                                                <div class="overlay">
                                                    <a href="<?=_WEB_PATH?>views/images/products_gallery/normal/<?=$product->image_name?>" class="zoom"></a>
                                                    <a href="<?=_WEB_PATH?>products/singleProduct/<?=$product->product_id?>/<?=$product->product_name_url?>" class="link"></a>
                                                </div>
                                            </figure>
                                            <div class="detail">
                                                <span><?=$product->product_price?> €</span>
                                                <a href="<?=_WEB_PATH?>products/singleProduct/<?=$product->product_id?>/<?=$product->product_name_url?>"><h4><?=$product->product_name?></h4></a>
                                                <div class="icon">
                                                    <a href="#" class="add-to-cart one tooltip" data-id="<?=$product->product_id?>" data-price="<?=$product->product_price?>" data-name="<?=$product->product_name?>" data-img="<?=$product->image_name?>" data-quantity="1" title="Add to wish list"></a>
<!--                                                    <a href="#" class="two tooltip " title="Add to cart"></a>
                                                    <a href="#" class="three tooltip" title="Add to compare"></a>-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                <?php } ?>
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

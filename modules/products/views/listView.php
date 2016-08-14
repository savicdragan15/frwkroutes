<?php //var_dump($products); ?> 
<!-- BAR -->
                <div class="bar-wrap">
                    <div class="container">
                       <!-- <div class="row">
                            <div class="span12">
                                <div class="title-bar">
                                    <h1>JACKETS</h1>
                                </div>
                            </div>
                        </div> -->

                        <div class="row">
                            <div class="span12">
                                <div class="sorting-bar clearfix">
                                    <div>
                                        <label>Sort by</label>
                                        <select>
                                            <option>Position</option>
                                        </select>
                                    </div>

                                    <div class="show">
                                        <label>SHOW</label>
                                        <select>
                                            <option>5 per page</option>
                                        </select>
                                    </div>

                                    <div class="sorting-btn clearfix">
                                        <label>View As</label>
                                        <a href="#" class="one"></a>
                                        <a href="#" class="two"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BAR -->
    <div class="product_wrap">
                    <div class="container">
                        <div class="row">
                            <div class="span9">
                                <div class=" product-list clearfix">
                                <?php foreach ($products as $product) {?>
                                    <div class="product clearfix">
                                        <figure>
                                            <a href="#"><img src="<?=_WEB_PATH?>views/images/products_gallery/thumbnail/<?=$product->image_name?>" alt="image"></a>
                                            <div class="overlay">
                                                <a href="<?=_WEB_PATH?>views/images/products_gallery/normal/<?=$product->image_name?>" class="zoom"></a>
                                                <a href="#" class="link"></a>
                                            </div>
                                        </figure>
                                        <div class="detail">
                                            <h4><?= $product->product_name ?></h4>
                                            <span><?= $product->product_price ?> €</span>
                                            <p><?= $product->product_description ?></p>
                                            <div class="icon">
                                                <a href="#" class="one tooltip" title="Add to wish list"></a>
                                                <a href="#" class="two tooltip " title="Add to cart"></a>
                                                <a href="#" class="three tooltip" title="Add to compare"></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>

                                <div class="pagination clearfix">
                                    <p>Items <?=$limit?> of <?=$total?> total</p>
                                    <ul class="clearfix">
                                        <?php foreach($pagination as $key => $page){?>
                                            <?php if($page == 'current'){?>
                                              <li><a style="background-color: gray; color: white;" href="<?=_WEB_PATH?>products/allProductsByCategory/<?=$category_id?>/<?=$key?>/<?=$category_name?>"><?=$key?></a></li>
                                            <?php }else if($page == 'less' || $page == 'more'){ ?>
                                                <li><a href="<?=_WEB_PATH?>products/allProductsByCategory/<?=$category_id?>/<?=$key?>/<?=$category_name?>">...</a></li>
                                            <?php }else{ ?>
                                              <li><a href="<?=_WEB_PATH?>products/allProductsByCategory/<?=$category_id?>/<?=$key?>/<?=$category_name?>"><?=$key?></a></li>
                                           <?php }
                                        } ?>
                                        <!--<li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">></a></li> -->
                                    </ul>
                                </div>
                            </div>

                            <div class="span3">
                                <div id="sidebar">
                                    <div class="widget">
                                        <h4>CATEGORIES</h4>

                                        <div id="accordion">
                                            <h5><a href="#">Jewellery (5)</a></h5>
                                            <div>
                                                <ul>
                                                    <li>Jackets (7)</li>
                                                    <li>Kids & Babies (5)</li>
                                                    <li>Electronics (4) </li>
                                                    <li>Sports (9)</li>
                                                </ul>
                                            </div>

                                            <h5><a href="#">Technology (6)</a></h5>
                                            <div>
                                                <ul>
                                                    <li>Jackets (7)</li>
                                                    <li>Kids & Babies (5)</li>
                                                    <li>Electronics (4) </li>
                                                    <li>Sports (9)</li>
                                                </ul>
                                            </div>

                                            <h5><a href="#">Kids & Babies (8)</a></h5>
                                            <div>
                                                <ul>
                                                    <li>Jackets (7)</li>
                                                    <li>Jackets (7)</li>
                                                    <li>Jackets (7)</li>
                                                    <li>Jackets (7)</li>
                                                </ul>
                                            </div>

                                            <h5><a href="#">Electronics (4)</a></h5>
                                            <div>
                                                <ul>
                                                    <li>Jackets (7)</li>
                                                    <li>Kids & Babies (5)</li>
                                                    <li>Electronics (4) </li>
                                                    <li>Sports (9)</li>
                                                </ul>
                                            </div>

                                            <h5><a href="#">Watches (9)</a></h5>
                                            <div>
                                                <ul>
                                                    <li>Jackets (7)</li>
                                                    <li>Kids & Babies (5)</li>
                                                    <li>Electronics (4) </li>
                                                    <li>Sports (9)</li>
                                                </ul>
                                            </div>

                                            <h5><a href="#">Sports (5)</a></h5>
                                            <div>
                                                <ul>
                                                    <li>Jackets (7)</li>
                                                    <li>Kids & Babies (5)</li>
                                                    <li>Electronics (4) </li>
                                                    <li>Sports (9)</li>
                                                </ul>
                                            </div>

                                            <h5><a href="#">Bicycles (2)</a></h5>
                                            <div>
                                                <ul>
                                                    <li>Jackets (7)</li>
                                                    <li>Kids & Babies (5)</li>
                                                    <li>Electronics (4) </li>
                                                    <li>Sports (9)</li>
                                                </ul>
                                            </div>

                                            <h5><a href="#">Home & Garden (8)</a></h5>
                                            <div>
                                                <ul>
                                                    <li>Jackets (7)</li>
                                                    <li>Kids & Babies (5)</li>
                                                    <li>Electronics (4) </li>
                                                    <li>Sports (9)</li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="widget">
                                        <h4>Price Filter</h4>
                                        <div class="price-range">
                                            <div id="slider-range"></div>
                                            <p class="clearfix">
                                                <input type="text" id="amount" />
                                                <input type="text" id="amount2" />
                                            </p>
                                        </div>
                                    </div>

                                    <div class="widget">
                                        <h4>Featured Products</h4>

                                        <div class="featured">
                                            <ul>
                                                <li class="clearfix">
                                                    <figure>
                                                        <a href="#"><img src="http://placehold.it/50x50" alt=""></a>
                                                    </figure>
                                                    <div>
                                                        <h5>Brown Wood Chair</h5>
                                                        <span>$244.00</span>
                                                    </div>
                                                </li>

                                                <li class="clearfix">
                                                    <figure>
                                                        <a href="#"><img src="http://placehold.it/50x50" alt=""></a>
                                                    </figure>
                                                    <div>
                                                        <h5>Brown Wood Chair</h5>
                                                        <span>$244.00</span>
                                                    </div>
                                                </li>

                                                <li class="clearfix last">
                                                    <figure>
                                                        <a href="#"><img src="http://placehold.it/50x50" alt=""></a>
                                                    </figure>
                                                    <div>
                                                        <h5>Brown Wood Chair</h5>
                                                        <span>$244.00</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT-OFFER -->


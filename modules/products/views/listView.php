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
                                        <a href="#" class="one" id='grdView'></a>
                                        <a href="#" class="two" id='lstView'></a>
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
                              <?php
                             if(isset($cat_id))
                                 $cat_id=$cat_id."/";
                             else
                                 $cat_id="";
                             
                             // $controllerMethod
                              ?>
                                <div class="pagination clearfix">
                                    <p>Items <?=$limit?> of <?=$total?> total</p>
                                    <ul class="clearfix">
                                        <?php foreach($pagination as $key => $page){?>
                                            <?php if($page == 'current'){?>
                                              <li><a style="background-color: gray; color: white;" href="<?=_WEB_PATH?>products/<?=$controllerMethod?>/<?=$category_id?>/<?=$cat_id?><?=$key?>/<?=$category_name?>"><?=$key?></a></li>
                                            <?php }else if($page == 'less' || $page == 'more'){ ?>
                                                <li><a href="<?=_WEB_PATH?>products/<?=$controllerMethod?>/<?=$category_id?>/<?=$cat_id?><?=$key?>/<?=$category_name?>">...</a></li>
                                            <?php }else{ ?>
                                              <li><a href="<?=_WEB_PATH?>products/<?=$controllerMethod?>/<?=$category_id?>/<?=$cat_id?><?=$key?>/<?=$category_name?>"><?=$key?></a></li>
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
                        <?php
                       echo Loader::loadPartialView('sidebar','products',false,array('navigation'=>$navigation))
                                
                        ?>
                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT-OFFER -->


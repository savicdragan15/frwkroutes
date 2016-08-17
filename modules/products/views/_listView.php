 <div class="span9">
                                <div class=" product-list clearfix">
                                <?php foreach ($params['products'] as $product) {?>
                                    <div class="product clearfix">
                                        <figure>
                                            <a href="#"><img src="<?=_WEB_PATH?>views/images/products_gallery/thumbnail/<?=$product->image_name?>" alt="image"></a>
                                            <div class="overlay">
                                                <a href="<?=_WEB_PATH?>views/images/products_gallery/normal/<?=$product->image_name?>" class="zoom"></a>
                                                <a href="<?=_WEB_PATH?>products/singleProduct/<?=$product->ID?>/<?=$product->product_name_url?>" class="link"></a>
                                            </div>
                                        </figure>
                                        <div class="detail">
                                            <a href="<?=_WEB_PATH?>products/singleProduct/<?=$product->ID?>/<?=$product->product_name_url?>"><h4><?= $product->product_name ?></h4></a>
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
                             if(isset($params['cat_id']))
                                 $cat_id = $params['cat_id']."/";
                             else
                                 $cat_id="";
                             
                             // $controllerMethod
                              ?>
                                <div class="pagination clearfix">
                                    <p>Items <?=$params['limit']?> of <?=$params['total']?> total</p>
                                    <ul class="clearfix">
                                        <?php foreach($params['pagination'] as $key => $page){?>
                                            <?php if($page == 'current'){?>
                                              <li><a style="background-color: gray; color: white;" href="<?=_WEB_PATH?>products/<?=$params['controllerMethod']?>/<?=$params['category_id']?>/<?=$cat_id?><?=$key?>/<?=$params['category_name']?>"><?=$key?></a></li>
                                            <?php }else if($page == 'less' || $page == 'more'){ ?>
                                                <li><a href="<?=_WEB_PATH?>products/<?=$params['controllerMethod']?>/<?=$params['category_id']?>/<?=$cat_id?><?=$key?>/<?=$params['category_name']?>">...</a></li>
                                            <?php }else{ ?>
                                              <li><a href="<?=_WEB_PATH?>products/<?=$params['controllerMethod']?>/<?=$params['category_id']?>/<?=$cat_id?><?=$key?>/<?=$params['category_name']?>"><?=$key?></a></li>
                                           <?php }
                                        } ?>
                                        <!--<li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">></a></li> -->
                                    </ul>
                                </div>
                            </div>
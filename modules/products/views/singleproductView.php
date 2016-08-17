    
    <div class="product_wrap">
                    <div class="container">
                        <div class="row">
                            <div class="span9">
                                <div class="single clearfix">
                                    <div class="wrap span5">
                                        <div id="carousel-wrapper">
                                            <div id="carousel" class="cool-carousel">
                                                <span id="image1"><img src="<?=_WEB_PATH?>views/images/products_gallery/normal/<?=$product->image_name?>" alt=""/></span>
                                                <span id="image2"><img src="http://placehold.it/470x311" alt="" /></span>
                                            </div>
                                            <a href="#" class="prev"></a><a href="#" class="next"></a>
                                        </div>

                                        <div class="bottom">
                                            <div id="thumbs-wrapper">
                                                <div id="thumbs">
                                                    <a href="#image1" class="selected"><img src="<?=_WEB_PATH?>views/images/products_gallery/thumbnail/<?=$product->image_name?>"  alt="" /></a>
                                                    <a href="#image2"><img src="http://placehold.it/97x60" alt="" /></a>
                                                  
                                                </div>
                                                <a id="prev" href="#"></a>
                                                <a id="next" href="#"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="span4">
                                        <div class="product-detail">
                                            <h4><?=$product->product_name?></h4>
                                            <span><?=$product->product_price?> €</span>
                                            <p><?=$product->product_description?></p>
                                        </div>
                                        <div class="product-type clearfix">
                                            <div>
                                                <label>Select Size</label>
                                                <select>
                                                    <option>XXS</option>
                                                </select>
                                            </div>

                                            <div>
                                                <label>Quantity</label>
                                                <select>
                                                    <option>1</option>
                                                </select>
                                            </div>

                                            <div class="color">
                                                <label>Color</label>
                                                <select>
                                                    <option>Dark Blue</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="buttons">
                                            <a href="#" class="wish big-button">Add to Wishlist</a>
                                            <a href="#" class="cart big-button">Add to Cart</a>
                                            <a href="#" class="compare big-button">Add to Compare</a>
                                        </div>
                                    </div>
                                </div>

                                <div id="product_tabs">
                                    <ul class="clearfix">
                                        <li><a href="#tabs-1">Product Description</a></li>
                                        <li><a href="#tabs-2">Tags</a></li>
                                        <li><a href="#tabs-3">Reviews</a></li>
                                    </ul>
                                    <!--TABS-->
                                    <div id="tabs-1" class="tab" >
                                        <p><?=$product->product_description?></p>
                                    </div>

                                    <div id="tabs-2" class="tab" >
                                        <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo.</p>
                                    </div>

                                    <div id="tabs-3" class="tab" >
                                        <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
                                    </div>

                                </div>

                            </div>

                            <div class="span3">
                            <?php
                                echo Loader::loadPartialView('_sidebar','products',false,array('navigation'=>$navigation)); 
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT-OFFER -->
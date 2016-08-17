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
                                            <a href="#" title='Grid view' class="one" id='grdView'></a>
                                            <a href="#" title='List view' class="two" id='lstView'></a>
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
                            <div id="list_partial">   
                            <?php
                                 Loader::loadPartialView('_list','products',false,array('params'=>$partial_params));     
                            ?>
                         </div>
                            <div class="span3">
                        <?php
                             Loader::loadPartialView('_sidebar','products',false,array('navigation'=>$navigation));     
                        ?>
                              
                    </div>
                </div>
            </div>
        </div>
    </div>
                <!-- PRODUCT-OFFER -->


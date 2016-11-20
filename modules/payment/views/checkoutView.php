<div class="product_wrap">
<?php //var_dump($price_and_quantity, $products_in_cart); die; ?>
<div class="container">
    <div class="row">
        <div class="span12">

            <div id="check-accordion">
                <h5><small>STEP 1</small><a href="#">Shipping Methods</a></h5>

                <div class="clearfix">
                    <div class=" payment">
                        <p>Please select the preferred payment method to use on this order.</p>

                        <form action="<?=_WEB_PATH?>payment/processPayment" method="POST" id="buy">
                            <?php foreach($shipping_methods as $key=>$method){?>
                            <div class="radio-btn"> 
                                <input type="radio" <?=$key==0?'checked':''?> name="shipping_type"  data-price="<?=$method->price?>" value="<?=$method->ID?>" id="<?=$method->ID?>"/>
                                <label for="<?=$method->ID?>"><?=$method->name?></label>
                            </div>
                            <?php } ?>
                    </div>
                </div>


                <h5><small>STEP 2</small><a href="#">Payment Method</a></h5>

                <div class="clearfix">
                    <div class=" payment">
                        <p>Please select the preferred shipping method to use on this order.</p>

                     
                            
                          <?php foreach ($payment_methods as $method){?>
                            <div class="radio-btn">
                                <input type="radio" checked="checked" name="payment_method" value="<?=$method->ID?>" id="eps"/>
                                <label for="eps"><?=$method->preview_name?></label>
                            </div>
                            <?php } ?>
<!--                            <label>Add Comments About Your Order  </label>
                            <textarea></textarea>
                            <input type="submit" value="continue" class="red-button">-->
                       
                    </div>

                </div>

                <h5><small>STEP 3</small><a href="#">Confirm Orders</a></h5>

                <div class="clearfix">
                    <div class="billing">
                        <p>Please select the preferred payment method to use on this order.</p>
                        <ul class="title">
                            <li>Product Name Here</li>
                            <li>Model</li>
                            <li>Quantity</li>
                            <li>Price</li>
                            <li class="last">Total</li>
                        </ul>
                        <?php if(!empty($products_in_cart)){
                            foreach ($products_in_cart as $product) {
                       ?>
                        <ul>
                            <li><?=$product['proizvod_naziv']?></li>
                            <li>Model name</li>
                            <li><?=$product['proizvod_kolicina']?>x</li>
                            <li><?=number_format($product['proizvod_cena'], 2, '.', '')?> €</li>
                            <li class="last"><?=number_format($product['ukupna_cena'], 2, '.', '')?> €</li>
                        </ul>
                        
                       <?php } }?>
                        <?php if(!empty($price_and_quantity)){?>
                        <?php $vat = number_format($price_and_quantity['ukupna_cena_korpe']*_VAT, 2, '.', ''); ?>
                        <div class="totle">
                            <ul>
                                <li>Sub-Total: <span><?=number_format($price_and_quantity['ukupna_cena_korpe'], 2, '.', '');?> €</span></li>
                                <li>Flat Shipping Rate: <span id="shipping-price"> - </span></li>
                                <li>VAT (20.0%):<span id="vat" data-vat="<?=$vat?>"><?=$vat?> €</span></li>
                                <li>Total: <span id="total-price" data-total-price="<?=number_format($price_and_quantity['ukupna_cena_korpe'] + $vat, 2, '.', '');?>"><?=number_format($price_and_quantity['ukupna_cena_korpe'] + $vat, 2, '.', '');?> €</span></li>
                            </ul>
                            <input type="hidden" name="total_price" id="hidden_price" value="<?=number_format($price_and_quantity['ukupna_cena_korpe'] + $vat, 2, '.', '');?>" />
                            <input type="submit" name="submit" class="red-button" value="Buy" />
                          </form>
                        </div>
                        <?php } ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
</div>

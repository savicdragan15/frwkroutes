<div class="product_wrap">
<?php //var_dump($price_and_quantity, $products_in_cart); die; ?>
<div class="container">
    <div class="row">
        <div class="span12">

            <div id="check-accordion">
<!--
                <h5><small>STEP 1</small><a href="#">CHECKOUT INFORMATION</a></h5>

                <div class="clearfix">
                    <div class="span6 cheakout clearfix">
                        <h6>New Customer ? <span>Choose your Checkout options:</span></h6>
                        <form>
                            <input type="radio"> <label>Check out as a Guest</label> <br/>
                            <input type="radio"> <label>Register Account</label>

                            <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                            <input type="submit" value="continue">
                        </form>
                    </div>

                    <div class="span6 cheakout clearfix register">
                        <h6>Registered Customer ? <span>Please fill the form below</span></h6>
                        <form class="clearfix">
                            <label>Your e-mail address</label>
                            <input type="text" placeholder="yourmail@domain.com"><br/>
                            <label>Your Password</label>
                            <input type="text" placeholder="enter your password"><br/>
                            <a href="#" >Forgot your password ?</a>
                            <input type="submit" value="Login">
                        </form>
                    </div>

                </div>-->

<!--                <h5><small>STEP 2</small><a href="#">Billing Information</a></h5>

                <div class=" clearfix">
                    <form class="billing-form clearfix">
                        <fieldset>
                            <label>First name</label>
                            <input type="text"/>
                            <label>Company</label>
                            <input type="text"/>
                        </fieldset>

                        <fieldset class="last">
                            <label>Last Name</label>
                            <input type="text"/>
                            <label>E-mail Address</label>
                            <input type="text"/>
                        </fieldset>

                        <label>Address</label>
                        <input type="text"/>
                        <input type="text"/>

                        <fieldset>
                            <label>City</label>
                            <input type="text"/>
                            <label>Zip/Postal Code</label>
                            <input type="text"/>
                            <label>Telephone</label>
                            <input type="text"/>
                        </fieldset>

                        <fieldset class="last">
                            <label>State/Province</label>
                            <select>
                                <option>State</option>
                            </select>
                            <label>Country</label>
                            <select>
                                <option>Pakistan</option>
                            </select>
                            <label>Fax</label>
                            <input type="text"/>
                        </fieldset>

                        <input type="checkbox"/> <p>My delivery and billing addresses are the same.</p>

                        <input type="submit" value="continue" class="red-button">

                    </form>
                </div>-->

<!--                <h5><small>STEP 3</small><a href="#">Delivery Details</a></h5>

                <div class="clearfix">
                    <form class="billing-form clearfix">
                        <fieldset>
                            <label>First name</label>
                            <input type="text"/>
                            <label>Company</label>
                            <input type="text"/>
                        </fieldset>

                        <fieldset class="last">
                            <label>Last Name</label>
                            <input type="text"/>
                            <label>E-mail Address</label>
                            <input type="text"/>
                        </fieldset>

                        <label>Address</label>
                        <input type="text"/>
                        <input type="text"/>

                        <fieldset>
                            <label>City</label>
                            <input type="text"/>
                            <label>Zip/Postal Code</label>
                            <input type="text"/>
                            <label>Telephone</label>
                            <input type="text"/>
                        </fieldset>

                        <fieldset class="last">
                            <label>State/Province</label>
                            <select>
                                <option>State</option>
                            </select>
                            <label>Country</label>
                            <select>
                                <option>Pakistan</option>
                            </select>
                            <label>Fax</label>
                            <input type="text"/>
                        </fieldset>

                        <input type="checkbox"/> <p>My delivery and billing addresses are the same.</p>

                        <input type="submit" value="continue" class="red-button">

                    </form>

                </div>-->

                <h5><small>STEP 1</small><a href="#">Shipping Methods</a></h5>

                <div class="clearfix">
                    <div class=" payment">
                        <p>Please select the preferred payment method to use on this order.</p>

                        <form action="" id="buy">
                            <div class="radio-btn"> 
                                <input type="radio" checked="checked" name="shipping_type"  data-price="<?=number_format(_SELF_PICK_UP, 2, '.', '');?>" value="self_pickup" id="self_pickup"/>
                                <label for="self_pickup">Self pick up &nbsp; FREE</label>
                            </div>
                            <div class="radio-btn">
                                <input type="radio" name="shipping_type" data-price="<?=number_format(_POST, 2, '.', '');?>" value="post" id="post"/>
                                <label for="post">Post &nbsp;<?=number_format(_POST, 2, '.', '');?> €</label>
                            </div>
                            <div class="radio-btn">
                                <input type="radio" name="shipping_type" data-price="<?=number_format(_DHL, 2, '.', '');?>" value="dhl" id="dhl"/>
                                <label for="dhl">DHL &nbsp;<?=number_format(_DHL, 2, '.', '');?> €</label>
                            </div>
<!--                            <label>Add Comments About Your Order </label>
                            <textarea></textarea>-->
                       
                    </div>
                </div>


                <h5><small>STEP 2</small><a href="#">Payment Method</a></h5>

                <div class="clearfix">
                    <div class=" payment">
                        <p>Please select the preferred shipping method to use on this order.</p>

                     
                            <label>Flat Rate</label>
                            <div class="radio-btn">
                                <input type="radio" checked="checked" name="payment_method" value="eps" id="eps"/>
                                <label for="eps">Eps überweisung</label>
                            </div>
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
                            <li><?=$product['proizvod_cena']?> €</li>
                            <li class="last"><?=$product['ukupna_cena']?> €</li>
                        </ul>
                        
                       <?php } }?>
                        <?php if(!empty($price_and_quantity)){?>
                        <div class="totle">
                            <ul>
                                <li>Sub-Total: <span><?=$price_and_quantity['ukupna_cena_korpe']?> €</span></li>
                                <li>Flat Shipping Rate: <span id="shipping-price"></span></li>
                                <li>VAT (20.0%):<span><?=$vat = $price_and_quantity['ukupna_cena_korpe']*_VAT;?> €</span></li>
                                <li>Total: <span id="total-price" data-total-price="<?=$price_and_quantity['ukupna_cena_korpe'] + $vat?>"><?=$price_and_quantity['ukupna_cena_korpe'] + $vat?> €</span></li>
                            </ul>
                            <input type="submit" class="red-button" value="Buy" />
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

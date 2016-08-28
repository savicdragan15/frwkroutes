  <?php //var_dump($products); die;?>
<div class="shopping-cart">
                    <?php if(!empty($products)){ ?>
                                    <ul class="title clearfix">
                                        <li>Image</li>
                                        <li class="second">Product Name</li>
                                        <li>Quantity</li>
                                        <li>Unite Price</li>
                                        <li>Sub Total</li>
                                        <li class="last">Action</li>
                                    </ul>
                                 <?php
                                 foreach($products as $product){ 
                                     if(is_array($product)){
                                         ?>
                                    <ul class=" clearfix" id="row<?=$product['proizvod_id']?>">
                                        <li>
                                            <figure><img src="<?=_WEB_PATH?>views/images/products_gallery/thumbnail/<?=$product['proizvod_slika']?>" alt=""></figure>
                                        </li>
                                        <li class="second">
                                            <h4><?=$product['proizvod_naziv']?></h4>
                                            <p><span>Color:</span> Brown</p>
                                            <p><span>Size:</span> 12</p>
                                        </li>
                                        <li>
                                            <input type="number" value="<?=$product['proizvod_kolicina']?>">
                                        </li>
                                        <li><?=number_format($product['proizvod_cena'], 2, '.', '');?> €</li>
                                        <li><?=number_format($product['ukupna_cena'], 2, '.', '');?> €</li>
                                        <li class="last" >
                                            <a class="remove-from-cart-dialog" data-product-id="<?=$product['proizvod_id']?>" href="#">X</a>
                                        </li>
                                    </ul>
                            <?php    } 
                                    } 
                                  }else{ ?>
    <div> <p>Vasa korpa je prazna.</p> </div>
                                <?php  }?>
                                    <a href="#" class="red-button">Continue Shopping</a>
                                    <a href="#" class="red-button black">Update Shopping Cart</a>

                                </div>

<div class="row cart-calculator clearfix">
                            <div class="span4">
                                <h6>Estimate Shipping & Taxes</h6>
                                <div class="estimate clearfix">
                                    <form>
                                        <select>
                                            <option>-- Select Your Country --</option>
                                            <option>Pakistan</option>
                                        </select>

                                        <select>
                                            <option>-- Select Your Region --</option>
                                        </select>

                                        <input type="text" placeholder="Your Postcode">
                                        <input type="submit"  class="red-button" value="Get Quotes" >
                                    </form>
                                </div>
                            </div>

                            <div class="span4">
                                <h6>Discount Codes</h6>
                                <div class="estimate clearfix">
                                    <form>
                                        <input type="text" placeholder="Your Postcode">
                                        <input type="submit"  class="red-button" value="Get Quotes" >
                                    </form>
                                </div>
                            </div>

                            <div class="span4 total clearfix">
                                <ul class="black">
                                    <li>Total:</li>
                                </ul>
                                <ul class="gray">
                                    <li id="total-price-cart"><?=number_format($products['ukupna_cena_korpe'], 2, '.', '');?> €</li>
                                </ul>
                                <a href="#" class="red-button">Proceed to Checkout</a>
                            </div>
                        </div>
                <script>
                    $('.remove-from-cart-dialog').click(function(e){
                        e.preventDefault();
                        e.stopPropagation();
                        var formData = {
                        'proizvod_id': $(this).attr('data-product-id')
                      }; 
                    ajaxCall(formData,'<?=_WEB_PATH?>cart/removeFromCart',function(data){
                        data = JSON.parse(data);
                        $('#row'+data.proizvod_id).remove();
                        $('#cart-info').html(data.broj_proizvoda_u_korpi+' items');
                        $('#total-price-cart').html(data.ukupna_cena_korpe+'.00 €');
                        if(data.broj_proizvoda_u_korpi == 0){
                           $('.shopping-cart').html("Vasa korpa je prazna.");
                        }
                    });
                });
                </script>
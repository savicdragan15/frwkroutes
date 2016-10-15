
<!-- PRODUCT-OFFER -->
<div class="product_wrap">

    <div class="container">
        <div class="row">
            <div class="span12">

                <div id="check-accordion">
                      <h5><small></small><a href="#">Payment Methods</a></h5>

                    <div class="clearfix">
                        <div class=" payment">
                            <p>Please select the preferred payment method to use on this order.</p>

                            <form method="POST" action="<?=_WEB_PATH."payment/processPayment"?>">
                                <div class="radio-btn">
                                    <input type="radio" name="type" value="eps" checked/>
                                    <label>Eps</label>
                                </div>
                               <!-- <span>$255.99</span> -->
                                <label>Add Comments About Your Order </label>
                                <textarea></textarea>
                                <input type="submit" value="continue" name="submit" class="red-button">
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCT-OFFER -->
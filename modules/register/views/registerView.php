
<!-- PRODUCT-OFFER -->
<div class="product_wrap">

    <div class="container">
        <div class="row">
            <div class="span12">

                <div id="check-accordion">

                    <h5><small>Registration</small><a href="#">Please enter your data to register.</a></h5>

                    <div class="clearfix">
                        <form method="POST" action="<?=_WEB_PATH?>register" class="billing-form clearfix">
                            <fieldset>
                                <label>First name</label>
                                <input name="first_name" tabindex="1" type="text"/>
                                <label>Company</label>
                                <input name="company" tabindex="3" type="text"/>
                                <label>Password</label>
                                <input name="password" tabindex="5" type="password"/>
                            </fieldset>

                            <fieldset class="last">
                                <label>Last Name</label>
                                <input name="last_name" tabindex="2" type="text"/>
                                <label>E-mail Address</label>
                                <input name="email" tabindex="4" type="text"/>
                                <label>Re-password</label>
                                <input name="re-password" tabindex="6" type="password"/>
                            </fieldset>
                            
                            <label>Address</label>
                            <input type="text" tabindex="7"/>

                            <fieldset>
                                <label>City</label>
                                <input type="text" tabindex="8"/>
                                <label>Zip/Postal Code</label>
                                <input type="text" tabindex="10"/>
                                <label>Telephone</label>
                                <input type="text" tabindex="12"/>
                            </fieldset>

                            <fieldset class="last">
                                <label>State/Province</label>
                                <select tabindex="13">
                                    <option>State</option>
                                </select>
                                <label>Country</label>
                                <select tabindex="15">
                                    <option>Austria</option>
                                </select>
                                <label>Fax</label>
                                <input type="text" tabindex="17"/>
                            </fieldset>

                           <!-- <input type="checkbox"/> <p>My delivery and billing addresses are the same.</p> -->

                            <input type="submit" value="continue" name="register" class="red-button">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCT-OFFER -->
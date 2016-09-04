
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
                                <input name="first_name" type="text"/>
                                <label>Company</label>
                                <input name="company" type="text"/>
                                <label>Password</label>
                                <input name="password" type="password"/>
                            </fieldset>

                            <fieldset class="last">
                                <label>Last Name</label>
                                <input name="last_name"type="text"/>
                                <label>E-mail Address</label>
                                <input name="email" type="text"/>
                                <label>Re-password</label>
                                <input name="re-password" type="password"/>
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
                                    <option>Austria</option>
                                </select>
                                <label>Fax</label>
                                <input type="text"/>
                            </fieldset>

                            <input type="checkbox"/> <p>My delivery and billing addresses are the same.</p>

                            <input type="submit" value="continue" name="register" class="red-button">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCT-OFFER -->
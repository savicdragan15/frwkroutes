
<!-- PRODUCT-OFFER -->
<div class="product_wrap">

    <div class="container">
        <div class="row">
            <div class="span12">
                <?php if(!empty($message)){ ?>
                    <div class="<?=$class?>">
                            <strong><?=$message?>!</strong>
                    </div>
                <?php } ?>
                <div id="check-accordion">

                    <h5><small>Registration</small><a href="#">Please enter your data to register.</a></h5>

                    <div class="clearfix">
                        <form method="POST" action="<?=_WEB_PATH?>register" id="registerForm" class="billing-form clearfix">
                            <fieldset>
                                <label>First name</label>
                                <input name="first_name" tabindex="1" type="text"/>
                                <label>Company</label>
                                <input name="company" tabindex="3" type="text"/>
                                <label>Password</label>
                                <input id="password" name="password" tabindex="5" type="password"/>
                            </fieldset>

                            <fieldset class="last">
                                <label>Last Name</label>
                                <input name="last_name" tabindex="2" type="text"/>
                                <label>E-mail Address</label>
                                <input name="email" tabindex="4" type="text"/>
                                <label>Re-password</label>
                                <input name="re_password" tabindex="6" type="password"/>
                            </fieldset>
                            
                            <label>Address</label>
                            <input name="address" type="text" tabindex="7"/>

                            <fieldset>
                                <label>City</label>
                                <input name="city" type="text" tabindex="8"/>
                                <label>Zip/Postal Code</label>
                                <input name="zip" type="text" tabindex="10"/>
                                <label>Telephone</label>
                                <input name="telephone" type="text" tabindex="12"/>
                            </fieldset>

                            <fieldset class="last">
                                <label>State/Province</label>
                                <select name="state_province"tabindex="13">
                                    <option>State</option>
                                </select>
                                <label>Country</label>
                                <select name="country" tabindex="15">
                                    <option>Austria</option>
                                </select>
                                <label>Fax</label>
                                <input name="fax" type="text" tabindex="17"/>
                            </fieldset>

                           <!-- <input type="checkbox"/> <p>My delivery and billing addresses are the same.</p> -->

                            <input type="submit" value="register" name="register" class="red-button">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCT-OFFER -->
  <style>
    .error-custom {
        color: red !important;
    }
/*    #email-error , #password-error {
        margin-left: 11em !important;
    }*/
</style>
<script>

        
 window.onload = function() {
       jQuery.validator.addMethod("phoneUS", function (phone_number, element) {
      phone_number = phone_number.replace(/\s+/g, "");
      return this.optional(element) || phone_number.length > 10 &&
      phone_number.match(/^\+[0-9]{12}$/);
  }, "Please specify a valid phone number");
        
       jQuery.validator.setDefaults({
          debug: true,
          success: "valid"
        });
        $( "#registerForm" ).validate({
          lang: 'en',
          errorClass: 'error-custom',
          rules: {
            first_name: {
               required: true  
            },
            last_name: {
               required: true  
            },
            company: {
               required: false  
            },
            email: {
              required: true,
              email: true
            },
            password: {
                required: true
            },
            re_password: {
              required: true, 
              equalTo: "#password"
            },
            city: {
              required: true
            },
            address: {
              required: true
            },
            telephone: {
              required: true,
              phoneUS : false,
            },
            zip: {
              required: true,
              number: true
            },
            country: {
              required: true  
            }
            
          },
            errorPlacement: function(error, element) {
               error.insertAfter(element); 
            },
            submitHandler: function() {
              document.getElementById('registerForm').submit();
            },
            highlight: function (element, errorClass) {
             $('#email').removeClass(errorClass);
             $('#password').removeClass(errorClass);
           }
        });
    };
   
</script>
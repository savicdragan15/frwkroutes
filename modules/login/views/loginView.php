
<!-- PRODUCT-OFFER -->
<div class="product_wrap">

    <div class="container">
        <div class="row">
            <div class="span12">
                <?php if(!empty($message)){ ?>
                    <div class="alert alert-danger">
                            <strong><?=$message?>!</strong>
                    </div>
                <?php } ?>
                <div id="check-accordion">
                    <h5><small>STEP 1</small><a href="#">CHECKOUT INFORMATION</a></h5>
                    <div class="clearfix">
                        <div class="span6 cheakout clearfix register">
                            <h6>Registered Customer ? <span>Please fill the form below</span></h6>
                            <form method="POST" action="" class="clearfix" id="loginForm">
                                <label>Your e-mail address</label>
                                <input id="email" name="email" type="text" placeholder="yourmail@domain.com"><br/>
                                <label>Your Password</label>
                                <input id="password" name="password" type="password" placeholder="enter your password"><br/>
                                <a href="#" >Forgot your password ?</a>
                                <input name="login" type="submit" id="loginButton" value="Login">
                            </form>
                        </div>
                        <div class="span6 cheakout clearfix">
                            <h6>New Customer ? <span>Choose your Checkout options:</span></h6>
                            <form action="<?=_WEB_PATH?>register">
                                <input type="radio" checked> <label>Register Account</label>

                                <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                                <input type="submit" value="continue">
                            </form>
                        </div>

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
    #email-error , #password-error {
        margin-left: 11em !important;
    }
</style>
<script>
  
        
    window.onload = function() {
       jQuery.validator.setDefaults({
          debug: true,
          success: "valid"
        });
        $( "#loginForm" ).validate({
          lang: 'de',
          errorClass: 'error-custom',
          rules: {
            email: {
              required: true,
              email: true
            },
            password: {
                required: true
            }
          },
            errorPlacement: function(error, element) {
               error.insertAfter(element); 
            },
            submitHandler: function() {
              document.getElementById('loginForm').submit();
            },
            highlight: function (element, errorClass) {
             $('#email').removeClass(errorClass);
             $('#password').removeClass(errorClass);
           }
        });
    };
   
</script>

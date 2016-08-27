
<!-- FOOTER -->
                <div class="shipping-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <div class="shipping">
                                    <p><span>FREE SHIPPING </span> Offered by MAXSHOP - lorem ipsum dolor sit amet mauris accumsan vitate odio tellus</p>
                                    <a href="#" class="button">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-wrap">
                    <div class="container">
                        <div class="row">

                            <div class="footer clearfix">

                                <div class="span3">
                                    <div class="widget">
                                        <h3>Customer Service</h3>
                                        <ul>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Delivery Information</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#">Terms & Conditions</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="span3">
                                    <div class="widget">
                                        <h3>Information</h3>
                                        <ul>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Delivery Information</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#">Terms & Conditions</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="span3">
                                    <div class="widget">
                                        <h3>My Account</h3>
                                        <ul>
                                            <li><a href="#">My Account</a></li>
                                            <li><a href="#">Order History</a></li>
                                            <li><a href="#">Wish List</a></li>
                                            <li><a href="#">Newsletter</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="span3">
                                    <div class="widget">
                                        <h3>Contact us</h3>
                                        <ul>
                                            <li>support@maxshop.com</li>
                                            <li>+38649 123 456 789 00</li>
                                            <li>Lorem ipsum address street no 24 b41</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <footer class="clearfix">
                                <div class="span5">
                                    <p>© 2013 Maxshop Design, All Rights Reserved</p>
                                </div>
                                <div class="span2 back-top">
                                    <a href="#"> <img src="<?=_WEB_PATH?>/views/images/back.png" alt=""></a>
                                </div>
                                <div class="span5">
                                    <div class="social-icon">
                                        <a class="rss" href=""></a>
                                        <a class="twet" href=""></a>
                                        <a class="fb" href=""></a>
                                        <a class="google" href=""></a>
                                        <a class="pin" href=""> </a>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
                <!-- FOOTER -->

				
                <!-- Scripts -->
                <script src="<?=_WEB_PATH?>/views/js/jquery-1.9.1.min.js"></script>
                <script src="<?=_WEB_PATH?>/views/js/jquery-ui.js"></script>
                <script src="<?=_WEB_PATH?>/views/js/jquery.cycle.all.js"></script>
                <script src="<?=_WEB_PATH?>/views/js/modernizr.custom.17475.js"></script>
                <script src="<?=_WEB_PATH?>/views/js/jquery.elastislide.js"></script>
                <script src="<?=_WEB_PATH?>/views/js/jquery.carouFredSel-6.0.4-packed.js"></script>
                <script src="<?=_WEB_PATH?>/views/js/jquery.selectBox.js"></script>
                <script src="<?=_WEB_PATH?>/views/js/jquery.tooltipster.min.js"></script>
                <script src="<?=_WEB_PATH?>/views/js/jquery.prettyPhoto.js"></script>
                <script src="<?=_WEB_PATH?>/views/js/pgwmodal.min.js"></script>
                <script src="<?=_WEB_PATH?>/views/js/alertify.min.js"></script>
                <script src="<?=_WEB_PATH?>/views/js/custom.js"></script>
               
                <?php 
                     
                 if(isset($params['controllerMethod'])){
                     if(isset($params['cat_id']))
                        $cat_id = $params['cat_id']."/";
                    else
                        $cat_id="";
                    
                    if(isset($params['sub_cat_id']))
                            $sub_cat_id = $params['sub_cat_id']."/";
                          else
                            $sub_cat_id ="";
                    $link_view = _WEB_PATH."products/".$params['controllerMethod']."/".$params['category_id']."/".$sub_cat_id.$cat_id."1/".$params['category_name']; 
                    
                ?>
                <script>
                 $(".add-to-cart").on("click", function(e){
                     e.preventDefault();
                     e.stopPropagation();
                     var formData = {
                         'proizvod_id': $(this).attr('data-id'),
                         'proizvod_cena': $(this).attr('data-price'),
                         'proizvod_naziv': $(this).attr('data-name')
                     }; 
                     ajaxCall(formData,'<?=_WEB_PATH?>cart/index',function(data){ 
                           data = JSON.parse(data);
                           
                          /* $.each(data.data,function(index, value){
                                console.log(value.proizvod_naziv); 
                           });*/
                           
                          /* Object.keys(data.data).forEach(function(key) {

                            console.log(key, data.data[key].proizvod_naziv);

                           });*/
                           if(data.error == false){
                              $('#cart-info').html(data.data.ukupno_proizvoda_u_korpi+' items');
                              // custom OK and Cancel label
                                // default: OK, Cancel
                                alertify.set({ labels: {
                                    ok     : "Prikazi korpu",
                                    cancel : "Nastavi kupovinu"
                                } });

                                // confirm dialog
                                alertify.confirm("Uspesno ste ubacitli proizvod u korpu", function (e) {
                                    if (e) {
                                        // user clicked "ok"
                                        openCartDialog();
                                    } else {
                                        // user clicked "cancel"
                                    }
                                });
                           }
                               
                              
                    });
                 });
                 
                $("#grdView").bind("click", function(e){
                    e.preventDefault();
                    var formData = {'type':'1'}; //Array 
                    ajaxCall(formData,'<?=$link_view?>',function(data){
                       createCookie('grid','grid',365);
                        $('#list_partial').html(data);
                        $('.tooltip').tooltipster({
                            theme: '.tooltipster-punk'
                        });
                         $('.detail .icon a').hover(
                           function(){
                            $(this).stop().animate(
                            {backgroundPosition: "(0 -42.3px)"},
                            {duration:500}
                            )
                            },
                            function(){
                        $(this).stop().animate(
                        {backgroundPosition: "(0 0)"},
                         {duration:500}
                          )
                        }
                        );
                        $(".product figure").hover(function(){
                            $(this).children('.overlay').stop(true, true).fadeIn(700);
                            }, function(){
                            $(this).children('.overlay').stop(true, true).fadeOut(500);
                        });
                         $('.product figure .overlay a').hover(
                             function(){
                                $(this).stop().animate(
                                  {backgroundPosition: "(0 -41px)"},
                                  {duration:500}
                                )
                             },
                        function(){
                            $(this).stop().animate(
                                {backgroundPosition: "(0 0)"},
                                {duration:500}
                                )
                            }
                         );
                        $("a.zoom").prettyPhoto({
                            social_tools: ''
                        });
                    $(".add-to-cart").on("click", function(e){
                        e.preventDefault();
                        alert( $(this).attr('data-id'));
                    });
                });
                     
                });

                $("#lstView").bind("click", function(e){
                    e.preventDefault();
                    var formData = {'type':'2'}; //Array
                    ajaxCall(formData,'<?=$link_view?>',function(data){
                        createCookie('grid','list',365);
                        $('#list_partial').html(data);
                        $('.tooltip').tooltipster({
                            theme: '.tooltipster-punk'
                        });
                         $('.detail .icon a').hover(
                           function(){
                            $(this).stop().animate(
                            {backgroundPosition: "(0 -42.3px)"},
                            {duration:500}
                            )
                            },
                            function(){
                        $(this).stop().animate(
                        {backgroundPosition: "(0 0)"},
                         {duration:500}
                          )
                        }
                        );
                        $(".product figure").hover(function(){
                            $(this).children('.overlay').stop(true, true).fadeIn(700);
                            }, function(){
                            $(this).children('.overlay').stop(true, true).fadeOut(500);
                        });
                         $('.product figure .overlay a').hover(
                             function(){
                                $(this).stop().animate(
                                  {backgroundPosition: "(0 -41px)"},
                                  {duration:500}
                                )
                             },
                        function(){
                            $(this).stop().animate(
                                {backgroundPosition: "(0 0)"},
                                {duration:500}
                                )
                            }
                         );
                        $("a.zoom").prettyPhoto({
                            social_tools: ''
                        });
                    $(".add-to-cart").on("click", function(e){
                        e.preventDefault();
                        alert( $(this).attr('data-id'));
                    }); 
                }); 
            });
                </script>
        <?php } ?>
            <script>
                $('#view_cart').on('click', function(e){
                 e.preventDefault();
                    openCartDialog();
                });
            </script>
        </body>
</html>


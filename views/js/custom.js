/*
	Author: Umair Chaudary @ Pixel Art Inc.
	Author URI: http://www.pixelartinc.com/
*/


$(document).ready(function(e) {

    $ = jQuery;


    $("select").selectBox();

    $( ".slider-slides" ).cycle({
        pager:'.slider-btn',
        prev: '.prev',
        next: '.next'
    });

    // ToolTip
    $('.tooltip').tooltipster({
        theme: '.tooltipster-punk'
    });

    // Lightbox
    $("a.zoom").prettyPhoto({
        social_tools: ''
    });

    $("nav ul li").hover(function(){
        $(this).children('ul').stop(true, true).fadeIn(700);
    }, function(){
        $(this).children('ul').stop(true, true).fadeOut(500);
    });

    $(".offers figure").hover(function(){
        $(this).children('.overlay').stop(true, true).fadeIn(700);
    }, function(){
        $(this).children('.overlay').stop(true, true).fadeOut(500);
    });

    $(".product figure").hover(function(){
        $(this).children('.overlay').stop(true, true).fadeIn(700);
    }, function(){
        $(this).children('.overlay').stop(true, true).fadeOut(500);
    });

    $('#carousel').elastislide({
        speed : 2000
    });

    $('footer .back-top a').click(function(e){
        e.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

    //ACCORDION
    $( "#accordion" ).accordion();
    $( "#check-accordion" ).accordion();



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

    $('.sorting-bar .sorting-btn a').hover(
        function(){
            $(this).stop().animate(
                {backgroundPosition: "(0 -29px)"},
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

    $('footer .social-icon a').hover(
        function(){
            $(this).stop().animate(
                {backgroundPosition: "(0 -20px)"},
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

    $.extend($.fx.step,{
        backgroundPosition: function(fx) {
            if (fx.pos === 0 && typeof fx.end == 'string') {
                var start = $.css(fx.elem,'backgroundPosition');
                start = toArray(start);
                fx.start = [start[0],start[2]];
                var end = toArray(fx.end);
                fx.end = [end[0],end[2]];
                fx.unit = [end[1],end[3]];
            }
            var nowPosX = [];
            nowPosX[0] = ((fx.end[0] - fx.start[0]) * fx.pos) + fx.start[0] + fx.unit[0];
            nowPosX[1] = ((fx.end[1] - fx.start[1]) * fx.pos) + fx.start[1] + fx.unit[1];
            fx.elem.style.backgroundPosition = nowPosX[0]+' '+nowPosX[1];

            function toArray(strg){
                strg = strg.replace(/left|top/g,'0px');
                strg = strg.replace(/right|bottom/g,'100%');
                strg = strg.replace(/([0-9\.]+)(\s|\)|$)/g,"$1px$2");
                var res = strg.match(/(-?[0-9\.]+)(px|\%|em|pt)\s(-?[0-9\.]+)(px|\%|em|pt)/);
                return [parseFloat(res[1],10),res[2],parseFloat(res[3],10),res[4]];
            }
        }
    });


    $(".shopping-cart li a").click(function(e){
        e.preventDefault();
        $(this).parents('ul').stop(true,true).fadeOut(100);
    });


    $('#carousel').carouFredSel({
        responsive: true,
        circular: false,
        auto: false,
        items: {
            visible: 1,
            width: 200,
            height: '56%'
        },
        prev: '.prev',
        next: '.next',
        scroll: {
            fx: 'fade'
        }
    });

    $('#thumbs').carouFredSel({
        responsive: true,
        circular: false,
        infinite: false,
        auto: false,
        prev: '#prev',
        next: '#next',
        items: {
            visible: {
                min: 2,
                max: 6
            }

        }
    });

    $('#thumbs a').click(function() {
        $('#carousel').trigger('slideTo', '#' + this.href.split('#').pop() );
        $('#thumbs a').removeClass('selected');
        $(this).addClass('selected');
        return false;
    });

    $( "#product_tabs" ).tabs();

// Range
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 1325,
        values: [ 0, 600 ],
        slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] );
            $( "#amount2" ).val(  " $" + ui.values[ 1 ] )
        }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) );
    $( "#amount2" ).val( "$"
         + $( "#slider-range" ).slider( "values", 1 ) );
 
     
    });
    
    function ajaxCall(data,url,callback,method)
    {
       method = typeof method !== 'undefined' ? method : "POST";
        $.ajax({
            url : url,//"products/allProductsByCategory/1/1/Exterior",
            type: method,
            data : data,
            success: function(data, textStatus, jqXHR)
            {
                //data - response from server
              callback(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {

            }
        });
    }

    function createCookie(name,value,days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime()+(days*24*60*60*1000));
            var expires = "; expires="+date.toGMTString();
        }
        else var expires = "";
        document.cookie = name+"="+value+expires+"; path=/";
    }
    
   function openCartDialog(url){
     $.pgwModal({
        url: url, // Returns the object "{status: 200, response: '<div class="user">John Doe</div>'}"
        maxWidth : 1200,
        ajaxOptions : {
            success : function(data) {
                if (data) {
                    $.pgwModal({ pushContent: data });
                } else {
                    $.pgwModal({ pushContent: 'Doslo je do greske!' });
                }
            }
        }
    });
    
   }
        $(document).ready(function ($) {
            
            var jssor_1_SlideoTransitions = [
              [{b:0,d:600,y:-290,e:{y:27}}],
              [{b:0,d:1000,y:185},{b:1000,d:500,o:-1},{b:1500,d:500,o:1},{b:2000,d:1500,r:360},{b:3500,d:1000,rX:30},{b:4500,d:500,rX:-30},{b:5000,d:1000,rY:30},{b:6000,d:500,rY:-30},{b:6500,d:500,sX:1},{b:7000,d:500,sX:-1},{b:7500,d:500,sY:1},{b:8000,d:500,sY:-1},{b:8500,d:500,kX:30},{b:9000,d:500,kX:-30},{b:9500,d:500,kY:30},{b:10000,d:500,kY:-30},{b:10500,d:500,c:{x:87.50,t:-87.50}},{b:11000,d:500,c:{x:-87.50,t:87.50}}],
              [{b:0,d:600,x:410,e:{x:27}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,o:1,e:{o:5}}],
              [{b:-1,d:1,c:{x:175.0,t:-175.0}},{b:0,d:800,c:{x:-175.0,t:175.0},e:{c:{x:7,t:7}}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,x:-570,o:1,e:{x:6}}],
              [{b:-1,d:1,o:-1,r:-180},{b:0,d:800,o:1,r:180,e:{r:7}}],
              [{b:0,d:1000,y:80,e:{y:24}},{b:1000,d:1100,x:570,y:170,o:-1,r:30,sX:9,sY:9,e:{x:2,y:6,r:1,sX:5,sY:5}}],
              [{b:2000,d:600,rY:30}],
              [{b:0,d:500,x:-105},{b:500,d:500,x:230},{b:1000,d:500,y:-120},{b:1500,d:500,x:-70,y:120},{b:2600,d:500,y:-80},{b:3100,d:900,y:160,e:{y:24}}],
              [{b:0,d:1000,o:-0.4,rX:2,rY:1},{b:1000,d:1000,rY:1},{b:2000,d:1000,rX:-1},{b:3000,d:1000,rY:-1},{b:4000,d:1000,o:0.4,rX:-1,rY:-1}]
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $Idle: 2000,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions,
                $Breaks: [
                  [{d:2000,b:1000}]
                ]
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 870);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
            
        });
        

    $('body').on('click', 'input[name="shipping_type"]:checked', function(){
        var shipping_price = $(this).attr('data-price');
        console.log(shipping_price);
        $('#shipping-price').html(shipping_price+" €");
        var total_price = $('#total-price').attr('data-total-price');
        var total = parseFloat(total_price) + parseFloat(shipping_price);
        console.log(total);
        $('#total-price').html(total+" €");
    });
    
     var shipping_price = $('input[name="shipping_type"]:checked').attr('data-price');
     $('#shipping-price').html(shipping_price+" €");
        var total_price = $('#total-price').attr('data-total-price');
        var total = parseFloat(total_price) + parseFloat(shipping_price);
        console.log(total);
        $('#total-price').html(total+" €");
     
    

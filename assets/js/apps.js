/* Validation form */
ValidationFormSelf("validation-newsletter");
ValidationFormSelf("validation-newsletter-index");
ValidationFormSelf("validation-kygui-index");
ValidationFormSelf("validation-cart");
ValidationFormSelf("validation-user");
ValidationFormSelf("validation-contact");
/* Exists */
$.fn.exists = function(){
    return this.length;
};
/* Paging ajax */
if($(".rattings").exists())
{
    $( ".rattings").on( "mouseenter","a", function() {
        var id= $(this).attr('data-ratting');
        // alert(id);
        $(this).parent('.rattings').children('a').each(function(){
            $(this).removeClass('act');
            var idc= $(this).attr('data-ratting');
            if (idc <= id) {
            $(this).addClass('act');
            }
        })
    });
    $('.rating_icon').click(function(e) {
        var rat = $(this).parent('.rattings');
        if (rat.hasClass('ratted')) {
            alert('Bạn đã đánh giá sản phẩm này rồi. Vui lòng quay lại sau! ');
        }else{
            var value = $(this).attr('data-ratting');                        
            var value1 = $(this).attr('data-sp');
            $.ajax({
                url: 'ajax/ajax_star.php',
                type: 'POST',
                data: {idsp: value1,star:value},
                success: function(res) {
                    if (res > 0) {
                        var count = rat.attr('data-reviewcount');
                        $('.ghichu_ratting span').html(parseInt(count) + 1);
                        rat.addClass('ratted');

                        rat.children('a').each(function(){
                            $(this).removeClass('check');
                            var id= $(this).attr('data-ratting');
                            if (res >= id) {
                            $(this).addClass('check');
                            }
                        })
                        alert('Cảm ơn bạn đã đánh giá sản phẩm của chúng tôi!');
                    }
                }
            });
        }
    });


    $( ".rattings").mouseleave(function(){
        $(this).children("a").removeClass("act");
    })
}

/* Paging ajax */
if($(".paging-product").exists())
{
    loadPagingAjax("ajax/ajax_product.php?perpage="+PAGING_INDEX,'.paging-product');
}


/* Paging category ajax */
if($(".paging-product-category").exists())
{
    $(".paging-product-category").each(function(){
        var list = $(this).data("list");
        loadPagingAjax("ajax/ajax_product.php?perpage="+PAGING_INDEX+"&idList="+list,'.paging-product-category-'+list);
    })
}

/* Back to top */
NN_FRAMEWORK.BackToTop = function(){
    $(window).scroll(function(){
        if(!$('.scrollToTop').length) $("body").append('<div class="scrollToTop"><img src="'+GOTOP+'" alt="Go Top"/></div>');
        if($(this).scrollTop() > 100) $('.scrollToTop').fadeIn();
        else $('.scrollToTop').fadeOut();
    });
    $('body').on("click",".scrollToTop",function() {
        $('html, body').animate({scrollTop : 0},800);
        return false; 
    });
};
/* Alt images */
NN_FRAMEWORK.AltImages = function(){
    $('img').each(function(index, element) {
        if(!$(this).attr('alt') || $(this).attr('alt')=='')
        {
            $(this).attr('alt',WEBSITE_NAME);
        }
    });
};
/* Fix menu */
NN_FRAMEWORK.FixMenu = function(){
    $(window).scroll(function(){
        var get_height=$('header').height();
        if($(window).scrollTop() >= get_height ){
          $(".menu").css({position:"fixed",left:'0px',right:'0px',top:'0px',zIndex:'999'});  
          $('.menu').addClass('fadeInDown animated');
          $('header').css({'height':get_height});
      } else{
         $(".menu").css({position:"relative"});
         $('.menu').removeClass('fadeInDown animated');
         $('header').css({'height':'auto'});
     } 
 });
};
/* Tools */
NN_FRAMEWORK.Tools = function(){
    if($(".toolbar").exists())
    {
        $(".footer").css({marginBottom:$(".toolbar").innerHeight()});
    }
};
/* Popup */
NN_FRAMEWORK.Popup = function(){
    if($("#fancy-popup").exists())
    {
     $().ready(function(){$(".fancy-popup").fancybox({padding:0,margin:0,wrapCSS:"defaul"});setTimeout(function(){$(".fancy-popup").click();},500);})
 }
};
/* Wow */
NN_FRAMEWORK.WowAnimation = function(){
    new WOW().init();
};
/* Mmenu */
NN_FRAMEWORK.Mmenu = function(){
    if($("nav#menu").exists())
    {
        $('nav#menu').mmenu();
    }
};
/* Toc */
NN_FRAMEWORK.Toc = function(){
    if($(".toc-list").exists())
    {
        $(".toc-list").toc({
            content: "div#toc-content",
            headings: "h2,h3,h4"
        });
        if(!$(".toc-list li").length) $(".meta-toc").hide();
        $('.toc-list').find('a').click(function(){
            var x = $(this).attr('data-rel');
            goToByScroll(x);
        });
    }
};
/* Simply scroll */
NN_FRAMEWORK.SimplyScroll = function(){
    if($(".newshome-scroll").exists())
    {
        $(".newshome-scroll ul").simplyScroll({
            customClass: 'vert',
            orientation: 'vertical',
            // orientation: 'horizontal',
            auto: true,
            manualMode: 'auto',
            pauseOnHover: 1,
            speed: 1,
            loop: 0
        });
    }
};
/* Tabs */
NN_FRAMEWORK.Tabs = function(){
    if($(".ul-tabs-pro-detail").exists())
    {
        $(".ul-tabs-pro-detail li").click(function(){
            var tabs = $(this).data("tabs");
            $(".content-tabs-pro-detail, .ul-tabs-pro-detail li").removeClass("active");
            $(this).addClass("active");
            $("."+tabs).addClass("active");
        });
    }
};
/* Photobox */
NN_FRAMEWORK.Photobox = function(){
    if($(".album-gallery").exists())
    {
        $('.album-gallery').photobox('a',{thumbs:true,loop:false});
    }
};
/* Datetime picker */
NN_FRAMEWORK.DatetimePicker = function(){
    if($('#ngaysinh').exists())
    {
        $('#ngaysinh').datetimepicker({
            timepicker: false,
            format: 'd/m/Y',
            formatDate: 'd/m/Y',
            minDate: '01/01/1950',
            maxDate: TIMENOW
        });
    }
};
/* Search */
NN_FRAMEWORK.Search = function(){
    if($(".icon-search").exists())
    {
        $(".icon-search").click(function(){
            if($(this).hasClass('active'))
            {
                $(this).removeClass('active');
                $(".search-grid").stop(true,true).animate({opacity: "0",width: "0px"}, 200);   
            }
            else
            {
                $(this).addClass('active');                            
                $(".search-grid").stop(true,true).animate({opacity: "1",width: "230px"}, 200);
            }
            document.getElementById($(this).next().find("input").attr('id')).focus();
            $('.icon-search i').toggleClass('fa fa-search fa fa-times');
        });
    }
};
/* Videos */
NN_FRAMEWORK.Videos = function(){
    /* Fancybox */
    // $('[data-fancybox="something"]').fancybox({
    //     // transitionEffect: "fade",
    //     // transitionEffect: "slide",
    //     // transitionEffect: "circular",
    //     // transitionEffect: "tube",
    //     // transitionEffect: "zoom-in-out",
    //     // transitionEffect: "rotate",
    //     transitionEffect: "fade",
    //     transitionDuration: 800,
    //     animationEffect: "fade",
    //     animationDuration: 800,
    //     slideShow: {
    //         autoStart: true,
    //         speed: 3000
    //     },
    //     arrows: true,
    //     infobar: false,
    //     toolbar: false,
    //     hash: false
    // });
    if($(".video").exists())
    {
        $('[data-fancybox="video"]').fancybox({
            transitionEffect: "fade",
            transitionDuration: 800,
            animationEffect: "fade",
            animationDuration: 800,
            arrows: true,
            infobar: false,
            toolbar: true,
            hash: false
        });
    }
};
/* Owl */
NN_FRAMEWORK.OwlPage = function(){
    if($(".owl-doitac").exists())
    {
        var owl = $('.owl-doitac');
        owl.owlCarousel({
            margin: 15,
            loop: true,
            autoplay:true,
            nav:true,
            dots:false,
            navText:"",
            responsive: {
                0: {
                    margin: 10,
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 5   
                },
                1200: {
                    items: 6 
                }
            }
        })
    }
};
/* Owl pro detail */
NN_FRAMEWORK.OwlProDetail = function(){
    if($(".owl-thumb-pro").exists())
    {
        $('.owl-thumb-pro').owlCarousel({
            items: 4,
            lazyLoad: false,
            mouseDrag: true,
            touchDrag: true,
            margin: 10,
            smartSpeed: 250,
            nav: false,
            dots: false
        });
        $('.prev-thumb-pro').click(function() {
            $('.owl-thumb-pro').trigger('prev.owl.carousel');
        });
        $('.next-thumb-pro').click(function() {
            $('.owl-thumb-pro').trigger('next.owl.carousel');
        });
    }
};
/* Cart */
NN_FRAMEWORK.Cart = function(){
    $("body").on("click",".addcart",function(){
        var mau = ($(".color-pro-detail input:checked").val()) ? $(".color-pro-detail input:checked").val() : 0;
        var size = ($(".size-pro-detail input:checked").val()) ? $(".size-pro-detail input:checked").val() : 0;
        var id = $(this).data("id");
        var action = $(this).data("action");
        var quantity = ($(".qty-pro").val()) ? $(".qty-pro").val() : 1;
        if(id)
        {
            $.ajax({
                url:'ajax/ajax_cart.php',
                type: "POST",
                dataType: 'json',
                async: false,
                data: {cmd:'add-cart',id:id,mau:mau,size:size,quantity:quantity},
                success: function(result){
                    if(action=='addnow')
                    {
                        $('.count-cart').html(result.max);
                        $.ajax({
                            url:'ajax/ajax_cart.php',
                            type: "POST",
                            dataType: 'html',
                            async: false,
                            data: {cmd:'popup-cart'},
                            success: function(result){
                                $("#popup-cart .modal-body").html(result);
                                $('#popup-cart').modal('show');
                            }
                        });
                    }
                    else if(action=='buynow')
                    {
                        window.location = CONFIG_BASE + "gio-hang";
                    }
                }
            });
        }
    });
    $("body").on("click",".del-procart",function(){
        if(confirm(LANG['delete_product_from_cart']))
        {
            var code = $(this).data("code");
            var ship = $(".price-ship").val();
            $.ajax({
                type: "POST",
                url:'ajax/ajax_cart.php',
                dataType: 'json',
                data: {cmd:'delete-cart',code:code,ship:ship},
                success: function(result){
                    $('.count-cart').html(result.max);
                    if(result.max)
                    {
                        $('.price-temp').val(result.temp);
                        $('.load-price-temp').html(result.tempText);
                        $('.price-total').val(result.total);
                        $('.load-price-total').html(result.totalText);
                        $(".procart-"+code).remove();
                    }
                    else
                    {
                        $(".wrap-cart").html('<a href="" class="empty-cart text-decoration-none"><i class="fa fa-cart-arrow-down"></i><p>'+LANG['no_products_in_cart']+'</p><span>'+LANG['back_to_home']+'</span></a>');
                    }
                }
            });
        }
    });
    $("body").on("click",".counter-procart",function(){
        var $button = $(this);
        var input = $button.parent().find("input");
        var id = input.data('pid');
        var code = input.data('code');
        var oldValue = $button.parent().find("input").val();
        if($button.text() == "+") quantity = parseFloat(oldValue) + 1;
        else if(oldValue > 1) quantity = parseFloat(oldValue) - 1;
        $button.parent().find("input").val(quantity);
        update_cart(id,code,quantity);
    });
    $("body").on("change","input.quantity-procat",function(){
        var quantity = $(this).val();
        var id = $(this).data("pid");
        var code = $(this).data("code");
        update_cart(id,code,quantity);
    });
    if($(".select-city-cart").exists())
    {
        $(".select-city-cart").change(function(){
            var id = $(this).val();
            load_district(id);
            load_ship();
        });
    }
    if($(".select-district-cart").exists())
    {
        $(".select-district-cart").change(function(){
            var id = $(this).val();
            load_wards(id);
            load_ship();
        });
    }
    if($(".select-wards-cart").exists())
    {
        $(".select-wards-cart").change(function(){
            var id = $(this).val();
            load_ship(id);
        });
    }
    if($(".payments-label").exists())
    {
        $(".payments-label").click(function(){
            var payments = $(this).data("payments");
            $(".payments-cart .payments-label, .payments-info").removeClass("active");
            $(this).addClass("active");
            $(".payments-info-"+payments).addClass("active");
        });
    }
    if($(".color-pro-detail").exists())
    {
        $(".color-pro-detail").click(function(){
            $(".color-pro-detail").removeClass("active");
            $(this).addClass("active");
            var id_mau=$("input[name=color-pro-detail]:checked").val();
            var idpro=$(this).data('idpro');
            $.ajax({
                url:'ajax/ajax_color.php',
                type: "POST",
                dataType: 'html',
                data: {id_mau:id_mau,idpro:idpro},
                success: function(result){
                    if(result!='')
                    {
                        $('.left-pro-detail').html(result);
                        MagicZoom.refresh("Zoom-1");
                        NN_FRAMEWORK.OwlProDetail();
                    }
                }
            });
        });
    }
    if($(".size-pro-detail").exists())
    {
        $(".size-pro-detail").click(function(){
            $(".size-pro-detail").removeClass("active");
            $(this).addClass("active");
        });
    }
    if($(".quantity-pro-detail span").exists())
    {
        $(".quantity-pro-detail span").click(function(){
            var $button = $(this);
            var oldValue = $button.parent().find("input").val();
            if($button.text() == "+")
            {
                var newVal = parseFloat(oldValue) + 1;
            }
            else
            {
                if(oldValue > 1) var newVal = parseFloat(oldValue) - 1;
                else var newVal = 1;
            }
            $button.parent().find("input").val(newVal);
        });
    }
};
/* slider */
NN_FRAMEWORK.slider = function(){
    if($(".slider").exists())
    {
       var jssor_1_SlideshowTransitions = [
       {$Duration:800,$Opacity:2}
       ];
       var options = {
        $AutoPlay: 1,                                  
        $AutoPlaySteps: 1,                              
        $Idle: 2000,                                   
        $PauseOnHover: 1,          
        $ArrowKeyNavigation: 1,                         
        $SlideEasing: $Jease$.$OutQuint,                   
        $SlideDuration: 800,                             
        $MinDragOffsetToSlide: 20,                      
        $SlideSpacing: 0,                        
        $Cols: 1,                                          
        $Align: 0,                             
        $UISearchMode: 1,                
        $PlayOrientation: 1,                                
        $DragOrientation: 1,                            
        $SlideshowOptions: {
            $Class: $JssorSlideshowRunner$,
            $Transitions: jssor_1_SlideshowTransitions,
            $TransitionsOrder: 1
        },
        $ArrowNavigatorOptions: {                         
            $Class: $JssorArrowNavigator$,                
            $ChanceToShow: 2,                            
            $Steps: 1                                     
        },
        $BulletNavigatorOptions: {                              
            $Class: $JssorBulletNavigator$,                      
            $ChanceToShow: 2,                             
            $Steps: 1,                                    
            $Rows: 1,                                    
            $SpacingX: 12,                                   
            $SpacingY: 4,                                 
            $Orientation: 1                          
        }
    };
    var jssor_slider1 = new $JssorSlider$("jssor_1", options);
    function ScaleSlider() {
        var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
        if (parentWidth) {
            jssor_slider1.$ScaleWidth(parentWidth);
        }
        else
            window.setTimeout(ScaleSlider, 30);
    }
    ScaleSlider();
    $(window).bind("load", ScaleSlider);
    $(window).bind("resize", ScaleSlider);
    $(window).bind("orientationchange", ScaleSlider);
}
};
NN_FRAMEWORK.menu_reponsive = function(){
    if($(".title-rpmenu").exists())
    {
     $menu = $("#main-nav").clone();
     $menu.removeAttr("id");
     $menu.removeAttr("class");
     $menu.find(".no-index").remove();
     $("#responsive-menu .content").append($menu);
     $("#responsive-menu .content").append('<div class="clearfix"></div>');
     $menu = $("#responsive-menu .content ul");
     $menu.find("li").each(function(){
        if($(this).find("ul").length){
            $(this).addClass("has-child");
            $(this).find("a").first().append("<span class='toggle-menu'><i class='fa fa-angle-down' aria-hidden='true'></i></span>");
        }
    });
     $("#responsive-menu .toggle-menu").click(function(){
        $(this).find("i").toggleClass("glyphicon-menu-down");
        $(this).find("i").toggleClass("glyphicon-menu-up");
        if(!$(this).hasClass("active")){
            $(this).parent().parent().find("ul").first().slideDown();
            $(this).addClass("active");
        }else{
            $(this).parent().parent().find("ul").first().slideUp();
            $(this).removeClass("active");
        }
        return false;
    });
     $("#responsive-menu .title").click(function(){
        $list = $(this).next().next().find("ul").first();
        console.log($list.is(":visible"));
        if($list.is(":visible")){
            $list.slideUp();
        }else{
            $list.slideDown();
        }
    });
     $("#responsive-menu").attr("data-top",$("#responsive-menu").offset().top);
     $(window).scroll(function(){
        $top = $(window).scrollTop();
        $ele = $("#responsive-menu").attr("data-top");
    });
     $(".btn-showmenu-wrap").click(function(){
        if ($('.btn-showmenu').hasClass('active')) {
            $('.btn-showmenu').removeClass('active');
        }else {
            $('.btn-showmenu').addClass('active');
        }
        if ($('.btn-showmenu-wrap').hasClass('aa')) {
            $('.btn-showmenu-wrap').removeClass('aa');
            $("#responsive-menu").css({
                'transform' : 'translateX(0px)'});
            $("body").css({
                "overflow-x":"auto"
            });
        }else {
            $('.btn-showmenu-wrap').addClass('aa');
            $("body").css({
                "overflow-x":"hidden"
            });
            $("#responsive-menu").css({'transition' : 'all 0.7s ease-in-out',
                'transform' : 'translateX(300px)'});
        }
        return false;
    });
     $(window).scroll(function(){  
        if($(window).scrollTop()>105){
            $('.title-rpmenu').addClass('fixed fadeInDown animated');
            $('#responsive-menu').addClass('ctop ');
        }else{
            $('.title-rpmenu').removeClass('fixed fadeInDown animated');
            $('#responsive-menu').removeClass('ctop');
        }
    })  ;
     var show = 0;
     $('a.searchrp').click(function() {
        if (show == 1) {
            $('.form-row-searchrp').css({'width': 0});
            $('.search-formrp').css({'width': 0, 'opacity':0});
            $('a.searchrp').removeClass('active');
            show = 0;
            execSearchrp();
        } else {
            $('.form-row-searchrp').css({'width': '100%'});
            if ($(window).width() <= 1100) {
                $('.search-formrp').css({'width': 200, 'opacity':1});
            }else{
                $('.search-formrp').css({'width': 200, 'opacity':1});
            }
            $('a.searchrp').addClass('active');
            document.getElementById("frm_searchrp").reset();
            show = 1;
        }
    });
     $('#keywordrp').keydown(function(e) {
        if (e.keyCode == 13) {
            execSearchrp();
        }
    });
     function execSearchrp() {
        var keyword = $('#keywordrp').val();
        if (keyword != '') {
            window.location.href="tim-kiem?keyword="+keyword;
            return false;
        }
    }
}
};
NN_FRAMEWORK.load_iframe_index = function(){
    if($(".video_iframe").exists())
    {
        var fired_video = false;
        window.addEventListener("scroll", function(){
            if ((document.documentElement.scrollTop != 0 && fired_video === false) || (document.body.scrollTop != 0 && fired_video === false)) {
                var data_src=$('.video_iframe').data('src');
                $('.video_iframe').html('<iframe id="iframe" width="100%" height="310" src="//www.youtube.com/embed/'+data_src+'" frameborder="0" allowfullscreen></iframe>');
                fired_video=true;
            }
        }, true);
        $(".item_video").click(function(){ $("#iframe").attr("src","https://www.youtube.com/embed/"+$(this).data('id')+"?autoplay=1");  })
    }
};
NN_FRAMEWORK.search_bds = function(){
    if($(".row_search").exists())
    {
        $('.select2').select2();
        $(".btn_search").click(function(){
            $tukhoa=""; $id_list=""; $id_city=""; $id_district=""; $mod_dientich=""; $mod_huong=""; $mod_gia="";
            $url="";
            $tukhoa=$("#tukhoa").val();
            $id_list=$("#id_list").val();
            $id_city=$("#id_city").val();
            $id_district=$("#id_district").val();
            $mod_dientich=$("#mod_dientich").val();
            $mod_huong=$("#mod_huong").val();
            $mod_gia=$("#mod_gia").val();
            if($tukhoa=="" && $id_list=="0" && $id_city=="0" && $id_district=="0" && $mod_dientich=="0" && $mod_huong=="0" && $mod_gia=="0" ){
                alert('Bạn chưa chọn trường nào để tìm kiếm .');   
            }else{
                if($tukhoa!=undefined && $tukhoa!=""){
                    $url+="s1="+$tukhoa+"&";
                }
                if($id_list!=undefined && $id_list!="0"){
                    $url+="s2="+$id_list+"&";
                }
                if($id_city!=undefined && $id_city!="0"){
                    $url+="s3="+$id_city+"&";
                }
                if($id_district!=undefined && $id_district!="0"){
                    $url+="s4="+$id_district+"&";
                }
                if($mod_dientich!=undefined && $mod_dientich!="0"){
                    $url+="s5="+$mod_dientich+"&";
                }
                if($mod_huong!=undefined && $mod_huong!="0"){
                    $url+="s6="+$mod_huong+"&";
                }
                if($mod_gia!=undefined && $mod_gia!="0"){
                    $url+="s7="+$mod_gia ;
                }
                window.location.href="tim-kiem?"+$url;
            }
            return false;
        });
        $('body').on('change','.select-place', function(){
            var id = $(this).val();
            var child = $(this).data("child");
            var level = parseInt($(this).data('level'));
            var table = $(this).data('table');
            if($("#"+child).length)
            {
                $.ajax({
                    url: 'ajax/ajax_place.php',
                    type: 'POST',
                    data: {level:level,id:id,table:table},
                    success: function(result)
                    {
                        var op = "<option value='0'>Chọn danh mục</option>";
                        if(level == 0)
                        {
                            $("#id_district").html(op);
                            $("#id_wards").html(op);
                            $("#id_street").html(op);
                        }
                        else if(level == 1)
                        {
                            $("#id_wards").html(op);
                            $("#id_street").html(op);
                        }
                        $("#"+child).html(result);
                    }
                });
            }
            return false;
        });
        $(".format-price").priceFormat({
            limit: 13,
            prefix: '',
            centsLimit: 0
        });
        $('body').on('change','.select-category', function(){
            var id = $(this).val();
            var child = $(this).data("child");
            var level = parseInt($(this).data('level'));
            var table = $(this).data('table');
            var type = $(this).data('type');
            if($("#"+child).length)
            {
                $.ajax({
                    url: 'admin/ajax/ajax_category.php',
                    type: 'POST',
                    data: {level:level,id:id,table:table,type:type},
                    success: function(result)
                    {
                        var op = "<option value='0'>Chọn danh mục</option>";
                        if(level == 0)
                        {
                            $("#id_cat").html(op);
                            $("#id_item").html(op);
                            $("#id_sub").html(op);
                        }
                        else if(level == 1)
                        {
                            $("#id_item").html(op);
                            $("#id_sub").html(op);
                        }
                        else if(level == 2)
                        {
                            $("#id_sub").html(op);
                        }
                        $("#"+child).html(result);
                    }
                });
                return false;
            }
        });
    }
};
NN_FRAMEWORK.menuhover = function(){
    if($(".ul_list").exists())
    {
        $("li.li_cat").click(function(){  
            $listS = $(this).find('.ul_cat').first();
            console.log($listS.is(":visible"));
            if($listS.is(":visible")){
                $listS.slideUp();
            }else{
                $listS.slideDown();
            }
        })
    }
};
/* Ready */
$(document).ready(function(){
    NN_FRAMEWORK.Tools();
    NN_FRAMEWORK.Popup();
    NN_FRAMEWORK.WowAnimation();
    NN_FRAMEWORK.AltImages();
    NN_FRAMEWORK.BackToTop();
    NN_FRAMEWORK.FixMenu();
    NN_FRAMEWORK.Mmenu();
    NN_FRAMEWORK.OwlPage();
    NN_FRAMEWORK.OwlProDetail();
    NN_FRAMEWORK.Toc();
    NN_FRAMEWORK.Cart();
    NN_FRAMEWORK.SimplyScroll();
    NN_FRAMEWORK.Tabs();
    NN_FRAMEWORK.Videos();
    NN_FRAMEWORK.Photobox();
    NN_FRAMEWORK.Search();
    NN_FRAMEWORK.DatetimePicker();
    /*moi*/
    NN_FRAMEWORK.slider();
    NN_FRAMEWORK.menu_reponsive();
    NN_FRAMEWORK.load_iframe_index();
    NN_FRAMEWORK.search_bds();
    NN_FRAMEWORK.menuhover();
});
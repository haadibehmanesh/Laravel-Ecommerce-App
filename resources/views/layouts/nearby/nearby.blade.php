<!DOCTYPE html>
<html lang="fa_IR">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129893987-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-129893987-1');
</script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
            بن های نزدیک من   
    </title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
<link rel='stylesheet' id='validate-engine-css-css'  href='{{ asset('wp-content/plugins/wysija-newsletters/css/validationEngine.jquery4dc3.css?ver=2.8.2') }}' type='text/css' media='all' />
<link rel='stylesheet' id='megamenu-css'  href='{{ asset('wp-content/uploads/maxmegamenu/style3d1a.css?ver=1.1')}}' type='text/css' media='all' />
<link rel='stylesheet' id='dashicons-css'  href='{{ asset('wp-includes/css/dashicons.min1845.css?ver=4.9.6')}}' type='text/css' media='all' />

<!-- Bootstrap -->
<link href="{{ asset('wp-content/themes/takhfifat/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('wp-content/themes/takhfifat/css/bootstrap-rtl.css')}}" rel="stylesheet">
<link href="{{ asset('wp-content/themes/takhfifat/css/font-awesome.css')}}" rel="stylesheet">
<link href="{{ asset('wp-content/themes/takhfifat/stylefc99.css?ver=2.9')}}" rel="stylesheet">
<link href="{{ asset('wp-content/themes/takhfifat/css/main-page.css')}}" rel="stylesheet">
<link href="{{ asset('wp-content/themes/takhfifat/css/nearby.min.css')}}" rel="stylesheet">



<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
<script src="{{ asset('wp-content/themes/takhfifat/js/parsinumber.min.js')}}"></script>
<script>
function toPersianNum( num, dontTrim ) {
    var i = 0,
        dontTrim = dontTrim || false,
        num = dontTrim ? num.toString() : num.toString().trim(),
        len = num.length,
        res = '',
        pos,
        persianNumbers = typeof persianNumber == 'undefined' ?
            ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'] :
            persianNumbers;
    for (; i < len; i++)
        if (( pos = persianNumbers[num.charAt(i)] ))
            res += pos;
        else
            res += num.charAt(i);
    return res;
}
</script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<script>
       $(document).ready(function() {
           
			// grab the initial top offset of the navigation 
		   	var stickyNavTop = $('.nav').offset().top;
		   	
		   	// our function that decides weather the navigation bar should have "fixed" css position or not.
		   	var stickyNav = function(){
			    var scrollTop = $(window).scrollTop(); // our current vertical position from the top
			         
			    // if we've scrolled more than the navigation, change its position to fixed to stick to top,
			    // otherwise change it back to relative
			    if (scrollTop > stickyNavTop) { 
			        $('.nav').addClass('sticky');
			    } else {
			        $('.nav').removeClass('sticky'); 
			    }
			};

			stickyNav();
			// and run it again every time you scroll
			$(window).scroll(function() {
				stickyNav();
			});
		});
</script>
        <script>
            var baseUrl = 'https://boninja.com/';
        </script>

          <script type="text/javascript" charset="UTF-8" src="{{ asset('wp-content/themes/takhfifat/js/nearby/common.js')}}"></script><script type="text/javascript" charset="UTF-8" src="{{ asset('wp-content/themes/takhfifat/js/nearby/util.js')}}"></script><script type="text/javascript" charset="UTF-8" src="{{ asset('wp-content/themes/takhfifat/js/nearby/map.js')}}"></script><script type="text/javascript" charset="UTF-8" src="{{ asset('wp-content/themes/takhfifat/js/nearby/geometry.js')}}"></script><script type="text/javascript" charset="UTF-8" src="{{ asset('wp-content/themes/takhfifat/js/nearby/poly.js')}}"></script><script type="text/javascript" charset="UTF-8" src="{{ asset('wp-content/themes/takhfifat/js/nearby/marker.js')}}"></script>
</head>
<body class="rtl home blog mega-menu-main-menu">
<!--- Top Menu-->
<section class="top_header">
    <div class="container">
        <div class="row">
            <ul class="menu_top_header">
                @if (!Auth::guard('customer')->check())
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-163"><a href="/my-account">ورود/عضویت</a></li>
                @else
                <li id="menu-item-163" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-163"><a href="/my-account">حساب کاربری من</a></li>
                @endif
                <li id="menu-item-164" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-164"><a href="https://www.instagram.com/boninjaa/" title="اینستاگرام"><i class="fa fa-instagram" style="padding:0px;"></i>ما را دنبال کنید!</a></li>
                {{--<li id="menu-item-166" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-166"><a href="/products">همه پیشنهادها</a></li>--}}
            </ul>
            <!--phone-->
            <div class="phone"><span><i class="fa fa-phone"></i>09176952155 - 07136265496</span></div>
			            
			<!--social-->
            <div class="social_header">
            {{--    <a href="" title="تلگرام"><i class="fa fa-send-o"></i></a>
                <a href="https://www.instagram.com/boninjaa/" title="اینستاگرام"><i class="fa fa-instagram"></i></a>
                --}}
                
            </div>
        </div>
        
</section>
<!-- / Top Menu -->
<!-- Header-->
<header>
    <div class="container">
        <div class="row">
            <!--logo-->
            <div class="logo" ><h1><a href="/" title="سامانه خرید و تخفیف گروهی بن اینجا"></a></h1></div>
            
            <!--select search-->
            <div id="form_header">
                <div class="main_select">
                    <form action="#" method="post" id="select_cities_form">
                        <i class="fa fa-map-marker"></i>
                        <select id="cities_list" name="city_name">
                            <option value="all" >همه شهر ها</option>
                            {{--<option value='تهران' >تهران (9)</option><option value='مشهد' >مشهد (40)</option><option value='اصفهان' >اصفهان (0)</option><option value='کرج' >کرج (2)</option><option value='شیراز' >شیراز (0)</option><option value='تبریز' >تبریز (0)</option>--}}</select>
                    </form>
                    <div class="realoading"></div>
                    <script>
                        jQuery("#cities_list").on("change", function() {
                            var city_name_temp = jQuery(this).find("option:selected").text();
                            var city_name = jQuery('#cities_list').val()
                            jQuery.post("wp-content/themes/takhfifat/includes/set-cookies.html", {city_name: city_name}, function(result){
                                 jQuery("div.realoading").html(result);
                            });
                        });
                    </script>
                </div>
                <div class="main_input">
                        <form action="{{ route('search.index') }}" id="searchform">
                                <i class="fa fa-search"></i>
                        <input type="text" value="{{request()->input('query')}}" name="query" id="s"  placeholder="رستوران ، سرگرمی ، خدمات ..." />
                                <input type="submit" id="searchsubmit" value="جستجو" />
                        </form>
                </div>
            </div>
            
            <!--login-->
           
            @if (!Auth::guard('customer')->check())
            <div class="block_login">
                <a href="{{url('customer/login')}}" class="btn btn-default btn-lg login" id="myBtn"> ورود / عضویت <i class="fa fa-sign-in"></i></a>           
            </div>
            @else
            <div class="block_login">
                <ul class="nav navbar-nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::guard('customer')->user()->name}}<span class="fa fa-user pull-right"></span></a>
        <ul class="dropdown-menu">
                                                <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active">
                                                <a href="{{url('/my-account')}}">پیشخوان</a>
                </li>
                                                <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                    <a href="{{url('/my-account')}}">سفارش ها</a>
                </li>
                 
                
                                                <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                    <a href="{{url('/my-account')}}">جزئیات حساب</a>
                </li>
                                                <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout"><a href="{{ url('/customer/logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    خروج
                                                </a>
            
                                                <form id="logout-form" action="{{ url('/customer/logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                         </ul>
    </li>
</ul>
            </div>
            @endif

            <!--items cart-->
            <div class="content_mini_cart">
                <a class="main_title_cart" href="/cart" rel="nofollow"><i class="fa fa-shopping-cart" aria-hidden="true"></i>سبد خرید شما<span class="number_items_cart">{{ Cart::content()->count() }}</span></a>
                
            </div>
            <div class="searchinput">
                    <form action="{{ route('search.index') }}" id="searchform">
                           
                    <input type="text" value="{{request()->input('query')}}" name="query" id="s"  placeholder=" جستجو ..." />
                            <button type="submit" id="searchsubmit" >
                                <i style="padding-left: 10px;" class="fa fa-search"></i>
                            </button>
                    </form>
            </div>

        </div>
    </div>
</header>
<script src="wp-content/themes/takhfifat/js/nearby/js"></script>
<!-- / Header -->    <!--Nav-->
<nav class="nav">
    <div class="container">
        <div class="row">
            <div id="mega-menu-wrap-main-menu" class="mega-menu-wrap">
                <div class="mega-menu-toggle" tabindex="0">
                    <div class='mega-toggle-block mega-menu-toggle-block mega-toggle-block-right mega-toggle-block-3' id='mega-toggle-block-3'>
                    </div>
                </div>
                <ul id="mega-menu-main-menu" class="mega-menu mega-menu-horizontal mega-no-js" data-event="hover_intent" data-effect="fade_up" data-effect-speed="200" data-second-click="close" data-document-click="collapse" data-vertical-behaviour="standard" data-breakpoint="600" data-unbind="true">
                    <li class='mega-menu-item mega-menu-item-type-custom mega-menu-item-object-custom mega-current-menu-item mega-current_page_item mega-menu-item-home mega-align-bottom-left mega-menu-flyout mega-has-icon mega-menu-item-162' id='mega-menu-item-162'><a class=" fa fa-home  mega-menu-link" href="/" tabindex="0">صفحه اصلی</a></li>
                    
                    @foreach ($allcategories as $item)
                   
                        @if($item->children->count() > 0)
                                <li class='mega-menu-item mega-menu-item-type-custom mega-menu-item-object-custom mega-menu-item-has-children mega-align-bottom-left mega-menu-megamenu mega-has-icon mega-menu-item-241' id='mega-menu-item-241'><a class=" fa {{$item->icon}}  mega-menu-link" href="{{ route('shop.showCategory', $item->slug) }}" aria-haspopup="true" tabindex="0">{{ $item->name}}</a>
                                    <ul class="mega-sub-menu">
                                        <li class='mega-menu-item mega-menu-item-type-widget widget_sp_image mega-menu-columns-1-of-4 mega-menu-item-widget_sp_image-2' id='mega-menu-item-widget_sp_image-2'><img width="100" height="100" class="attachment-shop_thumbnail" style="max-width: 100%;" srcset="{{ categoryImage($item->image) }}" /></li>
                                        <ul class="mega-sub-menu-mob">                                          <li class='mega-menu-item'><a class="mega-menu-link" href="{{ route('shop.showCategory', $item->slug) }}" style="color: #19499c;"> همه {{$item->name}} ها</a></li></ul>
                                            @foreach ( $item->children->sortBy('sort_order') as $submenu )
                                            <ul class="mega-sub-menu">
                                            <li class='mega-menu-item' id='mega-menu-item-243'><a class="mega-menu-link" href="{{ route('shop.showCategory', $submenu->slug) }}">{{$submenu->name}}</a></li>
                                            </ul>
                                            @endforeach
                                    </ul>
                                </li>
                        @elseif(empty($item->parent_id))
                             <li class='mega-menu-item mega-menu-item-type-custom mega-menu-item-object-custom mega-current-menu-item mega-current_page_item mega-menu-item-home mega-align-bottom-left mega-menu-flyout mega-has-icon mega-menu-item-162' id='mega-menu-item-162'><a class=" fa {{$item->icon}}  mega-menu-link" href="{{ route('shop.showCategory', $item->slug) }}" tabindex="0">{{$item->name}}</a></li>
                        @endif
                    @endforeach
                </ul> 
            </div>
        </div>
    </div>

</nav>
<div class="clear"></div>
<!-- / Nav -->    <!--wrapper-->
    <section id="wrapper">
            <div class="container">
                <div class="row">
                    <ol class="breadcrumb"><a href="/">خانه</a>/بن های نزدیک من</ol>
                </div>
                
                <div class="title_post">
                    <h1>بن های نزدیک من</h1>
                    
                   
                </div>
                <div class="post-content">
                    
                    
        

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfrK1E0GsP0vPKQLNAHbN4fqa1bjb7I7I"></script>
<section class="relative" style="
position: relative;
">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->

    <div class="fixed-categories">
        <div class="top-section">            
            <h5>فیلتر بر اساس دسته بندی</h5>
            <button class="btn btn-sm btn-warning btn-icon" id="btn-toggle-categories">
                <i class="fa fa-angle-down"></i>
            </button>
        </div><!-- /.top-section -->
        
        <div class="categories-section">
                                        <div>
            
                          
                            <p>
                                <label>                                
                                    <input class="category" type="checkbox" name="categories[]" value="250" checked=""> 
                                    <img src="/wp-content/themes/takhfifat/images/nearby/20181014-105119-2292.png"> 
                                    همه تخفیف ها                                </label>
                            </p>
                              
                            <p>
                                <label>                                
                                    <input class="category" type="checkbox" name="categories[]" value="245" checked=""> 
                                    <img src="/wp-content/themes/takhfifat/images/nearby/20181027-153449-5440.png"> 
                                    رستوران و کافی شاپ                                </label>
                            </p>
                              
                            <p>
                                <label>                                
                                    <input class="category" type="checkbox" name="categories[]" value="148" checked=""> 
                                    <img src="/wp-content/themes/takhfifat/images/nearby/20181016-151240-8267.png"> 
                                    سرگرمی و ورزشی                                </label>
                            </p>
                              
                            <p>
                                <label>                                
                                    <input class="category" type="checkbox" name="categories[]" value="247" checked=""> 
                                    <img src="/wp-content/themes/takhfifat/images/nearby/20181016-151221-9721.png"> 
                                    پزشکی و سلامت                                </label>
                            </p>
                              
                            <p>
                                <label>                                
                                    <input class="category" type="checkbox" name="categories[]" value="248" checked=""> 
                                    <img src="/wp-content/themes/takhfifat/images/nearby/20181016-151339-2105.png"> 
                                    فرهنگی و آموزشی                                </label>
                            </p>
                              
                            <p>
                                <label>                                
                                    <input class="category" type="checkbox" name="categories[]" value="476" checked=""> 
                                    <img src="/wp-content/themes/takhfifat/images/nearby/20181016-190734-3366.png"> 
                                    آرایشی و زیبایی                                </label>
                            </p>
                              
                            <p>
                                <label>                                
                                    <input class="category" type="checkbox" name="categories[]" value="435" checked=""> 
                                    <img src="/wp-content/themes/takhfifat/images/nearby/20181016-130449-3305.png"> 
                                    سایر خدمات                                </label>
                            </p>
                                                </div>
                            </div><!-- /.categories-section -->
    </div><!-- /.fixed-categories -->
    <div class="fixed-offer hide">
        
    </div>
    <div class="fixed-research">
        <button class="btn btn-round btn-info hide" id="btn-research">جستجوی مجدد در این محدوده</button>
    </div>
    <div id="map" style="height: 467px; position: relative; overflow: hidden;"></div>

</section>
<?php
 $nearby = utf8_converter($nearby);
?>
<script>
    var products = <?php echo json_encode($nearby); ?>;
    //var rootProducts = <?php echo json_encode($nearby); ?>;
    var center = '{"latitude":29.630771207229,"longitude":52.519884109497}';
    var defaultProductImage = 'media/assets/default-product.jpg';
    var defaultServiceImage = 'media/assets/default-product.jpg';
</script>
            </div>
    </section>

<!--social &  Subscription-->
<section id="social">
    <div class="container">
        <div class="row">

            <!--Newsletters-->
            <div class="block_newsletters">

<div class="widget_wysija_cont shortcode_wysija"><div id="msg-form-wysija-shortcode5b2b59fce5ec2-1" class="wysija-msg ajax"></div><form id="form-wysija-shortcode5b2b59fce5ec2-1" method="post" action="#wysija" class="widget_wysija shortcode_wysija">
<p class="wysija-paragraph">
    <label>ایمیل <span class="wysija-required">*</span></label>
    
    	<input type="text" name="wysija[user][email]" class="wysija-input validate[required,custom[email]]" title="ایمیل"  value="" />
    
    
    
    <span class="abs-req">
        <input type="text" name="wysija[user][abs][email]" class="wysija-input validated[abs][email]" value="" />
    </span>
    
</p>

<input class="wysija-submit wysija-submit-field" type="submit" value="مشترک شدن!" />

    <input type="hidden" name="form_id" value="1" />
    <input type="hidden" name="action" value="save" />
    <input type="hidden" name="controller" value="subscribers" />
    <input type="hidden" value="1" name="wysija-page" />

    
        <input type="hidden" name="wysija[user_list][list_ids]" value="1" />
    
 </form></div>				
				
            </div>

            <!--social-->
            <div class="social_footer">
                    <a target="_blank" href="https://www.instagram.com/boninjaa" title="" class="instagram"></a>
                </div>

           <!--concession-->
           <div class="concession">
            <div class="post-content">
                <p><img id='jxlzesgtjxlzrgvjnbqergvjrgvj' style='cursor:pointer' onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=1013233&p=rfthobpdrfthxlaouiwkxlaoxlao", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")' alt='logo-samandehi' src='https://logo.samandehi.ir/logo.aspx?id=1013233&p=nbpdlymanbpdqftiodrfqftiqfti'/></p>
            </div>
        </div>
        <!--concession-->
        <div class="concession">
            <div class="post-content">
                <p><img src="https://trustseal.enamad.ir/logo.aspx?id=102812&amp;p=kKwVU4anvepH2HDY" alt="" onclick="window.open(&quot;https://trustseal.enamad.ir/Verify.aspx?id=102812&amp;p=kKwVU4anvepH2HDY&quot;, &quot;Popup&quot;,&quot;toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30&quot;)" style="cursor:pointer" id="kKwVU4anvepH2HDY"></p>

            </div>
        </div>

        </div>
    </div>
</section>
<div class="clear"></div>


<!--footer-->
<footer>
        <div class="container">
            <div class="row">
                <!--about us-->
                {{--<div class="col-lg-4 col-md-4">
                    <div class="about_us">
                        <span class="title_about_us"><img src="#" alt=""></span>
                        <p></p>
                    </div>
                </div>--}}
                <!--Service-->
                <div class="col-lg-5 col-md-5 block_service">
                        <div class="service"><span>درباره بن اینجا</span><div class="menu-%d8%b1%d8%a7%d9%87%d9%86%d9%85%d9%80%d8%a7-container"><ul id="menu-%d8%b1%d8%a7%d9%87%d9%86%d9%85%d9%80%d8%a7" class="menu"><li id="menu-item-187" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-187"><a href="{{route('aboutus.index')}}">درباره ما</a></li>
                            <li id="menu-item-188" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-188"><a href="{{route('cooperation.index')}}">همکاری با بن اینجا</a></li>
                            <li id="menu-item-191" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-191"><a href="{{route('contactus.index')}}">تماس با ما</a></li>
                            <li id="menu-item-191" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-191">
                                <span>
                                        <i class="fa fa-phone"></i>
                                        شماره های پشتیبانی : <br>
                                        {{ toPersianNum('09176952155')}} - {{  toPersianNum('07136265496')}}
                                </span>
                            </li>
                            </ul></div></div><div class="service"><span>راهنما</span><div class="menu-%d8%b1%d8%a7%d9%87%d9%86%d9%85%d9%80%d8%a7-container"><ul id="menu-%d8%b1%d8%a7%d9%87%d9%86%d9%85%d9%80%d8%a7-1" class="menu">
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-188"><a href="#">نحوه خرید</a></li>
                            
                            </ul></div></div>            </div>
                <!--map-->
                <div class="col-lg-3 col-md-3">
                    <div class="map">
                        <img src="{{asset('wp-content/uploads/2017/05/naghshe-1.jpg') }}" />
                    </div>
                </div>
            </div>
        </div>
    </footer>

<!--copyright-->
<section id="copyright">
    <div class="container">
        <div class="row">
            <p class="copyright_super_admin">
                <p>تمامی حقوق سایت متعلق به سامانه خرید و تخفیف گروهی بن اینجا می باشد.</p>
            </p>
            
        </div>
    </div>
</section>


<!-- /top-link-block -->
<span id="top-link-block" class="hidden">
    <a href="#top" class="well well-sm" style="background-color: ;"  onclick="jQuery('html,body').animate({scrollTop:0},'slow');return false;"><i class="fa fa-angle-up"></i></a>
</span>

<!-- /top-link-block -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="wp-content/themes/takhfifat/js/bootstrap.min.js"></script>
<script src="wp-content/themes/takhfifat/js/jquery.countdownTimer.js"></script>
<script src="wp-content/themes/takhfifat/js/custom.js"></script>
<script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min6b25.js?ver=2.1.4'></script>
<script type='text/javascript' src='wp-includes/js/hoverIntent.minc245.js?ver=1.8.1'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var megamenu = {"timeout":"300","interval":"100"};
/* ]]> */
</script>
<script type='text/javascript' src='wp-content/plugins/megamenu/js/maxmegamenu9254.js?ver=2.3.6'>
</script>
<script type='text/javascript' src='wp-includes/js/wp-embed.min1845.js?ver=4.9.6'></script>

<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.container').persiaNumber();
});
</script>
<script src="wp-content/themes/takhfifat/js/nearby/map1.js"></script>
    </body> 
</html>
<!DOCTYPE html>
<html lang="fa_IR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        تخفیف گروهی بن اینجا    
    </title>

<link rel='stylesheet' id='validate-engine-css-css'  href='wp-content/plugins/wysija-newsletters/css/validationEngine.jquery4dc3.css?ver=2.8.2' type='text/css' media='all' />
<link rel='stylesheet' id='megamenu-css'  href='wp-content/uploads/maxmegamenu/style3d1a.css?ver=f3e515' type='text/css' media='all' />
<link rel='stylesheet' id='dashicons-css'  href='wp-includes/css/dashicons.min1845.css?ver=4.9.6' type='text/css' media='all' />

<!-- Bootstrap -->
<link href="wp-content/themes/takhfifat/css/bootstrap.min.css" rel="stylesheet">
<link href="wp-content/themes/takhfifat/css/bootstrap-rtl.css" rel="stylesheet">
<link href="wp-content/themes/takhfifat/css/font-awesome.css" rel="stylesheet">
<link href="wp-content/themes/takhfifat/stylefc99.css?ver=2.6" rel="stylesheet">
<link href="../../wp-content/themes/takhfifat/css/main-page.css" rel="stylesheet">


<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
<link rel="stylesheet" type="text/css" href="engine9/style.css" />
<script type="text/javascript" src="engine9/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
<script src="wp-content/themes/takhfifat/js/parsinumber.min.js"></script>
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
        
</head>
<body class="rtl home blog mega-menu-main-menu">
<!--- Top Menu-->
<section class="top_header">
    <div class="container">
        <div class="row">
            <ul class="menu_top_header">
                <li id="menu-item-163" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-163"><a href="my-account/index.html">حساب کاربری من</a></li>
                <li id="menu-item-164" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-164"><a href="checkout/index.html">تسویه حساب</a></li>
                <li id="menu-item-165" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-165"><a href="/cart">سبد خرید</a></li>
                <li id="menu-item-166" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-166"><a href="/products">فروشگاه</a></li>
            </ul>
            <!--phone-->
            <div class="phone"><span><i class="fa fa-book"></i>بانک جامع اطلاعاتی</span></div>
			            
			<!--social-->
            <div class="social_header">
                <a href="#" title="تلگرام"><i class="fa fa-send-o"></i></a>
                <a href="#" title="اینستاگرام"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
        
</section>
<!-- / Top Menu -->
<!-- Header-->
<header>
    <div class="container">
        <div class="row">
            <!--logo-->
            <div class="logo" ><h1><a href="/" title="تخفیف گروهی بن اینجا"></a></h1></div>
            
            <!--select search-->
            <div id="form_header">
                <div class="main_select">
                    <form action="#" method="post" id="select_cities_form">
                        <i class="fa fa-map-marker"></i>
                        <select id="cities_list" name="city_name">
                            <option value="all" >همه شهر ها</option>
                            <option value='تهران' >تهران (9)</option><option value='مشهد' >مشهد (40)</option><option value='اصفهان' >اصفهان (0)</option><option value='کرج' >کرج (2)</option><option value='شیراز' >شیراز (0)</option><option value='تبریز' >تبریز (0)</option>                        </select>
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
                    <form action="/" id="searchform">
                        <i class="fa fa-search"></i>
                        <input type="text" value="" name="s" id="s"  placeholder="رستوران ، آموزش ، کالا ..." />
                        <input type="hidden" name="post_type" value="product">
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
                    <a href="http://demo.onliner.ir/takhfifat/my-account/orders/">سفارش ها</a>
                </li>
                                                <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads">
                    <a href="http://demo.onliner.ir/takhfifat/my-account/downloads/">دانلودها</a>
                </li>
                                                <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
                    <a href="http://demo.onliner.ir/takhfifat/my-account/edit-address/">آدرس ها</a>
                </li>
                                                <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                    <a href="http://demo.onliner.ir/takhfifat/my-account/edit-account/">جزئیات حساب</a>
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

        </div>
    </div>
</header>
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
                                            @foreach ( $item->children as $submenu )
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
			
    <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
	<div id="wowslider-container9">
        <div class="ws_images">
            <ul>
                @foreach ( $sliderimages as  $sliderimage )
                    <li><a href="{{$sliderimage->url}}"><img src="{{ productImage($sliderimage->image) }}"  /></a></li>
                @endforeach
            </ul></div>
    <div class="ws_script" style="position:absolute;left:-99%"></div>
        <div class="ws_shadow"></div>
        </div>	
        <script type="text/javascript" src="engine9/wowslider.js"></script>
        <script type="text/javascript" src="engine9/script.js"></script>
        <!-- End WOWSlider.com BODY section --><div class="row">
    <div class="clear"></div>
    <!--special offer -->
<div class="special_offer">
    <div class="title_block"><span>تخفیفات ویژه</span></div>
    @foreach ($featured as $featured)
        
    
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="box_offer">
                <div class="time_out">
                    <i class="fa fa-clock-o"></i>
                    <ul class="deal-timer countdownqdlkp"></ul>
                <script>
                    jQuery(function() {
                        var endDate = "2020-1-5 23:59:00";
                        jQuery('.countdownqdlkp').countdown({
                            date: endDate,
                            render: function(data) {
                                if ( ! data.sec  ) { data.sec = 0 };
								var days = toPersianNum(data.days);
								var hours = toPersianNum(data.hours);
								var min = toPersianNum(data.min);
								var sec = toPersianNum(data.sec);
                                jQuery(this.el).html(
                                    '<li><span class="num">' + days +'</span><span class="text">  روز </span></li>'+
                                    '<li><span class="num">' + hours +'</span><span class="text"> ساعت </span></li>'+
                                    '<li><span class="num">' + min +'</span><span class="text"> دقیقه </span></li>'+
                                    '<li><span class="num">' + sec +'</span><span class="text"> ثانیه </span></li>'
                                );
                            }
                        });
                    });
                </script>					
                </div>
                    <a href="{{ route('shop.show', $featured->slug) }}" title="{{ $featured->name }}"><img src="{{ productImage($featured->image) }}" title="{{ $featured->name }}"></a>
                <!-- Discount -->
                <span class="Discount"><b>%{{ toPersianNum($featured->discount)  }}</b>تخفیف</span>
				<span class="address"><i class="fa fa-map-marker"></i>امام خمینی</span>
                <span>{{toPersianNum($featured->sold)}}<i class="fa fa-shopping-basket"></i></span>
				<!-- Info -->
                <div class="Information">
                    <h2 class="ellipsis"><a href="{{ route('shop.show', $featured->slug) }}" title="{{ $featured->name }}">{{ $featured->name }}</a></h2>
                    <span class="price"><del><span class="woocommerce-Price-amount amount">{{ toPersianNum($featured->price) }}&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span></span></del> <ins><span class="woocommerce-Price-amount amount">{{ toPersianNum(presentPrice($featured->price,$featured->discount)) }}&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span></span></ins></span>
                </div>
            </div>
        </div>
        @endforeach
</div>
    <div class="clear"></div>		
    <!--category-->
		<div class="block_category">
			<div class="title_block"><span>دسته بندی ها</span></div>
			<!--Right Column (2 On left)-->
			<div class="col-lg-3 col-md-3 col1">
				<!--Top-->
				<div class="col-lg-12 col-md-12 col-sm-6 col3">
					<div class="box_category">
						<h2><a href="product-category/health-and-medicine/index.html" style="background-color:#0dc575 !important;"><b>پزشکی</b>  <img src="wp-content/uploads/2017/05/icon-cofpy-1.png" style="width: 45px;height: 45px;margin:60px -43px 0 0;position: absolute;"></a></h2>
						<div class="imgLabel">
							<a href="product-category/health-and-medicine/index.html"  ><img src="wp-content/uploads/2017/05/a-1-1.jpg"></a>
							<span style="color:#0dc575 !important;">  تخفیفــ <small style="background-color:#0dc575 !important;">تا 56%</small></span>
						</div>
					</div>
				</div>
                <!--Bottom-->
				<div class="col-lg-12 col-md-12 col-sm-6 col4">
					<div class="box_category">
						<div class="imgLabel">
							<a href="product-category/beauty-and-cosmetics/index.html" title="" ><img src="wp-content/uploads/2017/05/b-1.jpg"></a>
								<span style="color:#e02c6d !important;">  تخفیفــ <small style="background-color:#e02c6d !important;">تا 50%</small></span>
							<div class="details">
								<a href="product-category/beauty-and-cosmetics/index.html"  style="background-color: #e02c6d;border-bottom-color: white;" class="aye_sale">مشاهـده تخفیفات</a>
							</div>
						</div>
						<h2><a href="product-category/beauty-and-cosmetics/index.html" style="background-color: #e02c6d !important;"><b>زیبایی و آرایشی</b><img src="wp-content/uploads/2017/05/icoopy-1.png" style="width: 45px;height: 45px;margin:-5px 100px 0 0;position: absolute;"></a></h2>
					</div>
				</div>
            </div>
			<!--LEft Column (3 On right)-->
			<div class="col-lg-9 col-md-9 col2">
								<!--Top-->
				<div class="col-lg-12 col-md-12 col-sm-12 col5">
					<div class="box_category">
						<div class="imgLabel">
							<a href="product-category/arts-theater/index.html" title="هنر و تئاتر " ><img src="wp-content/uploads/2017/05/c-1-1.jpg"></a>
								
								<span style="color:#f86161 !important;">  تخفیفــ <small style="background-color:#f86161 !important;">تا 100%</small></span>
								
							<div class="details">
								<p>توضیحاتی در مورد این دسته اینجا قرار خواهد گرفت ...</p>
								<a href="product-category/arts-theater/index.html" style="background-color: #f86161;border-bottom-color: white;" class="aye_sale">مشاهـده تخفیفات</a>
							</div>
						</div>
						<h2><a href="product-category/arts-theater/index.html" style="background-color: #f86161 !important;"><b>فرهنگی هنری</b><img src="wp-content/uploads/2017/05/icon-copy-2.png" style="width: 85px;height: 85px;margin:100px -107px 0 0;position: absolute;"></a></h2>
					</div>
				</div>
                <!--Bottom right-->
				<div class="col-lg-3 col-md-3 col-sm-3 col6">
					<div class="box_category">
						<div class="imgLabel">
							<a href="product-category/training/index.html" title="آموزشی " ><img src="wp-content/uploads/2017/05/onlinelearning_1920-1920x620-1.jpg"></a>
							
								<span style="color:#c334c5 !important;">  تخفیفــ <small style="background-color:#c334c5 !important;">تا 100%</small></span>
								
						</div>
						<h2><a href="product-category/training/index.html" style="background-color: #c334c5 !important;"><b>آموزشی</b><img src="wp-content/uploads/2017/05/icon-copfgy-1.png" style="width: 45px;height: 45px;margin:50px -60px 0 0;position: absolute;"></a></h2>
					</div>
				</div>
                <!--Bottom left-->
				<div class="col-lg-9 col-md-9 col-sm-9 col7">
					<div class="box_category">
						<div class="imgLabel">
							<a href="product-category/sports-and-recreation/index.html" title="تفریحی و ورزشی " ><img src="wp-content/uploads/2017/05/download-1-1.jpg"></a>
							

							<span style="color:#008ba0 !important;">  تخفیفــ <small style="background-color:#008ba0 !important;">تا 79%</small></span>
								
							<div class="details">
																	<p> </p>
																	<a href="product-category/sports-and-recreation/index.html" style="background-color: #008ba0;border-bottom-color: white;" class="aye_sale">مشاهـده تخفیفات</a>
							</div>
						</div>
						<h2><a href="product-category/sports-and-recreation/index.html" style="background-color: #008ba0 !important;"><b>تفریحی و ورزشی</b><img src="wp-content/uploads/2017/05/icoggf-1.png" style="width: 50px;height: 50px;margin:50px -100px 0 0;position: absolute;"></a></h2>
					</div>
				</div>
            </div>
		</div>
		
		
		
		<div class="block_category">
			<!--Right Column (2 On left)-->
			<div class="col-lg-3 col-md-3 col1">
				<!--Top-->
            </div>
			<!--LEft Column (3 On right)-->
			<div class="col-lg-9 col-md-9 col2">
							
            </div>
		</div>		
<div class="clear"></div><!--Discount other -->
<div class="discount_other">
    <div class="title_block"><span>دیـگر تخــفیفـات</span></div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="box_offer box_offer_mini">
                <div class="time_out">
                    <i class="fa fa-clock-o"></i>
                    <ul class="deal-timer countdownimxit"></ul>
                <script>
				                    jQuery(function() {
                        var endDate = "2018-12-25 23:59:00";
                        jQuery('.countdownimxit').countdown({
                            date: endDate,
                            render: function(data) {
                                if ( ! data.sec  ) { data.sec = 0 };
								var days = toPersianNum(data.days);
								var hours = toPersianNum(data.hours);
								var min = toPersianNum(data.min);
								var sec = toPersianNum(data.sec);
                                jQuery(this.el).html(
                                    '<li><span class="num">' + days +'</span><span class="text">  روز </span></li>'+
                                    '<li><span class="num">' + hours +'</span><span class="text"> ساعت </span></li>'+
                                    '<li><span class="num">' + min +'</span><span class="text"> دقیقه </span></li>'+
                                    '<li><span class="num">' + sec +'</span><span class="text"> ثانیه </span></li>'
                                );
                            }
                        });
                    });
                </script>					
                </div>
			                <a href="product/%d9%81%d8%b1%d9%88%d8%b4-%d9%81%d9%88%d9%82-%d8%a7%d9%84%d8%b9%d8%a7%d8%af%d9%87-%d8%af%d9%88%da%86%d8%b1%d8%ae%d9%87-%d9%87%d8%a7%db%8c-%d8%ad%d8%b1%d9%81%d9%87-%d8%a7%db%8c/index.html" title="فروش فوق العاده دوچرخه های حرفه ای "><img src="wp-content/uploads/2018/02/696_20d30d-1-400x400.jpg" title="فروش فوق العاده دوچرخه های حرفه ای "></a>
                <!-- Discount -->
                <span class="Discount"><b>%12</b>تخفیف</span>
				<span class="address"><i class="fa fa-map-marker"></i></span>
                <span class="total_sales_onliner">0<i class="fa fa-shopping-basket"></i></span>
				<!-- Info -->
                <div class="Information">
                    <h2 class="ellipsis"><a href="product/%d9%81%d8%b1%d9%88%d8%b4-%d9%81%d9%88%d9%82-%d8%a7%d9%84%d8%b9%d8%a7%d8%af%d9%87-%d8%af%d9%88%da%86%d8%b1%d8%ae%d9%87-%d9%87%d8%a7%db%8c-%d8%ad%d8%b1%d9%81%d9%87-%d8%a7%db%8c/index.html">فروش فوق العاده دوچرخه های حرفه ای </a></h2>
                    <span class="price"><del><span class="woocommerce-Price-amount amount">780,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span></span></del> <ins><span class="woocommerce-Price-amount amount">690,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span></span></ins></span>
                </div>
            </div>
        </div>        		
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="box_offer box_offer_mini">
							<div class="time_out">
                    <i class="fa fa-clock-o"></i>
                    <ul class="deal-timer countdownufjsy"></ul>
                <script>
				                    jQuery(function() {
                        var endDate = "2018-10-16 23:59:00";
                        jQuery('.countdownufjsy').countdown({
                            date: endDate,
                            render: function(data) {
                                if ( ! data.sec  ) { data.sec = 0 };
								var days = toPersianNum(data.days);
								var hours = toPersianNum(data.hours);
								var min = toPersianNum(data.min);
								var sec = toPersianNum(data.sec);
                                jQuery(this.el).html(
                                    '<li><span class="num">' + days +'</span><span class="text">  روز </span></li>'+
                                    '<li><span class="num">' + hours +'</span><span class="text"> ساعت </span></li>'+
                                    '<li><span class="num">' + min +'</span><span class="text"> دقیقه </span></li>'+
                                    '<li><span class="num">' + sec +'</span><span class="text"> ثانیه </span></li>'
                                );
                            }
                        });
                    });
                </script>					
                </div>
			                <a href="product/%d9%be%da%a9-%d9%87%d8%a7-%d9%84%d9%88%d8%a7%d8%b2%d9%85-%d8%a8%d9%87%d8%af%d8%a7%d8%b4%d8%aa%db%8c-%d8%a2%d9%82%d8%a7%db%8c%d8%a7%d9%86-%d8%a8%d8%a7-%d8%aa%d8%ae%d9%81%db%8c%d9%81%db%8c-%d9%81%d9%88/index.html" title="پک ها لوازم بهداشتی آقایان با تخفیفی فوق العاده "><img src="wp-content/uploads/2018/02/o-Mens-skin-care-products-2017111165310471.jpg.png" title="پک ها لوازم بهداشتی آقایان با تخفیفی فوق العاده "></a>
                <!-- Discount -->
                <span class="Discount"><b>%37</b>تخفیف</span>
				<span class="address"><i class="fa fa-map-marker"></i></span>
                <span class="total_sales_onliner">1<i class="fa fa-shopping-basket"></i></span>
				<!-- Info -->
                <div class="Information">
                    <h2 class="ellipsis"><a href="product/%d9%be%da%a9-%d9%87%d8%a7-%d9%84%d9%88%d8%a7%d8%b2%d9%85-%d8%a8%d9%87%d8%af%d8%a7%d8%b4%d8%aa%db%8c-%d8%a2%d9%82%d8%a7%db%8c%d8%a7%d9%86-%d8%a8%d8%a7-%d8%aa%d8%ae%d9%81%db%8c%d9%81%db%8c-%d9%81%d9%88/index.html">پک ها لوازم بهداشتی آقایان با تخفیفی فوق العاده </a></h2>
                    <span class="price"><del><span class="woocommerce-Price-amount amount">155,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span></span></del> <ins><span class="woocommerce-Price-amount amount">98,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span></span></ins></span>
                </div>
            </div>
        </div>        		
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="box_offer box_offer_mini">
							<div class="time_out">
                    <i class="fa fa-clock-o"></i>
                    <ul class="deal-timer countdownpvuea"></ul>
                <script>
				                    jQuery(function() {
                        var endDate = "2018-10-18 23:59:00";
                        jQuery('.countdownpvuea').countdown({
                            date: endDate,
                            render: function(data) {
                                if ( ! data.sec  ) { data.sec = 0 };
								var days = toPersianNum(data.days);
								var hours = toPersianNum(data.hours);
								var min = toPersianNum(data.min);
								var sec = toPersianNum(data.sec);
                                jQuery(this.el).html(
                                    '<li><span class="num">' + days +'</span><span class="text">  روز </span></li>'+
                                    '<li><span class="num">' + hours +'</span><span class="text"> ساعت </span></li>'+
                                    '<li><span class="num">' + min +'</span><span class="text"> دقیقه </span></li>'+
                                    '<li><span class="num">' + sec +'</span><span class="text"> ثانیه </span></li>'
                                );
                            }
                        });
                    });
                </script>					
                </div>
			                <a href="product/%d8%aa%d8%ae%d9%81%db%8c%d9%81%db%8c-%d8%a8%db%8c-%d9%86%d8%b8%db%8c%d8%b1-%d8%af%d8%b1-%d8%aa%d9%85%d8%a7%d8%b4%d8%a7%d8%ae%d8%a7%d9%86%d9%87-%d8%aa%d9%87%d8%b1%d8%a7%d9%86/index.html" title="تخفیفی بی نظیر در تماشاخانه تهران "><img src="wp-content/uploads/2018/02/57624241-400x400.jpg" title="تخفیفی بی نظیر در تماشاخانه تهران "></a>
                <!-- Discount -->
                <span class="Discount"><b>%25</b>تخفیف</span>
				<span class="address"><i class="fa fa-map-marker"></i></span>
                <span class="total_sales_onliner">2<i class="fa fa-shopping-basket"></i></span>
				<!-- Info -->
                <div class="Information">
                    <h2 class="ellipsis"><a href="product/%d8%aa%d8%ae%d9%81%db%8c%d9%81%db%8c-%d8%a8%db%8c-%d9%86%d8%b8%db%8c%d8%b1-%d8%af%d8%b1-%d8%aa%d9%85%d8%a7%d8%b4%d8%a7%d8%ae%d8%a7%d9%86%d9%87-%d8%aa%d9%87%d8%b1%d8%a7%d9%86/index.html">تخفیفی بی نظیر در تماشاخانه تهران </a></h2>
                    <span class="price"><del><span class="woocommerce-Price-amount amount">73,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span></span></del> <ins><span class="woocommerce-Price-amount amount">55,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span></span></ins></span>
                </div>
            </div>
        </div>        		
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="box_offer box_offer_mini">
							<div class="time_out">
                    <i class="fa fa-clock-o"></i>
                    <ul class="deal-timer countdownqgzcb"></ul>
                <script>
				                    jQuery(function() {
                        var endDate = "2018-12-22 23:59:00";
                        jQuery('.countdownqgzcb').countdown({
                            date: endDate,
                            render: function(data) {
                                if ( ! data.sec  ) { data.sec = 0 };
								var days = toPersianNum(data.days);
								var hours = toPersianNum(data.hours);
								var min = toPersianNum(data.min);
								var sec = toPersianNum(data.sec);
                                jQuery(this.el).html(
                                    '<li><span class="num">' + days +'</span><span class="text">  روز </span></li>'+
                                    '<li><span class="num">' + hours +'</span><span class="text"> ساعت </span></li>'+
                                    '<li><span class="num">' + min +'</span><span class="text"> دقیقه </span></li>'+
                                    '<li><span class="num">' + sec +'</span><span class="text"> ثانیه </span></li>'
                                );
                            }
                        });
                    });
                </script>					
                </div>
			                <a href="product/%d8%aa%d8%ae%d9%81%db%8c%d9%81-%d9%81%d9%88%d9%82%d8%a7%d9%84%d8%b9%d8%a7%d8%af%d9%87-%d8%aa%d8%a6%d8%a7%d8%aa%d8%b1-%d8%b4%d9%88%d8%a7%db%8c%da%a9%d8%8c-%d8%b3%d8%b1%d8%a8%d8%a7%d8%b2-%d8%b3%d8%a7/index.html" title="تخفیف فوق العاده  تئاتر شوایک، سرباز ساده دل "><img src="wp-content/uploads/2018/02/1396072616055231612262914-400x400.jpg" title="تخفیف فوق العاده  تئاتر شوایک، سرباز ساده دل "></a>
                <!-- Discount -->
                <span class="Discount"><b>%16</b>تخفیف</span>
				<span class="address"><i class="fa fa-map-marker"></i></span>
                <span class="total_sales_onliner">0<i class="fa fa-shopping-basket"></i></span>
				<!-- Info -->
                <div class="Information">
                    <h2 class="ellipsis"><a href="product/%d8%aa%d8%ae%d9%81%db%8c%d9%81-%d9%81%d9%88%d9%82%d8%a7%d9%84%d8%b9%d8%a7%d8%af%d9%87-%d8%aa%d8%a6%d8%a7%d8%aa%d8%b1-%d8%b4%d9%88%d8%a7%db%8c%da%a9%d8%8c-%d8%b3%d8%b1%d8%a8%d8%a7%d8%b2-%d8%b3%d8%a7/index.html">تخفیف فوق العاده  تئاتر شوایک، سرباز ساده دل </a></h2>
                    <span class="price"><del><span class="woocommerce-Price-amount amount">68,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span></span></del> <ins><span class="woocommerce-Price-amount amount">57,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span></span></ins></span>
                </div>
            </div>
        </div>        	
</div><div class="clear"></div>

<article id="float-cat-restaurant" class="cat-deal-color color-rescoffee active">
        <h3 class="hx"><span class="ir"><i class="icon icon-burger"></i></span><a href="/tehran/c:restaurant/" class="article-h3">رستوران و کافی‌شاپ</a>
        </h3>
        </header>
        <div class="main-row clearfix">
        <div itemscope="" itemtype="http://schema.org/Offer" class="col-lg-12 col-md-12 col-sm-24 col-xs-24 cat-deal-bigbox">
        <div class="cat-deal-box ">
        <a href="/tehran/d/c:restaurant/126964/ناهار-در-رستوران-گردان-برج-میلاد/" class="figure" style="background-image: url(&quot;http://static.netbarg.com/img/responsive_large/deals/126964/369804550d51328701ccff85394444b8400b6c.jpg&quot;); background-size: cover;">
        <ul class="deal-tag list-unstyled">
        </ul>
        <img data-src="http://static.netbarg.com/img/responsive_large/deals/126964/369804550d51328701ccff85394444b8400b6c.jpg" alt="ناهار در رستوران گردان برج میلاد" data-type="lazy" shema="1" itemprop="image" content="http://static.netbarg.com/img/responsive_large/deals/126964/369804550d51328701ccff85394444b8400b6c.jpg" class="sr-only" src="http://static.netbarg.com/img/responsive_large/deals/126964/369804550d51328701ccff85394444b8400b6c.jpg"> </a>
        <div class="cat-deal-box-main clearfix">
        <h4 itemprop="name" class="cdbm-title"><a itemprop="url" href="/tehran/d/c:restaurant/126964/ناهار-در-رستوران-گردان-برج-میلاد/" class="truncate">ناهار در رستوران گردان برج میلاد</a>
        </h4>
        <span class="cdbm-total-buy"><span class="ir"><i class="fa fa-shopping-basket"></i></span><span class="cdbm-tb-total">
        779 </span></span>
         </div>
        <div class="cat-deal-box-footer clearfix"><span class="cdbf-takhfif"><span class="cdbft-shape"><span class="cdbft-shape-text">%20</span></span></span><a href="/tehran/d/c:restaurant/126964/ناهار-در-رستوران-گردان-برج-میلاد/" class="cdbf-buy-icon">
        <button class="nb-btn nb-btn-icon nb-btn-success">مشاهده و خرید<i class="icon icon-shopping-cart2"></i></button>
        </a><span class="cdbf-price">
        <del class="cdbf-real-price"><span>۱۱۰,۰۰۰</span></del><ins class="cdbf-netbarg-price">
        <span itemprop="price" content="880000">۸۸,۰۰۰ </span><span itemprop="priceCurrency" content="IRR"> تومان</span></ins></span></div>
        </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-24 col-xs-24 cat-deal-smallbox">
        <div class="row">
        
        
                <div class="list-items ">
                        <div class="col-lg-12 col-md-12 col-sm-24 col-xs-24 cat-deal-smallbox">
                        <a href="http://127.0.0.1:8000/products/%D9%81%D8%B3%D8%AA-%D9%81%D9%88%D8%AF-%D8%AF%D8%A7%D9%88%DB%8C%D9%86-%D8%A8%D8%A7-%D9%85%D9%86%D9%88-%D8%A8%D8%A7%D8%B2-%D8%BA%D8%B0%D8%A7%D9%87%D8%A7%DB%8C-%D9%84%D8%B0%DB%8C%D8%B0/%D8%B1%D8%B3%D8%AA%D9%88%D8%B1%D8%A7%D9%86-%D9%88-%DA%A9%D8%A7%D9%81%DB%8C-%D8%B4%D8%A7%D9%BE" class="figure clearfix" title="فست فود داوین با منو باز غذاهای لذیذ"><img src="http://127.0.0.1:8000/storage/bi-products/August2018/UVJKG8Um0gSGzFEQXarV.jpg" title="فست فود داوین با منو باز غذاهای لذیذ"></a>   
                        
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-24 col-xs-24 cat-deal-smallbox">
                        <div class="list-deal-details">
                            <div class="top-panel">
                                
                                <span>
                                    <a href="http://127.0.0.1:8000/products/%D9%81%D8%B3%D8%AA-%D9%81%D9%88%D8%AF-%D8%AF%D8%A7%D9%88%DB%8C%D9%86-%D8%A8%D8%A7-%D9%85%D9%86%D9%88-%D8%A8%D8%A7%D8%B2-%D8%BA%D8%B0%D8%A7%D9%87%D8%A7%DB%8C-%D9%84%D8%B0%DB%8C%D8%B0/%D8%B1%D8%B3%D8%AA%D9%88%D8%B1%D8%A7%D9%86-%D9%88-%DA%A9%D8%A7%D9%81%DB%8C-%D8%B4%D8%A7%D9%BE" title="فست فود داوین با منو باز غذاهای لذیذ"><h3 class="small-title">فست فود داوین با منو باز غذاهای لذیذ</h3></a>
                                </span>
                            </div>
                          
                            <div class="bottom-panel">
                            </div>
                            <div class="price list-content list-price-single">
                                    <span class="cdbf-takhfif"><span class="cdbft-shape"><span class="list-discount-tag">%50</span></span></span>               
                                    <span class="price price_slider price_slider_single">
                                            <del><span class="woocommerce-Price-amount amount">قیمت: ۱۳۰۰۰&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></del> <ins><span class="woocommerce-Price-amount amount">با تخفیف: ۷۹۳۰&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></ins>
                                        </span>
                                <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-24 col-xs-24 cat-deal-smallbox">
                                        <form class="cart" action="http://127.0.0.1:8000/cart" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="tlmeQZubHN7nCAoIcdqH4bSQwPNnxCiTiSvQadoi">
                                        <input type="hidden" name="id" value="9">
                                                              <button type="submit" name="add-to-cart" class="btn">افزودن به سبد خرید</button>
                                                                </form>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-24 col-xs-24 cat-deal-smallbox">
                                                                <span class="cdbm-total-buy">
                                                                        <i class="fa fa-shopping-basket"></i>
                                                                        ۳ خرید
                                                                </span>
                                                            </div>

                                </div>
                            </div>
                        </div>
                    </div>
                        
                           
                   

                    </div>
            
        </div>
        <div class="row">
        
        
                <div class="list-items-second">
                        <div class="col-lg-12 col-md-12 col-sm-24 col-xs-24 cat-deal-smallbox">
                        <a href="http://127.0.0.1:8000/products/%D9%81%D8%B3%D8%AA-%D9%81%D9%88%D8%AF-%D8%AF%D8%A7%D9%88%DB%8C%D9%86-%D8%A8%D8%A7-%D9%85%D9%86%D9%88-%D8%A8%D8%A7%D8%B2-%D8%BA%D8%B0%D8%A7%D9%87%D8%A7%DB%8C-%D9%84%D8%B0%DB%8C%D8%B0/%D8%B1%D8%B3%D8%AA%D9%88%D8%B1%D8%A7%D9%86-%D9%88-%DA%A9%D8%A7%D9%81%DB%8C-%D8%B4%D8%A7%D9%BE" class="figure clearfix" title="فست فود داوین با منو باز غذاهای لذیذ"><img src="http://127.0.0.1:8000/storage/bi-products/August2018/UVJKG8Um0gSGzFEQXarV.jpg" title="فست فود داوین با منو باز غذاهای لذیذ"></a>   
                        
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-24 col-xs-24 cat-deal-smallbox">
                        <div class="list-deal-details">
                            <div class="top-panel">
                                
                                <span>
                                    <a href="http://127.0.0.1:8000/products/%D9%81%D8%B3%D8%AA-%D9%81%D9%88%D8%AF-%D8%AF%D8%A7%D9%88%DB%8C%D9%86-%D8%A8%D8%A7-%D9%85%D9%86%D9%88-%D8%A8%D8%A7%D8%B2-%D8%BA%D8%B0%D8%A7%D9%87%D8%A7%DB%8C-%D9%84%D8%B0%DB%8C%D8%B0/%D8%B1%D8%B3%D8%AA%D9%88%D8%B1%D8%A7%D9%86-%D9%88-%DA%A9%D8%A7%D9%81%DB%8C-%D8%B4%D8%A7%D9%BE" title="فست فود داوین با منو باز غذاهای لذیذ"><h3 class="small-title">فست فود داوین با منو باز غذاهای لذیذ</h3></a>
                                </span>
                            </div>
                          
                            <div class="bottom-panel">
                            </div>
                            <div class="price list-content list-price-single">
                                    <span class="cdbf-takhfif"><span class="cdbft-shape"><span class="list-discount-tag">%50</span></span></span>               
                                    <span class="price price_slider price_slider_single">
                                            <del><span class="woocommerce-Price-amount amount">قیمت: ۱۳۰۰۰&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></del> <ins><span class="woocommerce-Price-amount amount">با تخفیف: ۷۹۳۰&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></ins>
                                        </span>
                                <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-24 col-xs-24 cat-deal-smallbox">
                                        <form class="cart" action="http://127.0.0.1:8000/cart" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="tlmeQZubHN7nCAoIcdqH4bSQwPNnxCiTiSvQadoi">
                                        <input type="hidden" name="id" value="9">
                                                              <button type="submit" name="add-to-cart" class="btn">افزودن به سبد خرید</button>
                                                                </form>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-24 col-xs-24 cat-deal-smallbox">
                                                                <span class="cdbm-total-buy">
                                                                        <i class="fa fa-shopping-basket"></i>
                                                                        ۳ خرید
                                                                </span>
                                                            </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="more_cat">
                    <div class="row">
                            <i class="fa fa-cutlery">
                            </i>
                    </div>
                    <div class="row">
                        <span>
                                69 پیشنهاد رستوران و کافی شاپ
                        </span>
                    </div>
                        <div class="button-all">
                            <a href="/mashhad/c:restaurant/">
                                <button class="nb-btn nb-btn-success">مشاهده همه</button>
                            </a>
                        </div>
                    </div>
            
        </div>
        </div>
        </div>
        </article>






            </div>
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
                <a target="_blank" href="#" title="" class="telegram"></a>
                <a target="_blank" href="#" title="" class="instagram"></a>
                <a target="_blank" href="#" title="" class="facebook"></a>
            </div>

            <!--concession-->
            <div class="concession">
                <div class="post-content">
                    <p><img class="alignnone size-full wp-image-627" src="wp-content/uploads/2017/05/Enamad-1.png" alt="" width="237" height="159" /></p>                </div>
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
            <div class="col-lg-4 col-md-4">
                <div class="about_us">
                    <span class="title_about_us"><img src="#" alt=""></span>
                    <p></p>
                </div>
            </div>
            <!--Service-->
            <div class="col-lg-5 col-md-5 block_service">
                <div class="service"><span>فهرست</span><div class="menu-%d8%b1%d8%a7%d9%87%d9%86%d9%85%d9%80%d8%a7-container"><ul id="menu-%d8%b1%d8%a7%d9%87%d9%86%d9%85%d9%80%d8%a7" class="menu"><li id="menu-item-187" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-187"><a href="#">آموزش مفید</a></li>
                <li id="menu-item-188" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-188"><a href="#">نحوه خرید</a></li>
                <li id="menu-item-189" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-189"><a href="#">نحوه فروش</a></li>
                <li id="menu-item-190" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-190"><a href="#">کجا پیدا میشه</a></li>
                <li id="menu-item-191" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-191"><a href="#">تماس با ما</a></li>
                </ul></div></div><div class="service"><span>راهنما</span><div class="menu-%d8%b1%d8%a7%d9%87%d9%86%d9%85%d9%80%d8%a7-container"><ul id="menu-%d8%b1%d8%a7%d9%87%d9%86%d9%85%d9%80%d8%a7-1" class="menu"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-187"><a href="#">آموزش مفید</a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-188"><a href="#">نحوه خرید</a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-189"><a href="#">نحوه فروش</a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-190"><a href="#">کجا پیدا میشه</a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-191"><a href="#">تماس با ما</a></li>
                </ul></div></div>            </div>
            <!--map-->
            <div class="col-lg-3 col-md-3">
                <div class="map">
                    <img src="wp-content/uploads/2017/05/naghshe-1.jpg" />
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
                <p>تمامی حقوق سایت متعلق به قالب تخفیف گروهی بن اینجا می باشد.</p>
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
    </body> 
</html>
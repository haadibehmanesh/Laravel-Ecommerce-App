<!DOCTYPE html>
<html lang="fa_IR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ $product->name }}</title>
        <style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
<link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">
<link rel='stylesheet' id='validate-engine-css-css'  href='../../wp-content/plugins/wysija-newsletters/css/validationEngine.jquery4dc3.css?ver=2.8.2' type='text/css' media='all' />
<link rel='stylesheet' id='woocommerce-layout-rtl-css'  href='../../wp-content/plugins/woocommerce/assets/css/woocommerce-layout-rtl6765.css?ver=3.3.3' type='text/css' media='all' />
<link rel='stylesheet' id='woocommerce-smallscreen-rtl-css'  href='../../wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen-rtl6765.css?ver=3.3.3' type='text/css' media='only screen and (max-width: 768px)' />
<link rel='stylesheet' id='woocommerce-general-rtl-css'  href='../../wp-content/plugins/woocommerce/assets/css/woocommerce-rtl6765.css?ver=3.3.3' type='text/css' media='all' />
<link rel='stylesheet' id='megamenu-css'  href='../../wp-content/uploads/maxmegamenu/style3d1a.css?ver=f3e515' type='text/css' media='all' />
<link rel='stylesheet' id='dashicons-css'  href='../../wp-includes/css/dashicons.min1845.css?ver=4.9.6' type='text/css' media='all' />
<link rel='stylesheet' id='dokan-style-css'  href='../../wp-content/plugins/dokan-lite/assets/css/styleb246.css?ver=2.7.8' type='text/css' media='all' />
<link rel='stylesheet' id='dokan-fontawesome-css'  href='../../wp-content/plugins/dokan-lite/assets/vendors/font-awesome/font-awesome.minb246.css?ver=2.7.8' type='text/css' media='all' />
<link rel='stylesheet' id='dokan-rtl-style-css'  href='../../wp-content/plugins/dokan-lite/assets/css/rtlb246.css?ver=2.7.8' type='text/css' media='all' />
<link rel='stylesheet' id='dokan-select2-css-css'  href='../../wp-content/plugins/dokan-lite/assets/vendors/select2/select2b246.css?ver=2.7.8' type='text/css' media='all' />

<script type='text/javascript' src='../../wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4'></script>
<script type='text/javascript' src='../../wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
{{--<script type='text/javascript' src='http://maps.google.com/maps/api/js?key=AIzaSyCKCtow0jeZibeqGsBXNsKwQxm5N8TwbRE&amp;ver=4.9.6'></script>--}}

	<style type="text/css">/** Mega Menu CSS Disabled **/</style>
    <!-- Bootstrap -->
    <link href="../../wp-content/themes/takhfifat/css/bootstrap-3.3.6.css" rel="stylesheet">
    <link href="../../wp-content/themes/takhfifat/css/bootstrap-rtl.css" rel="stylesheet">
    <link href="../../wp-content/themes/takhfifat/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../wp-content/themes/takhfifat/css/font-awesome.css" rel="stylesheet">
    <link href="../../wp-content/themes/takhfifat/stylefc99.css?ver=2.6" rel="stylesheet">

        <script>
        jQuery( document ).ready(function() {
          //  jQuery("#input-id").rating();
        });
        
        
        
        </script>
	<script src="../../wp-content/themes/takhfifat/js/parsinumber.min.js"></script>
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

    function createReview(e){
        e.preventDefault();
        
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/product/review',
            data: jQuery('#commentform').serialize() + '&_token=<?php echo csrf_token() ?>',
            success:function(data){
                jQuery('.customer-review').html(data)
            }
        });        

    }
    </script>
    <script>
        jQuery(".modal-wide").on("show.bs.modal", function() {
  var height = jQuery(window).height() - 200;
  jQuery(this).find(".modal-body").css("max-height", height);
});
            jQuery(document).ready(function() {
               
                 // grab the initial top offset of the navigation 
                    var stickyNavTop = jQuery('.nav').offset().top;
                    
                    // our function that decides weather the navigation bar should have "fixed" css position or not.
                    var stickyNav = function(){
                     var scrollTop = jQuery(window).scrollTop(); // our current vertical position from the top
                          
                     // if we've scrolled more than the navigation, change its position to fixed to stick to top,
                     // otherwise change it back to relative
                     if (scrollTop > stickyNavTop) { 
                        jQuery('.nav').addClass('sticky');
                     } else {
                        jQuery('.nav').removeClass('sticky'); 
                     }
                 };
     
                 stickyNav();
                 // and run it again every time you scroll
                 jQuery(window).scroll(function() {
                     stickyNav();
                 });
             });
     </script>
    <script>
        jQuery(document).ready(function() {
            jQuery(".addtocart").on("click", function() {
                jQuery.ajax({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/ajax/addtocart',
                    data: jQuery('.cart').serialize() + '&_token=<?php echo csrf_token() ?>',
                    success:function(data){
                        jQuery('.add_status').html(data)
                    }
                }); 
            });
        });
          
    </script>
</head>
<body class="rtl product-template-default single single-product postid-96 woocommerce woocommerce-page mega-menu-main-menu dokan-theme-takhfifat">
    <!----- Top Menu
-------------------->
<section class="top_header">
    <div class="container">
        <div class="row">
                <ul class="menu_top_header">
                        @if (!Auth::guard('customer')->check())
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-163"><a href="/my-account">ورود/عضویت</a></li>
                        @else
                        <li id="menu-item-163" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-163"><a href="/my-account">حساب کاربری من</a></li>
                        @endif
                        <li id="menu-item-164" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-164"><a href="/checkout">تسویه حساب</a></li>
                        <li id="menu-item-165" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-165"><a href="/cart">سبد خرید</a></li>
                        {{--<li id="menu-item-166" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-166"><a href="/products">همه پیشنهادها</a></li>--}}
                    </ul>
            <!--phone-->
            {{--<div class="phone"><span><i class="fa fa-book"></i>بانک جامع اطلاعاتی</span></div>--}}
			            
			<!--social-->
            <div class="social_header">
                                        <a href="#" title="تلگرام"><i class="fa fa-send-o"></i></a>
                                                <a href="#" title="اینستاگرام"><i class="fa fa-instagram"></i></a>
                                    </div>
        </div>
        <div>
</section>
<!-- / Top Menu -->
    <!------ Header
------------------->
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
                            <option value='تهران' >تهران (9)</option><option value='مشهد' >مشهد (40)</option><option value='اصفهان' >اصفهان (0)</option><option value='کرج' >کرج (2)</option><option value='شیراز' >شیراز (0)</option><option value='تبریز' >تبریز (0)</option>                        </select>
                    </form>
                    <div class="realoading"></div>
                    <script>
                        jQuery("#cities_list").on("change", function() {
                            var city_name_temp = jQuery(this).find("option:selected").text();
                            var city_name = jQuery('#cities_list').val()
                            jQuery.post("../../wp-content/themes/takhfifat/includes/set-cookies.html", {city_name: city_name}, function(result){
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
              {{--  <div class="main_cart_list">
	                <p class="woocommerce-mini-cart__empty-message">هیچ محصولی در سبد خرید نیست.</p>
				</div>--}}
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
                                        {{-- <li class='mega-menu-item mega-menu-item-type-custom mega-menu-item-object-custom mega-menu-item-has-children mega-has-icon mega-menu-columns-1-of-4 mega-menu-item-242' id='mega-menu-item-242'><a class=" fa fa-chevron-left  mega-menu-link" href="#" aria-haspopup="true"></a>--}}
                                            @foreach ( $item->children->sortBy('sort_order') as $submenu )
                                            <ul class="mega-sub-menu">
                                                <li class='mega-menu-item' id='mega-menu-item-243'><a class="mega-menu-link" href="{{ route('shop.showCategory', $submenu->slug) }}">{{$submenu->name}}</a></li>
                                            </ul>
                                        {{--</li>--}}
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
<!-- / Nav -->
    <!--wrapper-->

    <section id="wrapper">

    <div class="container">

        <div class="row">
                {{--<div class="panel-body">   
                        <!-- Add custom inputs -->
                        <div class="form-group">                                                     
                            <ul style="list-style-type: none; padding-left: 0">
                            @foreach ($categoriesForProduct as $categoryForProduct)
                                <li><label><input value="{{ $categoryForProduct->id }}" type="checkbox" name="category[]" style="margin-right: 5px;" {{ $categoriesForProduct->contains($categoryForProduct) ? 'checked' : '' }}>{{ $categoryForProduct->name }}</label></li>
                            @endforeach
                            </ul>
                        </div> <!-- end form-group -->
                        <!-- End custom inputs -->
                </div>--}}

            <ol class="breadcrumb"><a href="/">خانه</a> &#47; <a href="/{{(empty($categoryslug)  ? 'products' : 'category/'.$categoryslug) }}">{{(empty($categoryslug)  ? 'همه پیشنهاد ها' : $categoryname) }}</a> &#47; {{ $product->name }}</ol>
					
                    <!--title & discount & views-->

                    <div class="title_post">

                        <!--<span class="like"><i class="fa fa-eye"></i></span>-->

                        <h1>{{ $product->name }}</h1> | <h2> {{ strip_tags($product->description) }} </h2>

                        <span class="Discount"><b>%{{ $product->discount }}</b>تخفیف</span>

                    </div>



                    <!--block_gallery-->

                    <div class="block_gallery">

                        <!-- images -->

                        <div class="gallery_item">



                            <!--option-->

                            <div class="option_item_gallery">

							
                                <span class="address"><i class="fa fa-map-marker"></i>{{ $product->location}}</span>

							
									<span class="number-sale"><i class="fa fa-shopping-basket"></i>0</span>

                            </div>



                            <div id="myCarousel" class="carousel slide" data-ride="carousel">



                                <!-- Wrapper for slides -->

                                <div class="carousel-inner" role="listbox">

                                    <div class="item active">

                                        <div class="img_item">

                                        <a href="{{ route('shop.show', $product->slug) }}" title="{{ $product->name }}"><img src="{{ productImage($product->image) }}" title="{{ $product->name }}" alt="{{ $product->name }}"></a>

                                        </div>

                                    </div>
                                    <?php $i=0; ?>
                                    @if(!empty($product->gallery))
                                    @foreach (json_decode($product->gallery, true) as $image)
                                    <?php $i++; ?>
                                    <div class="item">

                                        <div class="img_item">

                                        <a href="{{ route('shop.show', $product->slug) }}" title="{{ $product->name }}"><img src="{{ productImage($image) }}" title="{{ $product->name }}" alt="{{ $product->name }}"></a>

                                        </div>

                                    </div>
                                    @endforeach
                                       @endif
                                </div>

                                <!-- Indicators -->

                                <ol class="carousel-indicators">

                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    @for ($indicator = 1 ; $indicator <= $i ; $indicator++)
                                        <li data-target="#myCarousel" data-slide-to="{{ $indicator }}"></li>
                                    @endfor
                                                
                                </ol>

                            </div>

                        </div>



                        <!--details-->

                        <div class="content_item">

                        <div class="Slogan"><span>{{ $merchant_name }}</span></div>

                            
							<div class="info-counter-product">

							


                <div class="timer_farsi_single">

				 <i class="fa fa-clock-o"></i><ul class="countdown_single_product"></ul>

                </div>

				<script>

				
                    jQuery(function() {

                        var endDate = "{{date('Y-m-d', strtotime($product->end_date))}}";

                        jQuery('.countdown_single_product').countdown({

                            date: endDate,

                            render: function(data) {

                                if ( ! data.sec  ) { data.sec = 0 };

								var days = toPersianNum(data.days);

								var hours = toPersianNum(data.hours);

								var min = toPersianNum(data.min);

								var sec = toPersianNum(data.sec);

                                jQuery(this.el).html(

                                    '<li><span class="num">' + days +'</span> <span class="text">  روز </span></li>'+

                                    '<li><span class="num">' + hours +'</span> <span class="text"> ساعت </span></li>'+

                                    '<li><span class="num">' + min +'</span> <span class="text"> دقیقه </span></li>'+

                                    '<li><span class="num">' + sec +'</span> <span class="text"> ثانیه </span></li>'

                                );

                            }

                        });

                    });

                </script>   

							

							</div>



							
							<span class="price price_slider price_slider_single">

							
                            <del><span class="woocommerce-Price-amount amount">{{ toPersianNum($product->price) }}&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span></span></del> <ins><span class="woocommerce-Price-amount amount">{{toPersianNum(presentPrice($product->price,$product->discount))}}&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span></span></ins>
							</span>

							

                            <div class="share_gift_bye">
                                <div class="share_btn">
                                    
                                <div class="btn-group btn_social">

                                    <button type="button" class="nb-btn" data-toggle="dropdown"> اشتراک <i class="fa fa-share-alt"></i> </button>

                                    <ul class="dropdown-menu" id="shr_social">

                                        <ul class='list-inline' style="z-index: 9999">

                                        {{--<li><a href="https://telegram.me/share/url?text=%d8%a2%d8%b1%d8%a7%db%8c%d8%b4%da%af%d8%a7%d9%87%20%d8%a7%d9%84%d9%86%d8%a7&amp;url=http://localhost/takhfiftest/product/%d8%a2%d8%b1%d8%a7%db%8c%d8%b4%da%af%d8%a7%d9%87-%d8%a7%d9%84%d9%86%d8%a7/" id=""><img src="../../wp-content/themes/takhfifat/images/social/telegram.png" alt="telegram"></a></li>
                                        <li><a href="http://www.facebook.com/sharer.php?u=http://localhost/takhfiftest/product/%d8%a2%d8%b1%d8%a7%db%8c%d8%b4%da%af%d8%a7%d9%87-%d8%a7%d9%84%d9%86%d8%a7/&amp;t=%d8%a2%d8%b1%d8%a7%db%8c%d8%b4%da%af%d8%a7%d9%87%20%d8%a7%d9%84%d9%86%d8%a7" title="Facebook" id=""><img src="../../wp-content/themes/takhfifat/images/social/facebook.png" alt=""></a></li>
                                        <li><a title="twitter" href="http://twitter.com/share/?url=http://localhost/takhfiftest/product/%d8%a2%d8%b1%d8%a7%db%8c%d8%b4%da%af%d8%a7%d9%87-%d8%a7%d9%84%d9%86%d8%a7/&amp;text=%d8%a2%d8%b1%d8%a7%db%8c%d8%b4%da%af%d8%a7%d9%87%20%d8%a7%d9%84%d9%86%d8%a7" ID="twitter" target="_blank" class="twitter"><img src="../../wp-content/themes/takhfifat/images/social/twitter.png" alt=""></a></li>

                                            <li><a title="Google+" href="https://plus.google.com/share?url=http://localhost/takhfiftest/product/%d8%a2%d8%b1%d8%a7%db%8c%d8%b4%da%af%d8%a7%d9%87-%d8%a7%d9%84%d9%86%d8%a7/&amp;title=%d8%a2%d8%b1%d8%a7%db%8c%d8%b4%da%af%d8%a7%d9%87%20%d8%a7%d9%84%d9%86%d8%a7" ID="GoogleP" target="_blank" class="googleplus"><img src="../../wp-content/themes/takhfifat/images/social/google%2b.png" alt=""></a></li>

                                            <li><a title="Google Bookmark" href="http://www.google.com/bookmarks/mark?op=edit&amp;bkmk=http://localhost/takhfiftest/product/%d8%a2%d8%b1%d8%a7%db%8c%d8%b4%da%af%d8%a7%d9%87-%d8%a7%d9%84%d9%86%d8%a7/&amp;title=%d8%a2%d8%b1%d8%a7%db%8c%d8%b4%da%af%d8%a7%d9%87%20%d8%a7%d9%84%d9%86%d8%a7" ID="GoogleB" target="_blank" class="googlebookmark"><img src="../../wp-content/themes/takhfifat/images/social/dropbox.png" alt=""></a></li>

                                            <li><a title="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://localhost/takhfiftest/product/%d8%a2%d8%b1%d8%a7%db%8c%d8%b4%da%af%d8%a7%d9%87-%d8%a7%d9%84%d9%86%d8%a7/&amp;title=%d8%a2%d8%b1%d8%a7%db%8c%d8%b4%da%af%d8%a7%d9%87%20%d8%a7%d9%84%d9%86%d8%a7" ID="linkedin" target="_blank" class="linkedin"><img src="../../wp-content/themes/takhfifat/images/social/linkedin.png" alt=""></a></li>
                                            <li><a title="Email" href="mailto:?subject=آرایشگاه النا&body= لطفا این لینک رو ببین: http://localhost/takhfiftest/product/%d8%a2%d8%b1%d8%a7%db%8c%d8%b4%da%af%d8%a7%d9%87-%d8%a7%d9%84%d9%86%d8%a7/" ID="Email" target="_blank" class="email"><img src="../../wp-content/themes/takhfifat/images/social/email.png" alt=""></a></li>--}}
                                            <li><a href="https://api.whatsapp.com/send?text={{ route('shop.show', $product->slug) }}" title="{{ $product->name }}"><img src="../../wp-content/themes/takhfifat/images/social/whatsapp.png" alt="whatsapp"></a></li>
                                            <li><a href="https://www.instagram.com/boninjaa" id=""><img src="../../wp-content/themes/takhfifat/images/social/instagram.png" alt="instagram"></a></li>

                                            

                                            

                                            

                                        </ul>

                                    </ul>

                                </div>
                                </div>
                              
                            {{--    <a href="/" class="link_gift">دیگرمحصولات<i class="fa fa-shopping-bag"></i></a>

                                <br><br>
--}}
                                <!-- <a href="" class="link_bye"><i class="fa fa-shopping-cart"></i>همین حالا خرید کنید</a> -->
                                <div class="add_btn">
                                <div class="row">
                                   
                                    <form class="cart" action="{{ route('cart.store') }}" method="post" enctype='multipart/form-data'>
                                        {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                  @if($product->quantity - $product->sold > 0)
                    
                                    @if($product->children->count() > 0)
                                    <a data-toggle="modal" href="#normalModal" class="btn btn-primary">انتخاب کنید</a>
                                    @else
                                    <input type="button" value='افزودن به سبد' style="border-radius: 4px;" name="addtocart" id="addtocart" class="addtocart btn">
                                    <button type="submit" name="add-to-cart" value="" class="btn">مشاهده و خرید</button>
                                    
                                    @endif
                                    
                                    <div id="normalModal" class="modal fade">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                  <h4 class="modal-title">انتخاب ها</h4>
                                                </div>
                                                @if($product->children->count() > 0)
                                                <div class="modal-body">
                                                        @foreach ( $product->children as $subproduct )
                                                        <div class="row">
                                                                <div class="col-md-3 col-xs-3">
                                                                    <img width="150" class="choose-child-img loading" alt="{{$subproduct->name}}" src="{{ productImage($subproduct->image) }}" title="{{$subproduct->name}}" data-was-processed="true">
                                                                </div>
                                                                <div class="col-xs-7 hidden-md hidden-lg mb-5 mr-20">
                                                                    <span class="badge background-color-orange pull-right">%{{ toPersianNum($subproduct->discount)  }}</span>
                                                                    <b class="pull-right offer-child-title">{{$subproduct->name}}</b>
                                                                    <br>
                                                                    <small class="text-danger modal-child-presentPrice">
                                                                        <del>{{ toPersianNum($subproduct->price) }} تومان</del>
                                                                    </small>
                                                                    <b class="text-success modal-child-offPrice">{{ toPersianNum(presentPrice($subproduct->price,$subproduct->discount)) }} تومان</b>
                                                                </div>
                                                                <div class="col-md-9 col-xs-12">
                                                                    <div class="row hidden-sm hidden-xs">
                                                                        <span class="badge background-color-orange pull-right">%{{ toPersianNum($subproduct->discount)  }}</span>
                                                                        <b class="pull-right offer-child-title">&nbsp{{$subproduct->name}}</b>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10 hidden-sm hidden-xs">
                                                                            <small class="text-danger modal-child-presentPrice">
                                                                                <del>{{ toPersianNum($subproduct->price) }} تومان</del>
                                                                            </small>
                                                                            <b class="text-success modal-child-offPrice">{{ toPersianNum(presentPrice($subproduct->price,$subproduct->discount)) }} تومان</b>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-4 col-xs-4 m-t-10">
                                                                                <input type="button" value='افزودن به سبد' style="border-radius: 4px;     padding: 0px 10px;    margin-top: 10px;" name="addtocart" onclick="addToCart({{ $subproduct->id }})" class="addtocartmodal btn">
                                                                        </div>
                                                                        <script>
                                                                                function addToCart(id) {
                                                                                    jQuery.ajax({
                                                                                        headers: {
                                                                                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                                                                                        },
                                                                                        type: 'POST',
                                                                                        url: '/ajax/addtocart',
                                                                                        data: {id: id, _token: "{{ csrf_token() }}"} ,
                                                                                        success:function(data){
                                                                                            jQuery('.add_status').html(data)
                                                                                        }
                                                                                    });
                                                                                }
                                                                                </script>
                                                                        <div class="col-md-8 col-sm-8 col-xs-8 m-t-10">
                                                                            <form class="cartmodal" method="post" action="{{ route('cart.store') }}">
                                                                                {{ csrf_field() }}
                                                                                <input type="hidden" name="id" value="{{ $subproduct->id }}">
                                                                                
                                                                                <button type="submit" name="submit" class="btn" style="    background: #2bcc3f; padding: 6px 10px;    margin-top: 10px;">
                                                                                    <i class="fa fa-shopping-cart rtl-cart m-l-8 fs-18"></i>
                                                                                    مشاهده و خرید
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="add_status_modal{{ $subproduct->id }}" style="margin-top: 20px;"></div>
                                                            <hr>
                                                            @endforeach
                                                        
                                              
                                                </div>
                                                @endif
                                            
                                              </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                          </div><!-- /.modal -->

                                
                                    @else
                                    
                                    <div class="alert alert-danger">
                                        <p class="text-center">
                                        موجود نیست
                                        </p>
                                    </div>
                                    @endif
                                   
                                    </form>
                                   

	
                               </div>
                               <div class="add_status" style="
                               margin-top: 27px;
                           "></div>
                               </div>
                               

        </div>

    </div>



</div>



<div class="post-content">		



	
	

	<!--details more-->
<div class="details_more box_single">
    <div class="title_block"><span>توضیحات تکمیلی</span></div>
    <div class="col-lg-6 col-md-12 col-sm-24 col-xs-24 cat-deal-smallbox"><h2>{{ $product->name }}</h2></div>
    <div class="col-lg-6 col-md-12 col-sm-24 col-xs-24 cat-deal-smallbox">
        <p>
           {{--   @if(Auth::guard('customer')->check())--}}
            <div class="star_rating">
            <input id="input-7-xs" class="rating rating-loading" value="{{ $reviews->avg('rating')*0.9}}" data-min="0" data-max="5" data-step="0.9" data-size="xs"  data-show-caption="false" data-show-clear="false" data-display-only="true">
                    
            </div><br>  
            {{--@endif--}}
        </p>
    </div>
   
    
<div class="content description">
{!!  $product->description_details !!}
</div>
</div><div class="clear"></div><!--Terms of Use-->
<div class="row">
<div class="col-lg-6 col-md-12 col-sm-24 col-xs-24 cat-deal-smallbox">
<div class="Terms_Use box_single">
		<div class="title_block"><span>شرایط استفاده</span></div>

		 <p>
			 		 </p>
		<div class="box_terms_use">
		<div class="item_terms_use">
			<?php
$items = implode('<i class="fa fa-check-square-o" style="color:#49c668;"></i>  ', explode('<p style="text-align: right;">', $product->usage_terms));
?>
{!! $items !!}
		</div>
	
	</div>
</div>
</div>


<div class="col-lg-6 col-md-12 col-sm-24 col-xs-24 cat-deal-smallbox">
	<div class="Property box_single">
		<div class="title_block"><span>ویژگی ها</span></div>
        <?php
        $items = implode('<i class="fa fa-check-square-o" style="color:#49c668;"></i>  ', explode('<p style="text-align: right;">', $product->attributies));
        ?>
        {!! $items !!}
    </div>
</div>
</div>
<div class="clear"></div><!--address map-->
<div class="address_map box_single">
    
    <div class="title_block"><span>آدرس</span></div>
    <div style="font-size: 15px;
    text-align: center;
    padding-bottom: 15px;">
        <span><i class="fa fa-phone"></i>&nbsp;
       شماره تماس : {{$product->bimerchant->tel}}
        </span>
    
    </div>
    <div style="font-size: 15px;
    text-align: center;
    padding-bottom: 15px;">
        <span><i class="fa fa-map-marker"></i>&nbsp;
        {{$product->address}}
        </span>
    
    </div>
    
	<div class="box_map">
        <!--map-->
    
		<div id="map_sellers" style="width:100%;height:400px;"></div>
		<div class="label_map"><i class="fa fa-map-o"></i><span>مشاهده آدرس روی نقشه</span></div>
	</div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfrK1E0GsP0vPKQLNAHbN4fqa1bjb7I7I"></script>
<script>
	function single_product_map() {
		var mapOptions_sellers = {
			center: new google.maps.LatLng({{$lat}},{{$lng}}),
			zoom: 17,
			mapTypeId: google.maps.MapTypeId.terrain,
			mapTypeControl: true,
			panControl: true,
			zoomControl: true,
			scaleControl: true,
			streetViewControl: false,
			overviewMapControl: true,
			rotateControl: false,
		};
		var map_sellers = new google.maps.Map(document.getElementById("map_sellers"), mapOptions_sellers);
		var marker_sellers = new google.maps.Marker({
			position: new google.maps.LatLng({{$lat}},{{$lng}}),
			map: map_sellers,
			title: '{{$product->name}}'
		});
	}
	single_product_map();
</script>
<div class="clear"></div><!--related product -->
<div class="related_product box_single">
    @if(!empty($otherproducts) && $otherproducts->count() > 0)
    <div class="title_block"><span>سایر محصولات</span></div>

    @foreach ($otherproducts as $product)
    
    <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="mini-card-product">
                    <div class="card-header">
                            <a href="{{ route('shop.show', $product->slug) }}" class="" title="{{ $product->name }}"><span class="card-span">{{ $product->name }}</span></a>
                            <span class="card-location"><i class="fa fa-map-marker"></i>&nbsp; {{$product->location}}</span>
                    </div>
                    <div class="card-timer">
                            <a href="{{ route('shop.show', $product->slug) }}" class="" title="{{ $product->name }}" class=""><span class="card-span"><script>
                                    jQuery(function() {
                                        var endDate = "{{date('Y-m-d', strtotime($product->end_date))}}";
                                        jQuery('.{{$product->slug}}').countdown({
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
                                </script><span><i class="fa fa-clock-o"></i></span><ul class="deal-timer {{$product->slug}}"></ul></span></a>
                                <span class="card-shopping"><i style="font-size: 17px;" class="fa fa-shopping-bag"></i>&nbsp;{{toPersianNum($product->sold)}}</span>
                    </div>
                    <a class="sb-preview-img" href="{{ route('shop.show', $product->slug) }}" class="" title="{{ $product->name }}">
                    <img class="card-img-top" src="{{ productImage($product->image) }}" alt="{{ $product->name }}">
                    </a>
                    
                    <div class="card-footer">
                    <a href="{{ route('shop.show', $product->slug) }}" class="" title="{{ $product->name }}" class=""><span style="font-size: 14px;" class="card-span"><del>{{ toPersianNum($product->price) }} تومان</del></span></a>
                    <span class="card-discount">%{{ toPersianNum($product->discount)  }} تخفیف</span>
                    <span class="card-after-discount">{{ toPersianNum(presentPrice($product->price,$product->discount)) }} تومان</span>
                    </div>
                    </div>
       
    </div>    
    
    @endforeach
    @else
    <div class="title_block"><span>محصولات مرتبط</span></div>
    @forelse ($mightAlsoLike as $product)
    <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="mini-card-product">
                    <div class="card-header">
                            <a href="{{ route('shop.show', $product->slug) }}" class="" title="{{ $product->name }}"><span class="card-span">{{ $product->name }}</span></a>
                            <span class="card-location"><i class="fa fa-map-marker"></i>&nbsp; {{$product->location}}</span>
                    </div>
                    <div class="card-timer">
                            <a href="{{ route('shop.show', $product->slug) }}" class="" title="{{ $product->name }}" class=""><span class="card-span"><script>
                                    jQuery(function() {
                                        var endDate = "{{date('Y-m-d', strtotime($product->end_date))}}";
                                        jQuery('.{{$product->slug}}').countdown({
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
                                </script><span><i class="fa fa-clock-o"></i></span><ul class="deal-timer {{$product->slug}}"></ul></span></a>
                                <span class="card-shopping"><i style="font-size: 17px;" class="fa fa-shopping-bag"></i>&nbsp;{{toPersianNum($product->sold)}}</span>
                    </div>
                    <a class="sb-preview-img" href="{{ route('shop.show', $product->slug) }}" class="" title="{{ $product->name }}">
                    <img class="card-img-top" src="{{ productImage($product->image) }}" alt="{{ $product->name }}">
                    </a>
                    
                    <div class="card-footer">
                    <a href="{{ route('shop.show', $product->slug) }}" class="" title="{{ $product->name }}" class=""><span style="font-size: 14px;" class="card-span"><del>{{ toPersianNum($product->price) }} تومان</del></span></a>
                    <span class="card-discount">%{{ toPersianNum($product->discount)  }} تخفیف</span>
                    <span class="card-after-discount">{{ toPersianNum(presentPrice($product->price,$product->discount)) }} تومان</span>
                    </div>
                    </div>
       
    </div>    
        @empty
        <div style="text-align: left">موردی یافت نشد!</div>
        @endforelse 
        @endif      		
    </div>
    <div class="clear"></div>	
    <div class="question box_single">
        <div class="title_block">
            <span> نظرات</span>
        </div>
	</div>
	<!-- Comments -->
	<div id="reviews" class="woocommerce-Reviews">
        <div id="comments">
            <h2 class="woocommerce-Reviews-title">نقد و بررسی ها ({{$reviews->count()}}) دیدگاه</h2>
            @if(Auth::guard('customer')->check() && !empty($CustomerOrderItems->id))
            <div id="review_form_wrapper">
                <div id="review_form">
                    <div id="respond" class="comment-respond">
                    <form method="post" id="commentform" class="comment-form">
                            <p class="comment-notes"><span id="email-notes">نشانی ایمیل شما منتشر نخواهد شد.</span> بخش‌های موردنیاز علامت‌گذاری شده‌اند <span class="required">*</span></p>
                        <p>
                            <div class="star_rating">
                                
                                <input id="rating" class="rating rating-loading" name="rating" value="5" data-min="0" data-max="5" data-step="0.9" data-size="xs"  data-show-caption="false"
                                data-show-clear="false">        
                            </div>
                        </p>
                        <p class="comment-form-comment"><label for="comment">دیدگاه شما </label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea></p><p class="comment-form-author"><label for="author">نام <span class="required">*</span></label> <input id="author" name="author" type="text" value="" size="30" aria-required="true" required /></p>
                        <p class="comment-form-email"><label for="email">ایمیل</label> <input id="email" name="email" type="email" value="" size="30" /></p>
                        <p class="form-submit"><input name="submit" type="submit" onclick="createReview(event)" id="submit" class="submit" value="ثبت" /> 
                    
                        <input type='hidden' name='product_id' value='{{$product->id}}' />
                        </p>
                    </form>
                    </div><!-- #respond -->
                </div>
            </div>
    
        @endif
        <div class="clear"></div>
                <div class="customer-review">
                    
        @if($reviews->count()==0)
		
			<p class="woocommerce-noreviews">هیچ دیدگاهی برای این محصول نوشته نشده است .</p>
        @else
        @foreach ($reviews as $review)
        <ol class="commentlist">
                <li class="comment byuser comment-author-onliner even thread-even depth-1" id="li-comment-230">
        
        <div id="comment-230" class="comment_container">
        
        
        <div class="comment-text">
        
        <strong class="woocommerce-review__author" style="color:#ff5a5f">{{$review->author}}</strong>
        <p class="meta">
        
        <time class="woocommerce-review__published-date" style="color:green"><?php 
            $ydate = date('Y', strtotime($review->created_at));  
            $mdate = date('m', strtotime($review->created_at));  
            $ddate = date('d', strtotime($review->created_at));  
           $date = g2p($ydate,$mdate ,$ddate);
       ?>
       {{$date[0]}}/{{$date[1]}}/{{$date[2]}}</time>
        </p>
        <p>
                <div class="star_rating">
                <input id="rating" class="rating rating-loading" name="rating" value="{{$review->rating*0.9}}" data-min="0" data-max="5" data-step="0.9" data-size="xs"  data-show-caption="false" data-display-only="true">        
                </div>
        </p>
        <div class="description"><p>{{$review->text}}</p>
        </div>
        </div>
        </div>
        </li><!-- #comment-## -->
            </ol>  
        @endforeach
        @endif


    </div>




</div>

</div>
<div class="clear"></div>






</div>

                    
                    
        </div>

    </div>

</section>

<!--social &  Subscription-->
<section id="social">
    <div class="container">
        <div class="row">

            <!--Newsletters-->
            <div class="block_newsletters">

<div class="widget_wysija_cont shortcode_wysija"><div id="msg-form-wysija-shortcode5b2b5b6892014-1" class="wysija-msg ajax"></div><form id="form-wysija-shortcode5b2b5b6892014-1" method="post" action="#wysija" class="widget_wysija shortcode_wysija">
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
                    <li id="menu-item-188" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-188"><a href="#">قوانین و مقررات</a></li>
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
            <p class="copyright_super_admin"><p>تمامی حقوق سایت متعلق به سامانه خرید و تخفیف گروهی بن اینجا می باشد.</p></p>
            <span class="copyright_takhfifat"></span>
        </div>
    </div>
</section>


<!-- /top-link-block -->
<span id="top-link-block" class="hidden">
    <a href="#top" class="well well-sm" style="background-color: ;"  onclick="jQuery('html,body').animate({scrollTop:0},'slow');return false;"><i class="fa fa-angle-up"></i></a>
</span><!-- /top-link-block -->



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../wp-content/themes/takhfifat/js/star-rating.js" type="text/javascript"></script>
<script src="../../wp-content/themes/takhfifat/js/bootstrap.min.js"></script>
<script src="../../wp-content/themes/takhfifat/js/jquery.countdownTimer.js"></script>
<script src="../../wp-content/themes/takhfifat/js/custom.js"></script>
<script type='text/javascript' src='../../wp-content/plugins/woocommerce/assets/js/frontend/single-product.min6765.js?ver=3.3.3'></script>
<script type='text/javascript' src='../../wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min44fd.js?ver=2.70'></script>
<script type='text/javascript' src='../../wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min6b25.js?ver=2.1.4'></script>

{{--<script type='text/javascript' src='../../wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min6765.js?ver=3.3.3'></script>--}}
<script type='text/javascript' src='../../wp-includes/js/jquery/ui/core.mine899.js?ver=1.11.4'></script>
<script type='text/javascript' src='../../wp-includes/js/jquery/ui/widget.mine899.js?ver=1.11.4'></script>
<script type='text/javascript' src='../../wp-includes/js/jquery/ui/mouse.mine899.js?ver=1.11.4'></script>
<script type='text/javascript' src='../../wp-includes/js/jquery/ui/sortable.mine899.js?ver=1.11.4'></script>
<script type='text/javascript' src='../../wp-includes/js/jquery/ui/datepicker.mine899.js?ver=1.11.4'></script>

<script type='text/javascript' src='../../wp-content/plugins/dokan-lite/assets/vendors/tooltips/tooltipsb246.js?ver=2.7.8'></script>
<script type='text/javascript' src='../../wp-content/plugins/dokan-lite/assets/vendors/chosen/chosen.jquery.minb246.js?ver=2.7.8'></script>

<script type='text/javascript' src='../../wp-content/plugins/dokan-lite/assets/vendors/form-validate/form-validateb246.js?ver=2.7.8'></script>
<script type='text/javascript' src='../../wp-content/plugins/dokan-lite/assets/js/speakingurl.minb246.js?ver=2.7.8'></script>
<script type='text/javascript' src='../../wp-includes/js/imgareaselect/jquery.imgareaselect.min1845.js?ver=4.9.6'></script>
<script type='text/javascript' src='../../wp-includes/js/underscore.min4511.js?ver=1.8.3'></script>
<script type='text/javascript' src='../../wp-includes/js/customize-base.min1845.js?ver=4.9.6'></script>
<script type='text/javascript' src='../../wp-includes/js/backbone.min9632.js?ver=1.2.3'></script>
<script type='text/javascript' src='../../wp-includes/js/customize-modelsb246.js?ver=2.7.8'></script>
{{--<script type='text/javascript' src='../../wp-content/plugins/dokan-lite/assets/js/dokanb246.js?ver=2.7.8'></script>--}}
<script type='text/javascript' src='../../wp-content/plugins/dokan-lite/assets/vendors/select2/select2.full.minb246.js?ver=2.7.8'></script>
<script type='text/javascript' src='../../wp-content/plugins/dokan-pro/assets/js/single-product-shipping.js'></script>
<script type='text/javascript' src='../../wp-includes/js/hoverIntent.minc245.js?ver=1.8.1'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var megamenu = {"timeout":"300","interval":"100"};
/* ]]> */
</script>
<script type='text/javascript' src='../../wp-content/plugins/megamenu/js/maxmegamenu9254.js?ver=2.3.6'></script>
<script type='text/javascript' src='../../wp-includes/js/wp-embed.min1845.js?ver=4.9.6'></script>
<script type='text/javascript' src='../../wp-includes/js/comment-reply.min1845.js?ver=4.9.6'></script>
<script type='text/javascript' src='../../wp-content/plugins/wysija-newsletters/js/validate/languages/jquery.validationEngine-fa4dc3.js?ver=2.8.2'></script>
<script type='text/javascript' src='../../wp-content/plugins/wysija-newsletters/js/validate/jquery.validationEngine4dc3.js?ver=2.8.2'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wysijaAJAX = {"action":"wysija_ajax","controller":"subscribers","ajaxurl":"http:\/\/localhost\/takhfiftest\/wp-admin\/admin-ajax.php","loadingTrans":"\u062f\u0631 \u062d\u0627\u0644 \u0628\u0627\u0631\u06af\u0630\u0627\u0631\u06cc...","is_rtl":"1"};
/* ]]> */
</script>
<script type='text/javascript' src='../../wp-content/plugins/wysija-newsletters/js/front-subscribers4dc3.js?ver=2.8.2'></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.container').persiaNumber();
});
</script>
	</body>
</html>
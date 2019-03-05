<!DOCTYPE html>
<html
xmlns="http://www.w3.org/1999/xhtml" xml:lang="fa" lang="fa">

<!-- Boninja.com --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Boninja.com -->
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
    <meta name="description" content="بهترین تخفیف های {{ $category->name }} در شیراز" />
    <meta name="keywords" content="بن اینجا,boninja,خرید گروهی,زیبایی,تخفیف,تخفیف گروهی,سایت خرید گروهی,پزشکی,تخفیف اینجا,آنلاین,فروش آنلاین,حراج,حراجی,کوپن,بن,رستوران,شیراز,کالا,تفریح"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>تخفیف {{ $category->name }} در شیراز - بن اینجا</title>
          <link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">
          <link rel="apple-touch-icon" href="{{{ asset('img/favicon.png') }}}"/>
              
      {{--<link rel='stylesheet' id='validate-engine-css-css'  href='../../wp-content/plugins/wysija-newsletters/css/validationEngine.jquery4dc3.css?ver=2.8.2' type='text/css' media='all' />
      <link rel='stylesheet' id='woocommerce-layout-rtl-css'  href='../../wp-content/plugins/woocommerce/assets/css/woocommerce-layout-rtl6765.css?ver=3.3.3' type='text/css' media='all' />
      <link rel='stylesheet' id='woocommerce-smallscreen-rtl-css'  href='../../wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen-rtl6765.css?ver=3.3.3' type='text/css' media='only screen and (max-width: 768px)' />
      <link rel='stylesheet' id='woocommerce-general-rtl-css'  href='../../wp-content/plugins/woocommerce/assets/css/woocommerce-rtl6765.css?ver=3.3.3' type='text/css' media='all' />--}}
      <link rel='stylesheet' id='megamenu-css'  href='../../wp-content/uploads/maxmegamenu/style3d1a.css?ver=1.1' type='text/css' media='all' />
     {{-- <link rel='stylesheet' id='dashicons-css'  href='../../wp-includes/css/dashicons.min1845.css?ver=4.9.6' type='text/css' media='all' />
      <link rel='stylesheet' id='dokan-style-css'  href='../../wp-content/plugins/dokan-lite/assets/css/styleb246.css?ver=2.7.8' type='text/css' media='all' />
      <link rel='stylesheet' id='dokan-fontawesome-css'  href='../../wp-content/plugins/dokan-lite/assets/vendors/font-awesome/font-awesome.minb246.css?ver=2.7.8' type='text/css' media='all' />
      <link rel='stylesheet' id='dokan-rtl-style-css'  href='../../wp-content/plugins/dokan-lite/assets/css/rtlb246.css?ver=2.7.8' type='text/css' media='all' />
      <link rel='stylesheet' id='dokan-select2-css-css'  href='../../wp-content/plugins/dokan-lite/assets/vendors/select2/select2b246.css?ver=2.7.8' type='text/css' media='all' />--}}
      
      <script type='text/javascript' src='../../wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4'></script>
      <script type='text/javascript' src='../../wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
      <!--[if lt IE 8]>
      <script type='text/javascript' src='http://localhost/takhfiftest/wp-includes/js/json2.min.js?ver=2015-05-03'></script>
      <![endif]-->
      
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../wp-content/themes/takhfifat/owl.carousel.min.css?ver=1.1">
    {{--<link rel="stylesheet" href="../../wp-content/themes/takhfifat/owl.theme.default.min.css">--}}

    
<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
<link rel="stylesheet" type="text/css" href="../../engine1/style.css" />
<script type="text/javascript" src="../../engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->{{--
    <link href="../../wp-content/themes/takhfifat/css/list.css?ver=1.1" rel="stylesheet">
    <link href="../../wp-content/themes/takhfifat/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../wp-content/themes/takhfifat/css/bootstrap-rtl.css" rel="stylesheet">
    <link href="../../wp-content/themes/takhfifat/css/font-awesome.css" rel="stylesheet">
   <link href="../../wp-content/themes/takhfifat/stylefc99.css?ver=4.5" rel="stylesheet">--}}
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
    <script src = "../../js/jquery.min.js"></script>
    
<script>

    function subcatview(slug){
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/getcategory/'+slug ,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data){
                $('.cat-list').html(data)
            }
        });
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/getcategory-slider/'+slug ,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data){
                $('.ajax-slider').html(data);
                $('#myCarousel').carousel({
                    interval: 3000
              });
            }
        });


    }
   
</script>
<script>
    function listView(){
        var slug = $('#all').val();
        if($('.filter-subcat').is(':checked')){
            var slug = $('.filter-subcat:checked').val();
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/getlist/'+slug ,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data){
                $('.cat-list').html(data)
            }
        });
        
    }
       
</script>
<script>
    function gridView(){
        var slug = $('#all').val();
        if($('.filter-subcat').is(':checked')){
            var slug = $('.filter-subcat:checked').val();
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/getcategory/'+slug ,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data){
                $('.cat-list').html(data)
            }
        });
        
    }
       
</script>
    
    <script>
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
                        <li id="menu-item-164" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-164"><a href="https://www.instagram.com/boninjaa/" title="اینستاگرام"><i class="fa fa-instagram" style="padding:0px;"></i>ما را دنبال کنید!</a></li>
                {{--<li id="menu-item-166" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-166"><a href="/products">همه پیشنهادها</a></li>--}}
                    </ul>
            <!--phone-->
                <div class="phone"><span><i class="fa fa-phone"></i>{{ toPersianNum('09176952155')}} - {{  toPersianNum('07136265496')}}</span></div>
			            
			<!--social-->
            <div class="social_header">
            
                
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
                            <div class="logo" ><a href="https://boninja.com" title="سامانه خرید و تخفیف گروهی بن اینجا"><span style="visibility: hidden">سایت تخفیف گروهی و خرید در شیراز - بن اینجا</span></a></div>
            
            <!--select search-->
            <div id="form_header">
                <div class="main_select">
                    <form action="#" method="post" id="select_cities_form">
                        <i class="fa fa-map-marker"></i>
                        <select id="cities_list" name="city_name">
                            <option value="all" >همه شهر ها</option>
                            {{--<option value='تهران' >تهران (9)</option><option value='مشهد' >مشهد (40)</option><option value='اصفهان' >اصفهان (0)</option><option value='کرج' >کرج (2)</option><option value='شیراز' >شیراز (0)</option><option value='تبریز' >تبریز (0)</option>--}}                        </select>
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
                    <a class="main_title_cart" href="/cart" rel="nofollow"><i class="fa fa-shopping-cart" aria-hidden="true"></i>سبد خرید شما<span class="number_items_cart">{{ toPersianNum(Cart::content()->count())  }}</span></a>
                    
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
                                        <ul class="mega-sub-menu-mob">
                                                <li class='mega-menu-item'><a class="mega-menu-link" href="{{ route('shop.showCategory', $item->slug) }}" style="color: #19499c;"> همه {{$item->name}} ها</a></li>
                                        </ul>
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
                <ol class="breadcrumb"><a href="/">خانه</a> &#47; <h1 style="
                    font-size: 16px;
                    display: inline;
                    line-height: 0px;
                    font-weight: normal;
                    color: #000;
                ">تخفیف {{ $category->name }} <span style="visibility:hidden;line-height: 0;">در شیراز - سایت تخفیف گروهی بن اینجا</span></h1></ol> 
                <div class="ajax-slider">
                @if(!$category->parent_id or empty($featured_product->gallery))
                <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
                    <div id="wowslider-container1">
                        <div class="ws_images">
                            <ul>
                                @foreach ( $sliderimages as  $sliderimage )
                                    <li><a href="{{$sliderimage->url}}"><img src="{{ productImage($sliderimage->image) }}" alt="تخفیف {{$sliderimage->name}} " /></a></li>
                                @endforeach
                            </ul></div>
                    <div class="ws_script" style="position:absolute;left:-99%"></div>
                        <div class="ws_shadow"></div>
                        </div>	
                        <script type="text/javascript" src="../../engine1/wowslider.js"></script>
                        <script type="text/javascript" src="../../engine1/script.js"></script>
                        <!-- End WOWSlider.com BODY section -->
                        @else
                        
                        <div class="block_gallery_archive" style="
                        border-radius: 0;
                        border: none;
                    ">

                            <!-- images -->
    
                            <div class="gallery_item">
    
    
    
                                <!--option-->
    
                                <div class="option_item_gallery">
    
                                
                                    <span class="address"><i class="fa fa-map-marker"></i> {{$featured_product->location}} </span>
    
                                
                                        <span class="number-sale"><i class="fa fa-shopping-basket"></i>۰</span>
    
                                </div>
                                <div class="time_out">
                                    			
                                </div>
    
    
    
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
    
    
                                    <!-- Wrapper for slides -->
    
                                    <div class="carousel-inner" role="listbox" style="
                                    border-radius: 20px 0px 20px 0px;
                                ">
    
    
    
                                        <div class="item active">
    
                                            <div class="img_item">
    
                                                <a href="{{ route('shop.show', $featured_product->id) }}" title="{{ $featured_product->name }}"><img src="{{ productImage($featured_product->image) }}" title="تخفیف {{ $featured_product->name }}" alt="تخفیف {{ $featured_product->name }}"></a>
    
                                            </div>
    
                                        </div>
                                        <?php $i=0; ?>
                                        @if(!empty($featured_product->gallery))
                                            @foreach (json_decode($featured_product->gallery, true) as $image)
                                                <?php $i++; ?>
                                                <div class="item">

                                                    <div class="img_item">
            
                                                    <a href="{{ route('shop.show', $featured_product->id) }}" title="{{ $featured_product->name }}"><img src="{{ productImage($image) }}" title="تخفیف {{ $featured_product->name }}" alt="تخفیف {{ $featured_product->name }}"></a>
            
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
                                <span><a href="{{ route('shop.show', $featured_product->id) }}" title="{{ $featured_product->name }}"><i class="fa fa-home"></i>{{ $featured_product->name }}</a></span>
                                <span class="Discount"><b>%{{ toPersianNum($featured_product->discount)  }}</b>تخفیف</span>
                            <h2><a href="{{ route('shop.show', $featured_product->id) }}" title="{{ $featured_product->name }}">{{ toPersianNum($featured_product->description)}}</a></h2>
                                    <table class="table_slider">
                                        <tbody>
                                            <tr>
                                                <td style="
                                                background-color: #f6861f;    padding: 8px;
                                            "><div class="timer_farsi_single" style="float: right;color: white;">
                                            <span     style="padding-left: 10px;
                                            font-size: 22px;">
                                                    <i class="fa fa-clock-o"></i></span>
                                                    <ul class="deal-timer {{$featured_product->slug}}"><li><span class="num">۷۱</span><span class="text">  روز </span></li><li><span class="num">۷</span><span class="text"> ساعت </span></li><li><span class="num">۵۸</span><span class="text"> دقیقه </span></li><li><span class="num">۳۶</span><span class="text"> ثانیه </span></li></ul>
                                                <script>
                                                                    jQuery(function() {
                                                        var endDate = "{{date('Y-m-d', strtotime($featured_product->end_date))}}";
                                                        jQuery('.{{$featured_product->slug}}').countdown({
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
                                                </script>		</span>
                                                </div>
                                            </td>
                                            

                                            </tr>
                                            <tr>
                                            <td style="color: white;
                                            background-color: #19499c;    padding: 10px;
                                        " colspan="2"><span style="
                                                float: right;
                                                padding-right: 40px;
                                                color: #fb9b93;
                                                font-size: 18px;
                                            " class=""><del>
                                                <span class="">{{toPersianNum($featured_product->price)}}&nbsp;
                                                    <span class="">تومان</span>
                                                </del>
                                                </span>
                                            
                                                <span style="
                                                float: left;
                                                color: #bff3bf;
                                                font-size: 18px;
                                                padding-left: 40px;
                                            ">{{toPersianNum(presentPrice($featured_product->price,$featured_product->discount))}}&nbsp;
                                                    <span>تومان</span>
                                                </span>
                                            </span></td>
                                        </tr>
                                        <tr>
                                            <td style="
                                            color: white;
                                            background-color: #ec4436;    padding: 10px;
                                        "><span>تعداد خریداری شده  @if($featured_product->children->sum('sold')){{toPersianNum($featured_product->children->sum('sold'))}}@else{{toPersianNum($featured_product->sold)}}@endif</span></td>
                                            
                                        </tr>
                                        </tbody>
                                    </table>
                                <div class="eye_buy"><a href="{{ route('shop.show', ['product' => $featured_product->id, 'category' => $category->slug] ) }}"><i class="fa fa-shopping-cart"></i>مشاهده و خرید</a></div>
                            </div>
    
    
    
                        </div>
                        @endif


</div>
 <div class="clear"></div>
                <!--related product -->
<div class="cat_show">
        <span class="cat_icon_inside"><i class="fa 
       
            @if($category->children->count() > 0) 
            {{$category->icon}} 
            @elseif(empty($category->parent_id))
            {{$category->icon}} 
            @else
            {{$category->parent->icon}} 
            @endif"></i></span>
        <span class="cat_show_catname">
               
                <div class="col-lg-4 col-md-4">
                    <span>@if(!empty($categoryParent))
                        {{ $categoryParent->name }}
                       
                        @else
                        {{ $category->name }}                   
                        @endif
                    </span>    
                </div>
                <div class="col-lg-4 col-md-4">
                    
                       
                    
                </div>
                <div class="col-lg-4 col-md-4">
                        <span class="list-grid-button">
                                <div id="btnContainer">
                                        <button id="element" class="btn" onclick="listView()"><i class="fa fa-bars"></i> </button> 
                                        <button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i></button>
                                </div>
    
    
                        </span>
                        
                        
                </div>
                
            
            
            
            </span>


        <div class="cat-filter-box">
                <div class="col-lg-12 col-md-12 cat-filter">
                        <div class="owl-carousel">
                        
                               {{--   @if($category->children->count() > 0)  --}}
                               @if(!empty($categoryParent))
                               
                                <div class="item">
                                        <div class="slide_item">
                                                
                                        <input id="all" class="filter-subcat" type="radio"  name="cat_filter" onClick="subcatview(this.value)" value="{{ $categoryParent->slug }}">
                                        <label for="all" class="nb-btn nb-btn-sm name label-cat-filter" >همه</label>
                                                
            
                                        </div>
                                    </div>
                                    @foreach ( $category->parent->children->sortBy('sort_order') as $subcat )
                                <div class="item">
                                    <div class="slide_item">
                                            @if($category->slug == $subcat->slug)
                                                    <input id="{{ $subcat->slug }}" class="filter-subcat" type="radio" value="{{ $subcat->slug }}" name="cat_filter" onClick="subcatview(this.id)" checked>
                                                    <label for="{{ $subcat->slug }}" class="nb-btn nb-btn-sm name label-cat-filter">{{ $subcat->name }}</label>
                                            @else

                                            <input id="{{ $subcat->slug }}" class="filter-subcat" type="radio" value="{{ $subcat->slug }}" name="cat_filter" onClick="subcatview(this.id)">
                                            <label for="{{ $subcat->slug }}" class="nb-btn nb-btn-sm name label-cat-filter">{{ $subcat->name }}</label>

                                            @endif
                                    </div>
                                </div>
                                    @endforeach
                                    @else
                                    <div class="item">
                                            <div class="slide_item">
                                                    
                                            <input id="all" class="filter-subcat" type="radio"  name="cat_filter" onClick="subcatview(this.value)" value="{{ $category->slug }}">
                                            <label for="all" class="nb-btn nb-btn-sm name label-cat-filter" >همه</label>
                                                    
                
                                            </div>
                                        </div>
                                    @foreach ( $category->children->sortBy('sort_order') as $subcat )
                                    <div class="item">
                                        <div class="slide_item">
                                               
                                                        <input id="{{ $subcat->slug }}" class="filter-subcat" type="radio" value="{{ $subcat->slug }}" name="cat_filter" onClick="subcatview(this.id)">
                                                        <label for="{{ $subcat->slug }}" class="nb-btn nb-btn-sm name label-cat-filter">{{ $subcat->name }}</label>
                                        </div>
                                    </div>
                                        @endforeach
                                        @endif

                                    {{--@endif--}}
                            
                              </div>
                </div>
            </div>
            <div id="ajax-view">
                    <div class="cat-list">
    @forelse ($productsForCategories as $product) 
    
    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="mini-card">
                <div class="card-header">
                        <a href="{{ route('shop.show', $product->id) }}" class="btn btn-secondary" title="{{ $product->name }}" style="
                            width: 25%;
                        "><span class="card-span">{{ $product->name }}</span></a>
                        <span class="card-location"><i class="fa fa-map-marker"></i>&nbsp;{{$product->location}}</span>
                </div>
                <div class="card-timer">
                        <a href="{{ route('shop.show', $product->id) }}" class="btn btn-secondary" title="{{ $product->name }}" class="btn btn-secondary"><span class="card-span"><script>
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
                            <span class="card-shopping"><i style="font-size: 17px;" class="fa fa-shopping-bag"></i>&nbsp;@if($product->children->sum('sold')){{toPersianNum($product->children->sum('sold'))}}@else{{toPersianNum($product->sold)}}@endif</span>
                </div>
                <a class="sb-preview-img" href="{{ route('shop.show', $product->id) }}" class="btn btn-secondary" title="{{ $product->name }}">
                <img class="card-img-top" src="{{ productImage($product->image) }}" title="تخفیف {{ $product->name }}" alt="تخفیف {{ $product->name }}">
                </a>
                
                <div class="card-footer">
                <a href="{{ route('shop.show', $product->id) }}" class="btn btn-secondary" title="{{ $product->name }}" class="btn btn-secondary"><span style="font-size: 14px;" class="card-span"><del>{{ toPersianNum($product->price) }} تومان</del></span></a>
                <span class="card-discount">%{{ toPersianNum($product->discount)  }} تخفیف</span>
                <span class="card-after-discount">{{ toPersianNum(presentPrice($product->price,$product->discount)) }} تومان</span>
                </div>
                </div>
   
</div>         	
        @empty
        <div style="text-align: center">موردی یافت نشد!</div>
        @endforelse 

            <div class="clear"></div>


    </div>
        </div>
        <p style="
        visibility: hidden;"> <strong>بهترین تخفیف های {{$category->name}} در شهر شیراز </strong>با وب سایت تخفیف و خرید گروهی بن اینجا</p>
                </div>   
                       
        <div class="clear"></div>
                
<!--text_short_category-->

            </div>
        </div>
    </section>
<!--social &  Subscription-->
<section id="social">
    <div class="container">
        <div class="row">

            <!--Newsletters-->
            <div class="block_newsletters">

<div class="widget_wysija_cont shortcode_wysija" style="display:none;"><div id="msg-form-wysija-shortcode5b2b5a31763e0-1" class="wysija-msg ajax"></div><form id="form-wysija-shortcode5b2b5a31763e0-1" method="post" action="#wysija" class="widget_wysija shortcode_wysija">
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
                <p><img id='jxlzesgtjxlzrgvjnbqergvjrgvj' style='cursor:pointer' onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=1013233&p=rfthobpdrfthxlaouiwkxlaoxlao", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")' alt='logo-samandehi' src='{{{ asset('img/samandehi.png') }}}'/></p>
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
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-188"><a href="/help">نحوه خرید</a></li>
                        
                        </ul></div></div>            </div>
            <!--map-->
            <div class="col-lg-3 col-md-3">
                <div class="map">
									<img src="../../wp-content/uploads/2017/05/naghshe-1.jpg" />
				                </div>
            </div>
        </div>
    </div>
    
    <script src="../../wp-includes/js/jquery/owl.carousel.min.js"></script>
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
<script src="../../wp-content/themes/takhfifat/js/bootstrap.min.js"></script>
<script src="../../wp-content/themes/takhfifat/js/jquery.countdownTimer.js"></script>
<script src="../../wp-content/themes/takhfifat/js/custom.js"></script>
<script type='text/javascript' src='../../wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min6765.js?ver=3.3.3'></script>
<script type='text/javascript' src='../../wp-includes/js/hoverIntent.minc245.js?ver=1.8.1'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var megamenu = {"timeout":"300","interval":"100"};
/* ]]> */
</script>
<script type='text/javascript' src='../../wp-content/plugins/megamenu/js/maxmegamenu9254.js?ver=2.3.6'></script>
<script type='text/javascript' src='../../wp-includes/js/wp-embed.min1845.js?ver=4.9.6'></script>
<script type='text/javascript' src='../../wp-content/plugins/wysija-newsletters/js/validate/languages/jquery.validationEngine-fa4dc3.js?ver=2.8.2'></script>
<script type='text/javascript' src='../../wp-content/plugins/wysija-newsletters/js/validate/jquery.validationEngine4dc3.js?ver=2.8.2'></script>



<script type="text/javascript">
    
    jQuery(document).ready(function(){
       jQuery('.owl-carousel').owlCarousel({
        rtl:true,
        loop:false,
        autoWidth:true,
        margin:7,
        responsiveClass:true,
        navText : ['<i class="fa fa-chevron-right" aria-hidden="true"></i>','<i class="fa fa-chevron-left" aria-hidden="true"></i>'],
        nav:true
       
        
        })
        
        
    });
    </script>
    
	</body>


</html>
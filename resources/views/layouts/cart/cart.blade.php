<!DOCTYPE html>
<html lang="fa">

<!-- Boninja.com -->
<!-- Boninja.com --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Boninja.com -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>
        سبد خرید - سایت تخفیف گروهی بن اینجا در شیراز   </title>
	

<link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">
{{--<link rel='stylesheet' id='select2-css'  href={{ asset('wp-content/plugins/woocommerce/assets/css/select26765.css?ver=3.3.3') }} type='text/css' media='all' />--}}
<link rel='stylesheet' id='woocommerce-layout-rtl-css'  href={{ asset('wp-content/plugins/woocommerce/assets/css/woocommerce-layout-rtl6765.css?ver=3.3.3') }} type='text/css' media='all' />
<link rel='stylesheet' id='woocommerce-smallscreen-rtl-css'  href={{ asset('wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen-rtl6765.css?ver=3.3.3') }} type='text/css' media='only screen and (max-width: 768px)' />
<link rel='stylesheet' id='woocommerce-general-rtl-css'  href={{ asset('wp-content/plugins/woocommerce/assets/css/woocommerce-rtl6765.css?ver=3.3.3') }} type='text/css' media='all' />
<link rel='stylesheet' id='megamenu-css'  href={{ asset('wp-content/uploads/maxmegamenu/style3d1a.css?ver=1.1') }} type='text/css' media='all' />{{--
<link rel='stylesheet' id='dashicons-css'  href={{ asset('wp-includes/css/dashicons.min1845.css?ver=4.9.6') }} type='text/css' media='all' />
<link rel='stylesheet' id='dokan-style-css'  href={{ asset('wp-content/plugins/dokan-lite/assets/css/styleb246.css?ver=2.7.8') }} type='text/css' media='all' />
<link rel='stylesheet' id='dokan-fontawesome-css'  href={{ asset('wp-content/plugins/dokan-lite/assets/vendors/font-awesome/font-awesome.minb246.css?ver=2.7.8') }} type='text/css' media='all' />
<link rel='stylesheet' id='dokan-rtl-style-css'  href={{ asset('wp-content/plugins/dokan-lite/assets/css/rtlb246.css?ver=2.7.8') }} type='text/css' media='all' />--}}

<script type='text/javascript' src='../wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4'></script>
{{--<script type='text/javascript' src='../wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>--}}



    <!-- Bootstrap -->
    <link href="../wp-content/themes/takhfifat/css/bootstrap.min.css" rel="stylesheet">
    <link href="../wp-content/themes/takhfifat/css/bootstrap-rtl.css" rel="stylesheet">
    <link href="../wp-content/themes/takhfifat/css/font-awesome.css" rel="stylesheet">
    <link href="../wp-content/themes/takhfifat/stylefc99.css?ver=2.9" rel="stylesheet">
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
  <script src="../wp-content/themes/takhfifat/js/axios.js"></script>
    <script>
    jQuery(document).ready(function(){  
        //alert('h');
        jQuery('.select-quantity').change(function() {
            var qty = jQuery(this).attr('value');
            var id = jQuery(this).attr('data-id');
          
            axios.patch(`/cart/${id}`, {
                        quantity: this.value
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
             });      
        });
    });
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
 <script>
        jQuery(document).ready(function() {
        jQuery.fn.digits = function(){ 
            return this.each(function(){ 
                jQuery(this).text( jQuery(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
            })
        }
        jQuery(".numbers").digits();
        });
        
        
</script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('input[type="checkbox"]').click(function(){
            if(jQuery(this).prop("checked") == true){
                jQuery('#wallet_use').prop('checked', true);
            }
            else if(jQuery(this).prop("checked") == false){
                jQuery('#wallet_use').prop('checked', false);
                //alert("Checkbox is unchecked.");
            }
        });
    });
</script>

</head>
<body class="rtl page-template-default page page-id-8 woocommerce-cart woocommerce-page mega-menu-main-menu dokan-theme-takhfifat">
    <!----- Top Menu
-------------------->
<section class="top_header">
    <div class="container">
            <div style="width: 300px;">
                    @include('flash-message')
            </div>
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
                            {{--<option value='تهران' >تهران (9)</option><option value='مشهد' >مشهد (40)</option><option value='اصفهان' >اصفهان (0)</option><option value='کرج' >کرج (2)</option><option value='شیراز' >شیراز (0)</option><option value='تبریز' >تبریز (0)</option>--}}
                        </select>
                    </form>
                                        <div class="realoading"></div>
                    <script>
                        jQuery("#cities_list").on("change", function() {
                            var city_name_temp = jQuery(this).find("option:selected").text();
                            var city_name = jQuery('#cities_list').val()
                            jQuery.post("../wp-content/themes/takhfifat/includes/set-cookies.html", {city_name: city_name}, function(result){
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
            <a class="main_title_cart" href="/cart" ><i class="fa fa-shopping-cart" aria-hidden="true"></i>سبد خرید شما<span class="number_items_cart">{{ Cart::content()->count() }}</span></a>
                
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
                                                    <li class='mega-menu-item'><a class="mega-menu-link" href="{{ route('shop.showCategory', $item->slug) }}" style="
                                                            color: #19499c;
                                                        "> همه {{$item->name}} ها</a></li>
                                            </ul>
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
<!-- / Nav -->    <!--wrapper-->
    <section id="wrapper">
    <div class="container">
        <div class="row">
                        <ol class="breadcrumb"><a href="/">خانه</a> &#47; سبد خرید</ol>            
                    
                        <div class="post-content-page">
                                        
                            <!--title & discount & views-->
                            <div class="title_post">
                                <h1>سبد خرید</h1>
                            </div>
                            <div class="woocommerce">
                                @if (session()->has('success_message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success_message') }}
                                    </div>
                                @endif
                                @if (session()->has('error_message'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error_message') }}
                                    </div>
                                @endif
                    
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if(isset($success_message))
                                    <div class="alert alert-info">{{$success_message}}</div>
                                @endif

                                @if(isset($error_message))
                                    <div class="alert alert-danger">{{$error_message}}</div>
                                @endif

                                @if (Cart::count() > 0)
                                   {{-- <h2>{{ Cart::content()->count() }} item(s) in Shopping Cart</h2>--}}

                                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="product-remove">&nbsp;</th>
                                                <th class="product-thumbnail">&nbsp;</th>
                                                <th class="product-name">محصول</th>
                                                <th class="product-price">قیمت</th>
                                                <th class="product-quantity">تعداد</th>
                                                <th class="product-subtotal">مجموع</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach (Cart::content() as $item )
                                            <tr class="woocommerce-cart-form__cart-item cart_item">
                                                        <td class="product-remove">
                                                            
                                                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                   
                                                                    <button type="submit" class="remove">×</button>
                                                            </form>
                                                        </td>
                                                        <td class="product-thumbnail">
                                                            <img width="400" height="400" src="{{ productImage($item->model->image) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="" sizes="(max-width: 400px) 100vw, 400px">
                                                        </td>
                                                        <td class="product-name" data-title="محصول"><a href="{{ route('shop.show', $item->model->id) }}">{{ $item->model->name }}</a>
                                                            <dl class="variation">
                                                             {{-- <dt class="variation-">فروشنده:</dt>
                                                                <dd class="variation-"><p>سید محسن فاطمی</p>
                                                                </dd>
                                                                --}}
                                                            </dl>
                                                        </td>
                                                        <td class="product-price" data-title="قیمت">
                                                            <span class="numbers">{{ $item->price }}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                                        </td>
                                                        <td class="product-quantity" data-title="تعداد">
                                                            <div>
                                                               
                                                                <select class="select-quantity" data-id="{{ $item->rowId }}">
                                                                        @for ($i = 1; $i <= $item->options['order_limit'] ; $i++)
                                                                        <option value="{{ $i }}" {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                                        @endfor
                                                                </select>
                                
                                                            </div>
                                                        </td>
                                                        <td class="product-subtotal" data-title="مجموع">
                                                            <span class="numbers">{{ $item->subtotal }}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                                        </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                
        <div class="cart-collaterals">
                <div class="col-lg-6 col-md-12 col-sm-24 col-xs-24">
                    <h3>توجه</h3>
                    <div class="content description" style="
                    background-color: #f2f2f2;
                    border-radius: 5px;
                    padding: 5px;
                ">
                    <p>
                    - کاربر عزیز در صورت بروز خطا هنگام پرداخت، مشکل از سمت درگاه بانک بوده و به حساب شما باز خواهد گشت. 
                    <br>
                    <hr>
                    - در صورتیکه پس از حداکثر یک روز به حساب شما برنگشت از طریق پشتیبانی سایت اقدام نمایید. 
                    
                    </p>
                </div>
                @if(Auth::guard('customer')->check())
                <div class="checkbox text-right" style="
                margin-right: 20px;
            ">
                <input type="checkbox" id="wallet">
                    <label for="wallet" style="
                    padding-right: 5px;
                    ">
                    مایل هستم از اعتبار کیف پولم استفاده کنم
                    (<strong>موجودی کیف پول
                    شما : </strong><span class="numbers">{{$total}}</span> تومان)
                    </label>
            </div>
            @endif

            </div>
            <div class="col-lg-6 col-md-12 col-sm-24 col-xs-24">
                
            @if (! session()->has('coupon'))
                <div class="cart_coupon">
                    <h3>کد تخفیف: </h3>
                        <form action="{{ route('cart.coupon') }}" method="POST">
                                {{ csrf_field() }}
                               
                                <input type="text" name="coupon_code" style="border: 1px solid #c4c2c2;
                                border-radius: 24px;padding: 5px;margin:5px">
                                
                                @if(session()->has('coupon_message'))
                                <div class="alert alert-danger">
                                {{ session()->get('coupon_message') }}
                                </div>
                                @endif
                                
                                <button type="submit" class="nb-btn" style="background: green;margin-top: 5px">بررسی کد تخفیف</button>
                        </form>
                </div>
            @endif
            <div class="cart_totals ">
        
            
            <h2>جمع کل سبد خرید</h2>
        
            <table cellspacing="0" class="shop_table shop_table_responsive">
        
                <tbody><tr class="cart-subtotal">
                    <th> قیمت کل </th>
                <td data-title=" قیمت کل "><span class="numbers">{{ Cart::subtotal() }}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></td>
                </tr>
        
                
                
                
                @if (session()->has('coupon'))
                <tr class="order-total">
                        <th>نوع تخفیف</th>
                        <td data-title="مجموع"><strong><span style="color: green">{{ session()->get('coupon')['name'] }}&nbsp;</span></strong> 
                        </td>
                </tr>
                @endif
                                    
                <tr class="order-total">
                    <th>مجموع</th>
                    <td data-title="مجموع"><strong><span class="numbers">{{ Cart::subtotal() }}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></strong> </td>
                </tr>
        
                
            </tbody></table>
        
            <div class="wc-proceed-to-checkout">
                    <form action="{{ route('checkout.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="checkbox" name="wallet" id="wallet_use" style="visibility:hidden">
                            <button type="submit" class="nb-btn">نهایی کردن خرید</button>
                    </form>
                
            </div>
        
            
        </div>
    </div>
        </div>
        
        </div>
        
                                                    
                    </div>
                    
            @else
            <div class="post-content-page">
                <div class="woocommerce">
                    <p class="cart-empty">سبد خرید شما در حال حاضر خالی است.</p>
                    <p class="return-to-shop">
                        <a class="button wc-backward" href="{{ route('shop.index') }}">بازگشت به فروشگاه</a>
                    </p>
                </div>                                
            </div>
            @endif
                        

        </div>
    </div>
</section>

<!--social &  Subscription-->
<section id="social">
    <div class="container">
        <div class="row">

            <!--Newsletters-->
            <div class="block_newsletters">

<div class="widget_wysija_cont shortcode_wysija" style="display:none;"><div id="msg-form-wysija-shortcode5b2b5a1f853e2-1" class="wysija-msg ajax"></div><form id="form-wysija-shortcode5b2b5a1f853e2-1" method="post" action="#wysija" class="widget_wysija">

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
               {{-- <p><img id='jxlzesgtjxlzrgvjnbqergvjrgvj' style='cursor:pointer' onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=1013233&p=rfthobpdrfthxlaouiwkxlaoxlao", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")' alt='logo-samandehi' src='https://logo.samandehi.ir/logo.aspx?id=1013233&p=nbpdlymanbpdqftiodrfqftiqfti'/></p>--}}
               <p><img id='jxlzesgtjxlzrgvjnbqergvjrgvj' style='cursor:pointer' onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=1013233&p=rfthobpdrfthxlaouiwkxlaoxlao", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")' alt='logo-samandehi' src='{{{ asset('img/samandehi.png') }}}'/></p>
            </div>
        </div>
        <!--concession-->
        <div class="concession">
            <div class="post-content">
                <p><img src="{{{ asset('img/enamad.png') }}}" alt="نماد الکترونیکی سایت تخفیف گروهی بن اینجا" onclick="window.open(&quot;https://trustseal.enamad.ir/Verify.aspx?id=102812&amp;p=kKwVU4anvepH2HDY&quot;, &quot;Popup&quot;,&quot;toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30&quot;)" style="cursor:pointer" id="kKwVU4anvepH2HDY"></p>

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
									<img src="../wp-content/uploads/2017/05/naghshe-1.jpg" />
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

<script src="../wp-content/themes/takhfifat/js/bootstrap.min.js"></script>
<script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/frontend/cart.min6765.js?ver=3.3.3'></script>
<script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min6b25.js?ver=2.1.4'></script>

<script type='text/javascript' src='../wp-includes/js/hoverIntent.minc245.js?ver=1.8.1'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var megamenu = {"timeout":"300","interval":"100"};
/* ]]> */
</script>
<script type='text/javascript' src='../wp-content/plugins/megamenu/js/maxmegamenu9254.js?ver=2.3.6'></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.container').persiaNumber();
});
</script>
	</body>

<!-- Boninja.com -->
</html>
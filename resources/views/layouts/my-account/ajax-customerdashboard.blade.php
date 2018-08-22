<ol class="breadcrumb"><a href="/">خانه</a> / حساب کاربری من</ol>            <div class="post-content-page">
                                        
        <!--title & discount & views-->
        <div class="title_post">
            <h1>حساب کاربری من</h1>
        </div>
                <div class="woocommerce">
<nav class="woocommerce-MyAccount-navigation">
<ul>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active">
                <a><span onclick='customerDashboard({{Auth::guard('customer')->user()->id}})'>پیشخوان</span></a>
</li>
<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
    <a><span onclick='orders({{Auth::guard('customer')->user()->id}})'>سفارش ها</span></a>
</li>
<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
    <a><span onclick='editAccount({{Auth::guard('customer')->user()->id}})'>جزئیات حساب</span></a>
    
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
</nav>

@if(Auth::guard('customer')->user())
@if(Auth::guard('customer')->user()->is_merchant == 1)
<div class="woocommerce-MyAccount-content">

<p>سلام</p>


<p style="color:#4caf50">شما فروشنده هستید و اکانت شما تائید شده است </p><div class="eye_buy"><a style="color: #fff;float: right;padding: 3px 15px;margin: 10px 0 0 0;font-size: 15px;" href="/dashboard"><i class="fa fa-dashboard"></i>رفتن به پنل فروشندگان</a></div><p></p>
</div>
@endif
@endif
</div>

                                
</div>
<ol class="breadcrumb"><a href="http://demo.onliner.ir/takhfifat">خانه</a> / <a href="http://demo.onliner.ir/takhfifat/my-account/">حساب کاربری من</a> / جزئیات حساب</ol>            <div class="post-content-page">
                                            
    <!--title & discount & views-->
    <div class="title_post">
        <h1>جزئیات حساب</h1>
    </div>
            <div class="woocommerce">
<nav class="woocommerce-MyAccount-navigation">
<ul>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
<a href="{{ route('costumerpanel.index') }}">پیشخوان</a>
</li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
<a href="{{ route('costumerpanel.orders') }}">سفارش ها</a>
</li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads">
<a href="http://demo.onliner.ir/takhfifat/my-account/downloads/">دانلودها</a>
</li>
<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
<a href="http://demo.onliner.ir/takhfifat/my-account/edit-address/">آدرس ها</a>
</li>
<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account is-active">
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


<div class="woocommerce-MyAccount-content">

<form class="woocommerce-EditAccountForm edit-account" action="" method="post">


<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
<label for="account_first_name"> نام کاربری <span class="required">*</span></label>
<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="{{ $customerinfo[0]->name }}">
</p>
<div class="clear"></div>

<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
<label for="account_email">آدرس ایمیل <span class="required">*</span></label>
<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="{{ $customerinfo[0]->email  }}">
</p>

<fieldset>
<legend>تغییر گذرواژه</legend>

<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
<label for="password_current">گذرواژه پیشین (در صورتی که قصد تغییر ندارید خالی بگذارید)</label>
<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current">
</p>
<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
<label for="password_1">گذرواژه جدید (در صورتی که قصد تغییر ندارید خالی بگذارید)</label>
<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1">
</p>
<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
<label for="password_2">تکرار رمز تازه</label>
<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2">
</p>
</fieldset>
<div class="clear"></div>


<p>
<input type="hidden" id="_wpnonce" name="_wpnonce" value="2e7836571c"><input type="hidden" name="_wp_http_referer" value="/takhfifat/my-account/edit-account/">		<button type="submit" class="woocommerce-Button button" name="save_account_details" value="ذخیره تغییرات">ذخیره تغییرات</button>
<input type="hidden" name="action" value="save_account_details">
</p>

</form>

</div>
</div>

                            
</div>
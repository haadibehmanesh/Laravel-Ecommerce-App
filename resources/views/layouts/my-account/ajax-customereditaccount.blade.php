<ol class="breadcrumb"><a href="/">خانه</a> / <a href="/my-account">حساب کاربری من</a> / جزئیات حساب</ol>            <div class="post-content-page">
                                            
    <!--title & discount & views-->
    <div class="title_post">
        <h1>جزئیات حساب</h1>
    </div>
            <div class="woocommerce">
<nav class="woocommerce-MyAccount-navigation">
<ul>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
                <a href="{{url('/my-account')}}"><span>پیشخوان</span></a>
</li>
<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
        <a href="{{url('/my-account/orders')}}"><span>سفارش ها</span></a>
    </li>
<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account is-active">
    <a><span onclick="editAccount({{Auth::guard('customer')->user()->id}})">جزئیات حساب</span></a>
    
</li>
<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout"><a href="{{ url('/customer/logout') }}"
onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
خروج
</a>

<form id="logout-form-dashboard" action="{{ url('/customer/logout') }}" method="POST" style="display: none;">
{{ csrf_field() }}
</form>
</li>
</ul>
</nav>


<div class="woocommerce-MyAccount-content">

<form id="editprofile" class="woocommerce-EditAccountForm edit-account" >
        
<div class="form-group{{ $errors->has('account_first_name') ? ' has-error' : '' }}">

<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
<label for="account_first_name"> نام </label>
<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="{{ Auth::guard('customer')->user()->bicustomer()->first()->firstname }}">
@if ($errors->has('account_first_name'))
    <span class="help-block">
        <strong>{{ $errors->first('account_first_name') }}</strong>
    </span>
@endif
</p>

</div>
<div class="clear"></div>

<div class="form-group{{ $errors->has('account_last_name') ? ' has-error' : '' }}">
<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
<label for="account_last_name"> نام خانوادگی </label>
<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" value="{{  Auth::guard('customer')->user()->bicustomer()->first()->lastname }}">
@if ($errors->has('account_last_name'))
    <span class="help-block">
        <strong>{{ $errors->first('account_last_name') }}</strong>
    </span>
@endif
</p>
</div>
<div class="clear"></div>

<div class="form-group{{ $errors->has('account_email') ? ' has-error' : '' }}">
<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
<label for="account_email">آدرس ایمیل </label>
<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="{{ $customerinfo[0]->email  }}">
@if ($errors->has('account_email'))
    <span class="help-block">
        <strong>{{ $errors->first('account_email') }}</strong>
    </span>
@endif
</p>
</div>
<fieldset>
        <div class="form-group{{ $errors->has('account_email') ? ' has-error' : '' }}">
<legend>تغییر گذرواژه</legend>

<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
<label for="password_current">گذرواژه پیشین (در صورتی که قصد تغییر ندارید خالی بگذارید)</label>
<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current">
@if ($errors->has('password_current'))
    <span class="help-block">
        <strong>{{ $errors->first('password_current') }}</strong>
    </span>
@endif
</p>
<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
<label for="password">گذرواژه جدید (در صورتی که قصد تغییر ندارید خالی بگذارید)</label>
<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password" id="password">
@if ($errors->has('password'))
    <span class="help-block">
        <strong>{{ $errors->first('password') }}</strong>
    </span>
@endif
</p>
<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
<label for="password_confirmation">تکرار رمز تازه</label>
<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_confirmation" id="password_confirmation">
@if ($errors->has('password_confirmation'))
    <span class="help-block">
        <strong>{{ $errors->first('password_confirmation') }}</strong>
    </span>
@endif
</p>

        </div>
</fieldset>
<div class="clear"></div>


<p>
<input type="hidden" id="_wpnonce" name="_wpnonce" value="2e7836571c"><input type="hidden" name="_wp_http_referer" value="/takhfifat/my-account/edit-account/">		
<input type="submit" onclick="editProfile(event, {{$customerinfo[0]->id  }})" class="" name="save_account_details" value="ذخیره تغییرات">
<input type="hidden" name="action" value="save_account_details">
</p>

</form>

</div>
</div>

                            
</div>
<script>
    
function editProfile(e,id){
    e.preventDefault();
   
    jQuery.ajax({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/my-account/editprofile/'+id,
        data: jQuery('#editprofile').serialize() + '&_token=<?php echo csrf_token() ?>',
        success:function(data){
            jQuery('#ajax-show').html(data)
        }
    });        
}
</script>
        
<ol class="breadcrumb"><a href="/">خانه</a> / <a href="/my-account">حساب کاربری من</a> / سفارش {{$order->invoice_no}}#</ol>            <div class="post-content-page">
                                            
    <!--title & discount & views-->
    <div class="title_post">
    <h1>سفارش {{$order->invoice_no}}#</h1>
    </div>
            <div class="woocommerce">
<nav class="woocommerce-MyAccount-navigation">
    <ul>
            <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
                    <a><span onclick="customerDashboard({{Auth::guard('customer')->user()->id}})">پیشخوان</span></a>
    </li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders is-active">
            <a><span onclick="orders({{Auth::guard('customer')->user()->id}})">سفارش ها</span></a>
        </li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
            <a><span onclick="editAccount({{Auth::guard('customer')->user()->id}})">جزئیات حساب</span></a>
            
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
	<p>سفارش #<mark class="order-number">{{$order->invoice_no}}</mark> در تاریخ <mark class="order-date">۶ شهریور ۱۳۹۷</mark> ثبت شده است و در حال حاضر در وضعیت <mark class="order-status">در حال انجام</mark> می باشد .</p>

<section class="woocommerce-order-details">
	
	<h2 class="woocommerce-order-details__title">مشخصات سفارش</h2>

	<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

		<thead>
			<tr>
				<th class="woocommerce-table__product-name product-name">محصول</th>
				<th class="woocommerce-table__product-table product-total">مجموع</th>
			</tr>
		</thead>

		<tbody>
            @foreach ($order_info as $item)
                
           
			<tr class="woocommerce-table__line-item order_item">

	<td class="woocommerce-table__product-name product-name">
		<a href="{{ route('shop.show', $item->product()->first()->slug) }}" title="{{ $item->product()->first()->name }}">{{$item->product()->first()->name}}</a> <strong class="product-quantity">× {{$item->quantity}} عدد</strong>	</td>

	<td class="woocommerce-table__product-total product-total">
		<span class="woocommerce-Price-amount amount">{{$item->total}}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>	</td>

</tr>

@endforeach
		</tbody>

		<tfoot>
								<tr>
						<th scope="row">جمع كل سبد خريد:</th>
						<td><span class="woocommerce-Price-amount amount">{{$order->total}}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></td>
					</tr>
			
										<tr>
						<th scope="row">قیمت نهایی:</th>
						<td><span class="woocommerce-Price-amount amount">{{$order->total}}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></td>
					</tr>
										</tfoot>
	</table>

	
<header>
    <h2>زیرسفارشات</h2>
</header>

<div class="dokan-info">
    <strong>یادداشت:</strong>
</div>

<table class="shop_table my_account_orders table table-striped">

    <thead>
        <tr>
            <th class="order-number"><span class="nobr">سفارش</span></th>
            <th class="order-status"><span class="nobr">وضعیت</span></th>
            <th class="order-total"><span class="nobr">کلی</span></th>
            <th class="order-actions">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order_info as $item)
            
        
        <tr class="order">
                <td class="order-number">
                    <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/1048/">
                        {{ $item->product()->first()->name }}                   </a>
                </td>
                <td class="order-status" style="text-align:left; white-space:nowrap;">
                    </td>
                <td class="order-total">
                    <span class="woocommerce-Price-amount amount">{{$item->total}}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span> برای {{$item->quantity}} اقلام                </td>
                <td class="order-actions">
                    <a onclick="orderitemInfo({{$item->id}})" class="button view">نمایش</a>                </td>
            </tr>
            @endforeach    
            </tbody>
</table>
</section>
{{--
<section class="woocommerce-customer-details">

	
	<h2 class="woocommerce-column__title">آدرس صورتحساب</h2>

	<address>
		امیر غلامی<br>---لللللللللللللللللللللل<br>رشت<br>تهران<br>۶۶۵۱۸۴۷۵۴۱
					<p class="woocommerce-customer-details--phone">۰۹۳۳۲۸۳۲۵۴۴</p>
		
					<p class="woocommerce-customer-details--email">info@pesbaz.ir</p>
			</address>

	
</section>
--}}
</div>
</div>

                                
</div>

<script>
function orderitemInfo(id){
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/my-account/order-item-info/'+id ,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data){
                jQuery('#ajax-show').html(data)
            }
            });
        }
</script>
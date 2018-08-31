<ol class="breadcrumb"><a href="/">خانه</a> / <a href="/my-account">حساب کاربری من</a> / سفارش ها</ol>            <div class="post-content-page">
                                            
        <!--title & discount & views-->
        <div class="title_post">
            <h1>سفارش ها</h1>
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


<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
<thead>
<tr>
                        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span class="nobr">سفارش</span></th>
                        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"><span class="nobr">تاریخ</span></th>
                        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">وضعیت</span></th>
                        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total"><span class="nobr">مجموع</span></th>
                        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions"><span class="nobr">عملیات ها</span></th>
                        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-discount-code"><span class="nobr">کد تخفیف</span></th>
                </tr>
</thead>

<tbody>

        @foreach ($customerorders as $order)
            
      
                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="َشماره فاکتور">
                                                <a href="/my-account">
                        #{{$order->invoice_no}}								</a>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="تاریخ">
                                                <time datetime="2018-07-24T15:45:37+00:00">۲ مرداد ۱۳۹۷</time>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="وضعیت">
                                                در حال انجام
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="مجموع">
                                                <span class="woocommerce-Price-amount amount">{{toPersianNum($order->total)}}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span> برای {{$order->items()->count()}} مورد
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="عملیات ها">
                                                <a onclick="orderInfo({{$order->invoice_no}})" class="woocommerce-button button view">نمایش </a>													</td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-discount-code" data-title="کد تخفیف">
                                {{ $order->order_code }}
                                        </td>
                        </tr>
                        @endforeach
                
                
        </tbody>
</table>





</div>
</div>

                                
</div>
<script>
function orderInfo(invoice_no){

        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/my-account/order-info/'+invoice_no ,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data){
                jQuery('#ajax-show').html(data)
            }
            });
        }
</script>
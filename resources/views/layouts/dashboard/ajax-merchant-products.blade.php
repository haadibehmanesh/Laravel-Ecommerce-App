
                                        
    <!--title & discount & views-->
    <div class="title_post">
        <h1>بن ها</h1>
    </div>
            <div class="dokan-dashboard-wrap">

<div class="dokan-dash-sidebar">
<ul class="dokan-dashboard-menu"><li class="dashboard"><a href="/dashboard"><i class="fa fa-tachometer"></i> پیشخوان</a></li><li class="active products"><a><i class="fa fa-briefcase"></i><span onclick="products(event)">محصولات</span> </a></li><li class="withdraw"><a href="/withdraw/"><i class="fa fa-upload"></i> برداشت</a></li><li class="settings"><a href="/settings/store/"><i class="fa fa-cog"></i> تنظیمات</a></li><li class="dokan-common-links dokan-clearfix">

<a title="ویرایش حساب کاربری" class="tips" data-placement="top" href="/my-account"><i class="fa fa-user"></i></a>
<a href="/customer/logout" onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">

<i class="fa fa-power-off"></i></a>

<form id="logout-form" action="/customer/logout" method="POST" style="display: none;">
<input type="hidden" name="_token" value="Jhrvxf9brZZlM8WS0eTc2EeHX38ojQmxeupRN5KA">
</form>
</li></ul></div>
<div class="dokan-dashboard-content"><!--title & discount & views-->

            <div class="woocommerce">
<div class="woocommerce-MyAccount-content">


<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
<thead>
<tr>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span class="nobr">نام بن</span></th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"><span class="nobr">تعداد</span></th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">قیمت واحد</span></th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">سهم فروشگاه</span></th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">سهم بن اینجا</span></th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total"><span class="nobr">مجموع</span></th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions"><span class="nobr">عملیات ها</span></th>
                
            </tr>
</thead>

<tbody>

    @foreach ($products as $product)
        
  
            <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="َنام بن">
                            <a href="{{ route('shop.show', ['product' => $product->slug])}}">
                    #{{$product->name}}								</a>

                                    </td>
                            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="تعداد">
                            {{ toPersianNum($product->orderitems->sum('code_used_count'))  }}

                                    </td>
                            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="قیمت واحد">
                                            {{toPersianNum($product->price)}}
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="سهم فروشگاه">
                                        <span class="woocommerce-Price-amount amount">{{toPersianNum($product->price-($product->price*(($product->boninja_percent+$product->discount)/100)))}}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="سهم بن اینجا">
                                        <span class="woocommerce-Price-amount amount">{{toPersianNum($product->price*($product->boninja_percent/100))}}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                </td>
                            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="مجموع">
                                            <span class="woocommerce-Price-amount amount">{{toPersianNum($product->orderitems->sum('code_used_count')*($product->price-($product->price*(($product->boninja_percent+$product->discount)/100))))}}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                    </td>
                            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="عملیات ها">
                                            <a href="{{ route('shop.show', ['product' => $product->slug])}} "class="woocommerce-button button view">نمایش </a>													</td>
                            
                    </tr>
                    @endforeach
            
            
    </tbody>
</table>





</div>
</div>

                            
</div>
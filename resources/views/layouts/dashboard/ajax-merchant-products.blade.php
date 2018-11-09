
<div class="title_post">
        <h1>بن های باطل شده</h1>
    </div>
            <div class="dokan-dashboard-wrap">

<div class="dokan-dash-sidebar">
<ul class="dokan-dashboard-menu"><li class="dashboard"><a href="/dashboard"><i class="fa fa-tachometer"></i> پیشخوان</a></li><li class="active products"><a><i class="fa fa-briefcase"></i><span onclick="products(event)">بن های باطل شده</span> </a></li><li class="withdraw"><a href="/dashboard/withdraw/"><i class="fa fa-upload"></i> برداشت</a></li><li class="settings"><a href="/settings/store/"><i class="fa fa-cog"></i> تنظیمات</a></li><li class="dokan-common-links dokan-clearfix">

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
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">درصد تخفیف</span></th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">سهم فروشگاه</span></th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">سهم بن اینجا</span></th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total"><span class="nobr">مجموع درآمد</span></th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions"><span class="nobr">عملیات ها</span></th>
                
            </tr>
</thead>

<tbody>

    @foreach ($order_items as $item)
        
  
            <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="َنام بن">
                            <a href="{{ route('shop.show', ['product' => $item->product->slug])}}">
                    {{$item->product->name}}								</a>

                                    </td>
                            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="تعداد">
                            {{ toPersianNum($item->code_used_count)  }}

                                    </td>
                            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="قیمت واحد">
                                            {{toPersianNum($item->price)}}
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="درصد تخفیف">
                                                {{ toPersianNum((1-($item->price/$item->product->price))*100) }}
                    
                                    </td>
                                    @if(!empty($merchant->pre_discount) && $merchant->pre_discount == 1)
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="سهم فروشگاه">
                                        <span class="woocommerce-Price-amount amount">{{toPersianNum($item->product->price-($item->product->price*(($item->product->boninja_percent+$item->product->discount)/100)))}}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="سهم بن اینجا">
                                        <span class="woocommerce-Price-amount amount">{{toPersianNum($item->product->price*($item->product->boninja_percent/100))}}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                </td>
                            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="مجموع">
                                            <span class="woocommerce-Price-amount amount">{{toPersianNum($item->code_used_count*($item->product->price-($item->product->price*(($item->product->boninja_percent+$item->product->discount)/100))))}}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                    </td>
                                    @else
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="سهم فروشگاه">
                                                <span class="woocommerce-Price-amount amount">{{toPersianNum($item->price-($item->price*(($item->product->boninja_percent/100))))}}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                        </td>
                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="سهم بن اینجا">
                                                <span class="woocommerce-Price-amount amount">{{toPersianNum($item->price*($item->product->boninja_percent/100))}}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                        </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="مجموع">
                                                    <span class="woocommerce-Price-amount amount">{{toPersianNum($item->code_used_count*($item->price-($item->price*(($item->product->boninja_percent)/100))))}}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>
                                            </td>
                                        @endif

                            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="عملیات ها">
                                            <a href="{{ route('shop.show', ['product' => $item->product->slug])}} "class="woocommerce-button button view">نمایش </a>													</td>
                            
                    </tr>
                    @endforeach
            
            
    </tbody>
</table>





</div>
</div>

                            
</div>
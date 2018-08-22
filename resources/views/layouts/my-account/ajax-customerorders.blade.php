<ol class="breadcrumb"><a href="/">خانه</a> / <a href="/my-account">حساب کاربری من</a> / سفارش ها</ol>            <div class="post-content-page">
                                            
        <!--title & discount & views-->
        <div class="title_post">
            <h1>سفارش ها</h1>
        </div>
                <div class="woocommerce">
<nav class="woocommerce-MyAccount-navigation">
<ul>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
                <a><span onclick='customerDashboard({{Auth::guard('customer')->user()->id}})'>پیشخوان</span></a>
</li>
<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders is-active">
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
                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="سفارش">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/1012/">
                        #۱۰۱۲								</a>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="تاریخ">
                                                <time datetime="2018-07-24T15:45:37+00:00">۲ مرداد ۱۳۹۷</time>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="وضعیت">
                                                در حال انجام
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="مجموع">
                                                <span class="woocommerce-Price-amount amount">۱۱۳,۰۰۰&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span> برای ۳ مورد
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="عملیات ها">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/1012/" class="woocommerce-button button view">نمایش </a>													</td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-discount-code" data-title="کد تخفیف">
                                                محصولات این سفارش دارای چند فروشنده است برای مشاهده کدها بر روی نمایش سفارش کلیک کنید و زیر سفارش ها را مشاهده کنید.
                                        </td>
                        </tr>
                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="سفارش">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/1008/">
                        #۱۰۰۸								</a>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="تاریخ">
                                                <time datetime="2018-07-20T19:19:16+00:00">۲۹ تیر ۱۳۹۷</time>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="وضعیت">
                                                در حال انجام
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="مجموع">
                                                <span class="woocommerce-Price-amount amount">۳۵,۰۰۰&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span> برای ۱ مورد
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="عملیات ها">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/1008/" class="woocommerce-button button view">نمایش </a>													</td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-discount-code" data-title="کد تخفیف">
                                                ۳۱۳۹
                                        </td>
                        </tr>
                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="سفارش">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/1005/">
                        #۱۰۰۵								</a>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="تاریخ">
                                                <time datetime="2018-07-19T07:32:59+00:00">۲۸ تیر ۱۳۹۷</time>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="وضعیت">
                                                در حال انجام
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="مجموع">
                                                <span class="woocommerce-Price-amount amount">۶۰,۰۰۰&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span> برای ۳ مورد
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="عملیات ها">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/1005/" class="woocommerce-button button view">نمایش </a>													</td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-discount-code" data-title="کد تخفیف">
                                                محصولات این سفارش دارای چند فروشنده است برای مشاهده کدها بر روی نمایش سفارش کلیک کنید و زیر سفارش ها را مشاهده کنید.
                                        </td>
                        </tr>
                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="سفارش">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/1003/">
                        #۱۰۰۳								</a>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="تاریخ">
                                                <time datetime="2018-06-23T17:45:54+00:00">۲ تیر ۱۳۹۷</time>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="وضعیت">
                                                در حال انجام
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="مجموع">
                                                <span class="woocommerce-Price-amount amount">۹۸,۰۰۰&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span> برای ۱ مورد
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="عملیات ها">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/1003/" class="woocommerce-button button view">نمایش </a>													</td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-discount-code" data-title="کد تخفیف">
                                                ۶۶۶۱
                                        </td>
                        </tr>
                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="سفارش">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/996/">
                        #۹۹۶								</a>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="تاریخ">
                                                <time datetime="2018-05-16T17:56:28+00:00">۲۶ اردیبهشت ۱۳۹۷</time>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="وضعیت">
                                                در حال انجام
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="مجموع">
                                                <span class="woocommerce-Price-amount amount">۱۳۴,۰۰۰&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span> برای ۳ مورد
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="عملیات ها">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/996/" class="woocommerce-button button view">نمایش </a>													</td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-discount-code" data-title="کد تخفیف">
                                                محصولات این سفارش دارای چند فروشنده است برای مشاهده کدها بر روی نمایش سفارش کلیک کنید و زیر سفارش ها را مشاهده کنید.
                                        </td>
                        </tr>
                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="سفارش">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/993/">
                        #۹۹۳								</a>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="تاریخ">
                                                <time datetime="2018-05-14T17:17:13+00:00">۲۴ اردیبهشت ۱۳۹۷</time>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="وضعیت">
                                                در حال انجام
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="مجموع">
                                                <span class="woocommerce-Price-amount amount">۱۰,۰۰۰&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span> برای ۱ مورد
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="عملیات ها">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/993/" class="woocommerce-button button view">نمایش </a>													</td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-discount-code" data-title="کد تخفیف">
                                                ۵۷۹۲
                                        </td>
                        </tr>
                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="سفارش">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/986/">
                        #۹۸۶								</a>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="تاریخ">
                                                <time datetime="2018-04-30T18:58:48+00:00">۱۰ اردیبهشت ۱۳۹۷</time>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="وضعیت">
                                                در حال انجام
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="مجموع">
                                                <span class="woocommerce-Price-amount amount">۶۳,۸۰۰&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span> برای ۳ مورد
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="عملیات ها">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/986/" class="woocommerce-button button view">نمایش </a>													</td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-discount-code" data-title="کد تخفیف">
                                                محصولات این سفارش دارای چند فروشنده است برای مشاهده کدها بر روی نمایش سفارش کلیک کنید و زیر سفارش ها را مشاهده کنید.
                                        </td>
                        </tr>
                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="سفارش">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/972/">
                        #۹۷۲								</a>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="تاریخ">
                                                <time datetime="2018-04-13T18:23:29+00:00">۲۴ فروردین ۱۳۹۷</time>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="وضعیت">
                                                در حال انجام
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="مجموع">
                                                <span class="woocommerce-Price-amount amount">۱۰,۴۰۰&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span> برای ۱ مورد
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="عملیات ها">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/972/" class="woocommerce-button button view">نمایش </a>													</td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-discount-code" data-title="کد تخفیف">
                                                ۶۴۸۲
                                        </td>
                        </tr>
                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="سفارش">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/964/">
                        #۹۶۴								</a>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="تاریخ">
                                                <time datetime="2018-04-04T09:07:01+00:00">۱۵ فروردین ۱۳۹۷</time>

                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="وضعیت">
                                                در حال انجام
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="مجموع">
                                                <span class="woocommerce-Price-amount amount">۲۰,۰۰۰&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span> برای ۱ مورد
                                        </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="عملیات ها">
                                                <a href="http://demo.onliner.ir/takhfifat/my-account/view-order/964/" class="woocommerce-button button view">نمایش </a>													</td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-discount-code" data-title="کد تخفیف">
                                                ۱۴۱۷
                                        </td>
                        </tr>
        </tbody>
</table>


<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">

                <a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="http://demo.onliner.ir/takhfifat/my-account/orders/2/">بعدی</a>
        </div>


</div>
</div>

                                
</div>
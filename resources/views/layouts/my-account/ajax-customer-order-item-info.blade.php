<ol class="breadcrumb"><a href="/">خانه</a> / <a href="/my-account">حساب کاربری من</a> / سفارش {{$order_item_info->name}}</ol>            <div class="post-content-page">
                                            
        <!--title & discount & views-->
        <div class="title_post">
        <h1>سفارش {{$order_item_info->name}}</h1>
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
                <p>سفارش <mark class="order-number">{{$order_item_info->name}}</mark> در تاریخ <mark class="order-date">{{$order_item_info->order->created_at}}</mark> ثبت شده است و در حال حاضر در وضعیت <mark class="order-status">در حال انجام</mark> می باشد .</p>                
                <div class="table-responsive">
                        <table class="table table-hover table-bordered checkout_ty">
                                <tbody><tr>
                                    <th width="200">کدسفارش</th>
                                    <td>{{$order_item_info->order->invoice_no}}</td>
                                    <th width="200">کدتخفیف</th>
                                    <td>{{$order_item_info->code}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4">{{$order_item_info->name}}</td>
                                </tr>
                                <tr>
                                    <td colspan="1" rowspan="3" align="center">
                                        <!--<img src="" alt="">-->
                                    <div id="qrcodeCanvas"></canvas></div>
                                   
                                    </td>
                                    <td><i class="fa fa-user"></i> {{Auth::guard('customer')->user()->name}}</td>
                                    <td><i class="fa fa-map-marker"></i> </td>
                                    <td><i class="fa fa-phone"></i> {{Auth::guard('customer')->user()->phone}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><i class="fa fa-map"></i> {{$order_item_info->product->location}}</td>
                                </tr>
                                <tr>
                                <td><i class="fa fa-calendar"></i> تاریخ خرید: {{$order_item_info->order->created_at}} <br> </td>
                                <td colspan="2"><i class="fa fa-calendar-minus-o"></i> تاریخ پایان: {{$order_item_info->product->date_available}}</td>
                                </tr>
                        
                            </tbody></table>
            </div>
            
            <div class="cutter">
                    <div class="lines"></div>
                    <i class="fa fa-cut fa-2x rotate180"></i>
                </div>
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
                        <tr class="woocommerce-table__line-item order_item">
            
                <td class="woocommerce-table__product-name product-name">
                    <a href="{{ route('shop.show', $order_item_info->product()->first()->slug) }}">{{ $order_item_info->product()->first()->name }} </a> <strong class="product-quantity">× {{$order_item_info->quantity}}</strong>	</td>
            
                <td class="woocommerce-table__product-total product-total">
                    <span class="woocommerce-Price-amount amount">{{$order_item_info->total}}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span>	</td>
            
            </tr>
            
                    </tbody>
            
                    <tfoot>
                                            <tr>
                                    <th scope="row">جمع كل سبد خريد:</th>
                                    <td><span class="woocommerce-Price-amount amount">{{$order_item_info->order->total}}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></td>
                                </tr>
                                                    <tr>
                                   {{--<th scope="row">روش پرداخت : </th>
                                    <td>پرداخت هنگام دریافت</td>--}}
                                </tr>
                                                   {{-- <tr>
                                    <th scope="row">قیمت نهایی:</th>
                                    <td><span class="woocommerce-Price-amount amount">۱,۰۰۰&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></td>
                                </tr>--}}
                                                    </tfoot>
                </table>
            
                </section>
            
            </div>
    </div>
    
                                    
    </div>
<script type="text/javascript" src="../wp-content/themes/takhfifat/js/jquery.qrcode.js"></script>
<script type="text/javascript" src="../wp-content/themes/takhfifat/js/qrcode.js"></script>
<script>
        jQuery('#qrcodeCanvas').qrcode({
            text	: "Discount Code: 8041 - Order ID: 1049"
        });	
</script>
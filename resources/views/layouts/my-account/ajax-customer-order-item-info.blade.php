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
                <p>سفارش <mark class="order-number">{{$order_item_info->name}}</mark> در تاریخ <mark class="order-date"><?php 
                    $ydate = date('Y', strtotime($order_item_info->order->created_at));  
                    $mdate = date('m', strtotime($order_item_info->order->created_at));  
                    $ddate = date('d', strtotime($order_item_info->order->created_at));  
                   $date = g2p($ydate,$mdate ,$ddate);
               ?>
               {{$date[0]}}/{{$date[1]}}/{{$date[2]}}</mark> ثبت شده است .</p>
                
                <div class="table-responsive">
                        <table class="table table-hover table-bordered checkout_ty">
                                <tbody>
                                <tr>
                                    <td colspan="4"><span>نام محصول: </span>{{$order_item_info->name}}</td>
                                </tr>
                                <tr>
                                        <td><span>نام خریدار: </span>{{Auth::guard('customer')->user()->name}}</td>
                                        <th width="200"><span>قیمت اصلی: </span>{{$order_item_info->product->price}} <span>تومان </span></th>
                                        <th width="200"><span>قیمت پرداختی: </span>{{$order_item_info->price}} <span>تومان </span></th>
                                        <td><span>کد تخفیف: </span><mark class="order-number">{{$order_item_info->code}}</mark></td>
                                    </tr>
                                <tr>
                                    <td colspan="1" rowspan="3" align="center">
                                        <!--<img src="" alt="">-->
                                    <div id="qrcodeCanvas"></canvas></div>
                                    
                                    </td>
                                    <td><span>تعداد بن : </span>{{$order_item_info->quantity}}</td>
                                    <td><span>نام فروشنده : </span>{{$order_item_info->merchant->company_name}} </td>
                                    <td><span>تلفن : </span>{{$order_item_info->merchant->tel}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><span>آدرس : </span> {{$order_item_info->product->location}}</td>
                                </tr>
                                <tr>
                                <td><i class="fa fa-calendar"></i> تاریخ خرید:
                                    <?php 
        $ydate = date('Y', strtotime($order_item_info->order->created_at));  
        $mdate = date('m', strtotime($order_item_info->order->created_at));  
        $ddate = date('d', strtotime($order_item_info->order->created_at));  
       $date = g2p($ydate,$mdate ,$ddate);
   ?>
   {{$date[0]}}/{{$date[1]}}/{{$date[2]}}
                                    
                                    
                                   <br> </td>
                                <td colspan="2"><i class="fa fa-calendar-minus-o"></i> تاریخ پایان: {{$order_item_info->product->date_available}}</td>
                                </tr>
                        
                            </tbody></table>
            </div>
            
            <div class="cutter">
                    <div class="lines"></div>
                    <i class="fa fa-cut fa-2x rotate180"></i>
                </div>
            <section class="woocommerce-order-details">
                    <h3 class="woocommerce-order-details__title">مشخصات سفارش</h3>
                    <div class="title_block"><span>شرایط استفاده</span></div>
                
                <div class="item_terms_use">
                        <?php
            $items = implode('<i class="fa fa-check-square-o" style="color:#49c668;"></i>  ', explode('<p style="text-align: right;">', $order_item_info->product->usage_terms));
            ?>
            {!! $items !!}
                    </div>
                   
                    <div class="title_block"><span>ویژگی ها</span></div>
                    <div class="item_terms_use">
                    <?php
                    $items = implode('<i class="fa fa-check-square-o" style="color:#49c668;"></i>  ', explode('<p style="text-align: right;">', $order_item_info->product->attributies));
                    ?>
                    {!! $items !!}
                    </div>
                
                </section>
            
            </div>
    </div>
    
                                    
    </div>
<script type="text/javascript" src="../wp-content/themes/takhfifat/js/jquery.qrcode.js"></script>
<script type="text/javascript" src="../wp-content/themes/takhfifat/js/qrcode.js"></script>
<script>
    jQuery('#qrcodeCanvas').qrcode({
        text	: "Discount Code: {{$order_item_info->code}} - Order ID: {{$order_item_info->order->invoice_no}}"
    });	
</script>
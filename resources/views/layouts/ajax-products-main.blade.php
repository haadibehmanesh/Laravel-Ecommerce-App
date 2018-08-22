@forelse ($products as $product) 
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="box_offer box_offer_mini">
                <div class="time_out">
                    <i class="fa fa-clock-o"></i>
                    <ul class="deal-timer countdownimxit"></ul>
                <script>
				                    jQuery(function() {
                        var endDate = "2018-12-25 23:59:00";
                        jQuery('.countdownimxit').countdown({
                            date: endDate,
                            render: function(data) {
                                if ( ! data.sec  ) { data.sec = 0 };
								var days = toPersianNum(data.days);
								var hours = toPersianNum(data.hours);
								var min = toPersianNum(data.min);
								var sec = toPersianNum(data.sec);
                                jQuery(this.el).html(
                                    '<li><span class="num">' + days +'</span><span class="text">  روز </span></li>'+
                                    '<li><span class="num">' + hours +'</span><span class="text"> ساعت </span></li>'+
                                    '<li><span class="num">' + min +'</span><span class="text"> دقیقه </span></li>'+
                                    '<li><span class="num">' + sec +'</span><span class="text"> ثانیه </span></li>'
                                );
                            }
                        });
                    });
                </script>					
                </div>
                <a href="{{ route('shop.show', $product->slug) }}" title="{{$product->name}}"><img src="{{ productImage($product->image) }}" title="{{$product->name}}"></a>
                <!-- Discount -->
                <span class="Discount"><b>%{{ toPersianNum($product->discount)  }}</b>تخفیف</span>
				<span class="address"><i class="fa fa-map-marker"></i></span>
                <span class="total_sales_onliner">{{toPersianNum($product->sold)}}<i class="fa fa-shopping-basket"></i></span>
				<!-- Info -->
                <div class="Information">
                    <h2 class="ellipsis"><a href="{{ route('shop.show', $product->slug) }}" title="{{ $product->name }}">{{ $product->name }}</a></h2>
                    <span class="price"><del><span class="woocommerce-Price-amount amount">{{ toPersianNum($product->price) }}&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span></span></del> <ins><span class="woocommerce-Price-amount amount">{{ toPersianNum(presentPrice($product->price,$product->discount)) }}&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span></span></ins></span>
                </div>
            </div>
        </div> 
        @empty
          <div style="text-align: left">موردی یافت نشد!</div>
        @endforelse 
        <div class="pagination_wrapper">
            {{ $products->links() }}
    
        </div>
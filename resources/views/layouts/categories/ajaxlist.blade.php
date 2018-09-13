@forelse ($productsForCategories as $product) 
<div class="col-lg-12 col-md-24 col-sm-24">
        <div class="list-items " itemscope="" >
            <a href="{{ route('shop.show', ['product' => $product->slug, 'category' => $category->slug] )}}" class="figure clearfix" title="{{ $product->name }}"><img src="{{ productImage($product->image) }}" title="{{ $product->name }}"></a>    
            <div class="list-deal-details">
                <div class="top-panel">
                    
                    <span>
                        <a href="{{ route('shop.show', ['product' => $product->slug, 'category' => $category->slug] ) }}" title="{{ $product->name }}"><h3>{{ $product->name }}</h3></a>
                    </span>
                </div>
                <div class="middle-panel clearfix" itemprop="description">
                    <a href="{{ route('shop.show', ['product' => $product->slug, 'category' => $category->slug] ) }}" class="deal-desc">{!! $product->description !!}</a>
                </div>
                <div class="bottom-panel">
                    <div class="top-bp clearfix">

                            <div class="time_out_list">
                                    <i class="fa fa-clock-o"></i>
                                    <ul class="deal-timer countdownhkfkk"></ul>
                                <script>
                                    jQuery(function() {
                                        var endDate = "2018-10-22 23:59:00";
                                        jQuery('.countdownhkfkk').countdown({
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
                    </div>
                    <div class="bottom-bp">
                        <span class="address">
                            <a href="{{ route('shop.show', ['product' => $product->slug, 'category' => $category->slug] ) }}" class="deal-desc">
                            <i class="fa fa-map-marker"></i>{{ $product->address }} </a>
                        </span>
                        <span class="deal-sell">
                            <i class="fa fa-shopping-basket"></i>
                            {{ toPersianNum(3)  }} خرید
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="price list-content list-price-single">
                    <span class="list-discount-tag"><b>%{{ toPersianNum($product->discount)  }}</b>تخفیف</span>               
                <span class="price price_slider price_slider_single">
                    <del><span class="woocommerce-Price-amount amount">{{ toPersianNum($product->price) }}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></del> <ins><span class="woocommerce-Price-amount amount">{{ toPersianNum(presentPrice($product->price,$product->discount)) }}&nbsp;<span class="woocommerce-Price-currencySymbol">تومان</span></span></ins>
                </span>
                <div>
                        <form class="cart" action="{{ route('cart.store') }}" method="post" enctype='multipart/form-data'>
                            {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $product->id }}">
                       @if($product->quantity - $product->sold > 0)
                       <button type="submit" name="add-to-cart" class="btn">افزودن به سبد</button>
                        @else
                        <div class="alert-list alert-danger">
                            <p class="text-center">
                            موجود نیست
                            </p>
                        </div>
                        @endif
                        </form>
                </div>
            </div>    
        </div>
    </div>
    @empty
    <div style="text-align: center">موردی یافت نشد!</div>
    @endforelse 
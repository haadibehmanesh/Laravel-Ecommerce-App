@forelse ($productsForCategories as $product) 
<div class="col-lg-3 col-md-3 col-sm-6">
    <div class="mini-card">
            <div class="card-header">
                    <a href="{{ route('shop.show', $product->slug) }}" class="btn btn-secondary" title="{{ $product->name }}"><span class="card-span">{{ $product->name }}</span></a>
                    <span class="card-location"><i class="fa fa-map-marker"></i>&nbsp; شیراز</span>
            </div>
            <div class="card-timer">
                    <a href="{{ route('shop.show', $product->slug) }}" class="btn btn-secondary" title="{{ $product->name }}" class="btn btn-secondary"><span class="card-span"><script>
                            jQuery(function() {
                                var endDate = "{{date('Y-m-d', strtotime($product->end_date))}}";
                                jQuery('.{{$product->slug}}').countdown({
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
                        </script><span><i class="fa fa-clock-o"></i></span><ul class="deal-timer {{$product->slug}}"></ul></span></a>
                        <span class="card-shopping"><i style="font-size: 17px;" class="fa fa-shopping-bag"></i>&nbsp;@if($product->children->sum('sold')){{toPersianNum($product->children->sum('sold'))}}@else{{toPersianNum($product->sold)}}@endif</span>
            </div>
            <a class="sb-preview-img" href="{{ route('shop.show', $product->slug) }}" class="btn btn-secondary" title="{{ $product->name }}">
            <img class="card-img-top" src="{{ productImage($product->image) }}" alt="{{ $product->name }}">
            </a>
            
            <div class="card-footer">
            <a href="{{ route('shop.show', $product->slug) }}" class="btn btn-secondary" title="{{ $product->name }}" class="btn btn-secondary"><span style="font-size: 14px;" class="card-span"><del>{{ toPersianNum($product->price) }} تومان</del></span></a>
            <span class="card-discount">%{{ toPersianNum($product->discount)  }} تخفیف</span>
            <span class="card-after-discount">{{ toPersianNum(presentPrice($product->price,$product->discount)) }} تومان</span>
            </div>
            </div>

</div>         	
        @empty
        <div style="text-align: center">موردی یافت نشد!</div>
        @endforelse 
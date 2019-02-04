@extends('app')
@section('pageTitle', 'همه بن های تخفیف')
@section('content')
<section id="wrapper">
        <div class="container">
            <div class="row">
                <ol class="breadcrumb"><a href="/">خانه</a> &#47; بن ها</ol>                <div class="block_gallery_archive">
        
            </div>                <div class="clear"></div>
                <!--related product -->
<div class="block_posts box_single">
        {{--<div class="panel-body">   
                <!-- Add custom inputs -->
                <div class="form-group">                                                     
                    <ul style="list-style-type: none; padding-left: 0">
                    @foreach ($categories as $category)
                        <li><label>{{ $category->name }}</label></li>
                    @endforeach
                    </ul>
                </div> <!-- end form-group -->
                <!-- End custom inputs -->
        </div>--}}
    <div class="" style="overflow: hidden;
    position: relative;
    text-align: center;
    margin: 20px 0;">
        <span style="    padding: 0px 37px;
        color: #005cab;
        /* font-weight: 700; */
        background: url(images/bg-title2.png) no-repeat center #fff;
        font-size: 14pt;">
            همه بن ها                     
        </span>
    </div>   
    <div class='ajax_products'>
    @forelse ($products as $product)     	
    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="mini-card">
                <div class="card-header">
                        <a href="{{ route('shop.show', $product->id) }}" class="btn btn-secondary" title="{{ $product->name }}" style="
                            width: 25%;
                        "><span class="card-span">{{ $product->name }}</span></a>
                        <span class="card-location"><i class="fa fa-map-marker"></i>&nbsp; {{$product->location}}</span>
                </div>
                <div class="card-timer">
                        <a href="{{ route('shop.show', $product->id) }}" class="btn btn-secondary" title="{{ $product->name }}" class="btn btn-secondary"><span class="card-span"><script>
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
                <a class="sb-preview-img" href="{{ route('shop.show', $product->id) }}" class="btn btn-secondary" title="{{ $product->name }}">
                <img class="card-img-top" src="{{ productImage($product->image) }}" alt="{{ $product->name }}">
                </a>
                
                <div class="card-footer">
                <a href="{{ route('shop.show', $product->id) }}" class="btn btn-secondary" title="{{ $product->name }}" class="btn btn-secondary"><span style="font-size: 14px;" class="card-span"><del>{{ toPersianNum($product->price) }} تومان</del></span></a>
                <span class="card-discount">%{{ toPersianNum($product->discount)  }} تخفیف</span>
                <span class="card-after-discount">{{ toPersianNum(presentPrice($product->price,$product->discount)) }} تومان</span>
                </div>
                </div>
   
</div>        	
        @empty
          <div style="text-align: left">موردی یافت نشد!</div>
        @endforelse    
        	       	
            <div class="clear"></div>
			<div class="pagination_wrapper">
                        {{ $products->links() }}
                
            </div>
        </div>
                </div>                
                <div class="clear"></div>
                
<!--text_short_category-->
<!--
<div class="text_short_category">
    <div class="text">
                    </div>
    <div class="label">
        <a href="#"><span style="background:url() no-repeat;opacity: 0.2;margin:0 20px 0 0;"></span></a>
    </div>
</div>-->
</div>
</div>

    </section>
                    
@endsection
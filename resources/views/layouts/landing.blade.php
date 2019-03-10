@extends('app')
@section('pageTitle', 'Boninja')
@section('content')
            
                        <section id="wrapper">
                                <div class="container">
                                    <div class="row">
                                            
                            <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
                            <div id="wowslider-container1">
                                <div class="ws_images">
                                    <ul>
                                        @foreach ( $sliderimages as  $sliderimage )
                                            <li><a href="{{$sliderimage->url}}"><img src="{{ productImage($sliderimage->image) }}" alt="سایت تخفیف گروهی بن اینجا"  /></a></li>
                                        @endforeach
                                    </ul></div>
                            <div class="ws_script" style="position:absolute;left:-99%"></div>
                                <div class="ws_shadow"></div>
                                </div>	
                                {{--<script type="text/javascript" src="engine1/wowslider.js"></script>
                                <script type="text/javascript" src="engine1/script.js"></script>--}}
                                <script type="text/javascript" src="engine1/compressed.js"></script>
                               
                                <!-- End WOWSlider.com BODY section --><div class="row">
                            <div class="clear"></div>
                            <!--special offer -->
                        <div class="special_offer">
                            <div class="title_block"><span><h2 style="
                                font-size: 20px;
                                line-height: 0.1;
                            ">تخفیفهای ویژه</h2></span></div>
                            @foreach ($featured as $featured)
                                <div class="col-lg-4 col-md-4 col-sm-6">
                               
                        <div itemscope itemtype="https://schema.org/Product" class="card">
                                <div class="card-header">
                                        <a itemprop="offers" itemscope itemtype="https://schema.org/Offer" href="{{ route('shop.show', $featured->id) }}" class="" title="{{ $featured->name }}"><span itemprop="name" class="card-span">{{ $featured->name }}</span></a>
                                <span class="card-location"><i class="fa fa-map-marker"></i>&nbsp; {{$featured->location}}</span>
                                </div>
                                <div class="card-timer">
                                        <a href="{{ route('shop.show', $featured->id) }}"  title="{{ $featured->name }}" ><span class="card-span"><script>
                                                jQuery(function() {
                                                    var endDate = "{{$featured->end_date}}";
                                                    jQuery('.{{$featured->slug}}').countdown({
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
                                            </script><span><i class="fa fa-clock-o"></i></span><ul class="deal-timer {{$featured->slug}}"></ul></span></a>
                                            <span class="card-shopping"><i style="
                                                font-size: 15px;
                                            " class="fa fa-shopping-bag"></i>&nbsp;@if($featured->children->sum('sold')){{toPersianNum($featured->children->sum('sold'))}}@else{{toPersianNum($featured->sold)}}@endif</span>
                                </div>
                                <a class="sb-preview-img" href="{{ route('shop.show', $featured->id) }}" class="btn btn-secondary" title="{{ $featured->name }}">
                                <img itemprop="image" class="card-img-top" src="{{ productImage($featured->image) }}" title=" تخفیف {{ $featured->name }}" alt=" تخفیف {{ $featured->name }}">
                                </a>
                                
                                <div itemprop="offers" itemscope itemtype="https://schema.org/AggregateOffer" class="card-footer"><span itemprop="highPrice" style="font-size: 16px;" class="card-span"><del>{{ toPersianNum($featured->price) }} تومان</del></span>
                                <span class="card-discount">%{{ toPersianNum($featured->discount)  }} تخفیف</span>
                                <span itemprop="lowPrice" class="card-after-discount">{{ toPersianNum(presentPrice($featured->price,$featured->discount)) }} تومان</span>
                                </div>
                                </div>
                                </div>
                                @endforeach
                        </div>
                            <div class="clear"></div>		
                            <!--category-->
                            
                                <div class="block_category">
                                    <div class="title_block"><span><h2 style="
                                        font-size: 20px;
                                        line-height: 0.1;
                                    ">دسته بندی ها</h2></span></div>
                                    
                                    <div class="cat">
                                            <div class="col-xs-12 col-md-offset-2">
                                                    <div class="col-xs-2">
                                                            <a href="{{ route('shop.showCategory', 'رستوران-و-کافی-شاپ') }}">
                                                            <div style="background: #ee1b24;"  onmouseover='this.style.background="red"' onmouseout='this.style.background="#ee1b24"' class="item_header"><img src="{{asset('wp-content/themes/takhfifat/images/restaurant-interface-symbol-of-fork-and-knife-couple.png')}}"
                                                                alt="تخفیف رستوران و کافی شاپ"></div>
                                                            <div style="background: #ee1b24;" class="item_footer">
                                                                <span>
                                                                    رستوران و کافی شاپ
                                                                </span> 
                                                            </div>
                                                            </a>
                                                    </div>
                                                        
                                                        <div class="col-xs-2">
                                                                <a href="{{ route('shop.showCategory', 'تفریح-و-ورزش') }}">
                                                                <div style="background: #50b74a;" onmouseover='this.style.background="#06cc06d9"' onmouseout='this.style.background="#50b74a"' class="item_header">
                                                                        <img src="{{asset('wp-content/themes/takhfifat/images/running.png')}}" alt="تخفیف تفریحی ورزشی">
                                                                </div>
                                                                <div style="background: #50b74a;" class="item_footer">
                                                                    <span>
                                                                        تفریحی ورزشی
                                                                    </span>
                                                                </div>
                                                                </a>
                                                        </div>
                                                        <div class="col-xs-2">
                                                                <a href="{{ route('shop.showCategory', 'پزشکی-و-سلامت') }}">
                                                                <div style="background: #01acf1;" onmouseover='this.style.background="#016cf1d9"' onmouseout='this.style.background="#01acf1"' class="item_header">
                                                                        <img src="{{asset('wp-content/themes/takhfifat/images/heartbeat.png')}}" alt="تخفیف پزشکی و سلامت">
                                                                </div>
                                                                <div style="background: #01acf1;" class="item_footer">
                                                                    <span>
                                                                        پزشکی و سلامت
                                                                    </span>    
                                                                </div>
                                                            </a>
                                                        </div>
                                                        
                                                        <div class="col-xs-2">
                                                            <a href="{{ route('shop.showCategory', 'آرایشی-و-زیبایی') }}">
                                                            <div style="background: #ee008c;"  onmouseover='this.style.background="#ff0081"' onmouseout='this.style.background="#ee008c"' class="item_header">
                                                            <img src="{{asset('wp-content/themes/takhfifat/images/openned-scissors.png')}}" alt="تخفیف زیبایی و آرایشی">
                                                            </div>
                                                            <div style="background: #ee008c;" class="item_footer">
                                                                <span>
                                                                    زیبایی و آرایشی
                                                                </span>
                                                            </div>
                                                            </a>
                                                        </div>
                                                        
                                                    
                        
                                                    </div>
                        
                                                    <div class="col-xs-12 col-md-offset-2">
                                                            
                                                        
                                                        
                                                            <div class="col-xs-2">
                                                                <a href="{{ route('shop.showCategory', 'هنر-و-تئاتر') }}">
                                                                <div style="background: #702c93;" onmouseover='this.style.background="#c13fc3"' onmouseout='this.style.background="#702c93"' class="item_header"><img src="{{asset('wp-content/themes/takhfifat/images/theatre-masks.png')}}" alt="تخفیف هنر و تئاتر"></div>
                                                                <div style="background: #702c93;" class="item_footer">
                                                                    <span>
                                                                        هنر و تئاتر
                                                                    </span> 
                                                                </div>
                                                                </a>
                                                        </div>
                                                        <div class="col-xs-2">
                                                            <a href="{{ route('shop.showCategory', 'آموزشی') }}">
                                                            <div style="background: #0288d1;" onmouseover='this.style.background="#0066ff"' onmouseout='this.style.background="#0288d1"' class="item_header">
                                                                    <img src="{{asset('wp-content/themes/takhfifat/images/open-book.png')}}" alt="تخفیف آموزشی">
                                                            </div>
                                                            <div style="background: #0288d1;" class="item_footer">
                                                                <span>
                                                                    آموزشی
                                                                </span>
                                                            </div>
                                                            </a>
                                                    </div>
                                                        <div class="col-xs-2">
                                                                <a href="{{ route('shop.showCategory', 'خدمات') }}">
                                                            <div style="background: #cc692e;"
                                                            onmouseover='this.style.background="#f36815"' onmouseout='this.style.background="#cc692e"' class="item_header"><img src="{{asset('wp-content/themes/takhfifat/images/tools.png')}}" alt="تخفیف خدمات"></div>
                                                            <div style="background: #cc692e;" class="item_footer">
                                                                <span>
                                                                    خدمات
                                                                </span> 
                                                            </div>
                                                                </a>
                                                        </div>
                                                        <div class="col-xs-2">
                                                                <a href="{{ route('shop.showCategory', 'بن-های-فروشگاهی') }}">
                                                                <div style="background: #ffb715;" onmouseover='this.style.background="#ffd715"' onmouseout='this.style.background="#ffb715"' class="item_header">
                                                                    <img src="{{asset('wp-content/themes/takhfifat/images/shopping-purse-icon.png')}}" alt="تخفیف بن های فروشگاهی"></div>
                                                                <div style="background: #ffb715;" class="item_footer">
                                                                    <span>
                                                                        بن های فروشگاهی
                                                                    </span> 
                                                                </div>
                                                                </a>
                                                        </div>
                                                        
                                                        
                                                    
                                            </div>
                                    </div>
                                    
                                </div>
                                
                                
                            
                        <div class="clear"></div><!--Discount other -->
                        <div class="discount_other">
                            <div class="title_block"><span><h2 style="
                                font-size: 20px;
                                line-height: 0.1;
                            ">دیـگر تخفیف ها</h2></span></div>
                            <div class='ajax_products'>
                            @forelse ($products as $product) 
                            @if(empty($product->parent_id) || $product->parent_id ==0)
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div itemscope itemtype="https://schema.org/Product" class="mini-card">
                                                <div class="card-header">
                                                        <a itemprop="offers" itemscope itemtype="https://schema.org/Offer" href="{{ route('shop.show', $product->id) }}" class="btn btn-secondary" title="{{ $product->name }}" style="
                                                            width: 30%;
                                                        "><span itemprop="name" class="card-span">{{ $product->name }}</span></a>
                                                        <span class="card-location"><i class="fa fa-map-marker"></i>&nbsp;{{$product->location}}</span>
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
                                                            <span class="card-shopping"><i style="font-size: 14px;" class="fa fa-shopping-bag"></i>&nbsp;@if($product->children->sum('sold')){{toPersianNum($product->children->sum('sold'))}}@else{{toPersianNum($product->sold)}}@endif</span>
                                                </div>
                                                <a class="sb-preview-img" href="{{ route('shop.show', $product->id) }}" class="btn btn-secondary" title="{{ $product->name }}">
                                                <img itemprop="image" class="card-img-top" src="{{ productImage($product->image) }}" title=" تخفیف {{ $product->name }}" alt=" تخفیف {{ $product->name }}">
                                                </a>
                                                
                                                <div itemprop="offers" itemscope itemtype="https://schema.org/AggregateOffer" class="card-footer">
                                                <a href="{{ route('shop.show', $product->id) }}" class="btn btn-secondary" title="{{ $product->name }}" class="btn btn-secondary"><span itemprop="highPrice" style="font-size: 14px;" class="card-span"><del>{{ toPersianNum($product->price) }} تومان</del></span></a>
                                                <span class="card-discount">%{{ toPersianNum($product->discount)  }} تخفیف</span>
                                                <span itemprop="lowPrice" class="card-after-discount">{{ toPersianNum(presentPrice($product->price,$product->discount)) }} تومان</span>
                                                </div>
                                                </div>
                                   
                                </div> 
                                @endif
                                @empty
                                  <div style="text-align: left">موردی یافت نشد!</div>
                                @endforelse 
                                <div class="pagination_wrapper_main" style="
                                display: inline-block;
                                text-align: center;
                                width: 100%;
                                margin: 0 auto;
                                padding-right: 0;
                                padding-left: 0;
                            ">
                                    {{ $products->links() }}
                            
                                </div>  
                            </div>     		
                                            
                        </div><div class="clear"></div>
                        @foreach($allcategories as $category)
                            @if(!$category->parent && $category->products->where('index_gallery',1)->count() == 3)
                        <div class="cat_show">
                                <span class="cat_icon_inside"><i class="fa 
                               
                                    @if($category->children->count() > 0) 
                                    {{$category->icon}} 
                                    @elseif(empty($category->parent_id))
                                    {{$category->icon}} 
                                    @else
                                    {{$category->parent->icon}} 
                                    @endif"></i></span>
                            <span class="cat_show_catname">
                                <a href="{{ route('shop.showCategory', $category->slug) }}" class="article-h3">{{$category->name}}</a>
                            </span>
                            @php ($itr = 1)
                            @foreach ($category->products->where('index_gallery',1) as $product)
                            @if($itr < 4 )
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="mini-card">
                                            <div class="card-header">
                                                    <a href="{{ route('shop.show', $product->id) }}" class="btn btn-secondary" title="{{ $product->name }}"><span class="card-span">{{ $product->name }}</span></a>
                                                    <span class="card-location"><i class="fa fa-map-marker"></i>&nbsp;{{$product->location}}</span>
                                            </div>
                                            <div class="card-timer">
                                                    <a href="{{ route('shop.show', $product->id) }}" class="btn btn-secondary" title="{{ $product->name }}" class="btn btn-secondary"><span class="card-span"><script>
                                                            jQuery(function() {
                                                                var endDate = "{{$product->end_date}}";
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
                                            <img class="card-img-top" src="{{ productImage($product->image) }}" title=" تخفیف {{ $product->name }}" alt=" تخفیف {{ $product->name }}">
                                            </a>
                                            
                                            <div class="card-footer">
                                            <a href="{{ route('shop.show', $product->id) }}" class="btn btn-secondary" title="{{ $product->name }}" class="btn btn-secondary"><span style="font-size: 14px;" class="card-span"><del>{{ toPersianNum($product->price) }} تومان</del></span></a>
                                            <span class="card-discount">%{{ toPersianNum($product->discount)  }} تخفیف</span>
                                            <span class="card-after-discount">{{ toPersianNum(presentPrice($product->price,$product->discount)) }} تومان</span>
                                            </div>
                                            </div>
                            </div>
                            @php ($itr++) 
                            
                            
                            @endif  
                            
                            @endforeach
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="mini-card">
                                                    <div class="more_cat">
                                                            <div class="cat_icon" style="
                                                            color: #f6861f;
                                                        ">
                                                                    <i class="fa {{$category->icon}}">
                                                                    </i>
                                                            </div>
                                                            <div class="cat_name">
                                                                <span>
                                                                        {{$category->products->where('parent_id',0)->count()}} پیشنهاد {{$category->name}}
                                                                </span>
                                                            </div>
                                                                <div class="button-all">
                                                                    <a href="{{ route('shop.showCategory', $category->slug) }}">
                                                                        <button class="nb-btn nb-btn-success">مشاهده همه</button>
                                                                    </a>
                                                                </div>
                                                    </div> 
                                            
                                    </div>
                            </div> 
                        </div>
                            @endif
                        @endforeach
                                    </div>
                                </div>
                                <div style="
                                text-align: justify;
                            "><h3 style="
    font-size: 18px;
">درباره بن اینجا</h3>
                                <p>اگر به دنبال صرفه جویی و مدیریت بهتر هزینه هایتان هستید می توانید روی سامانه بن اینجا حساب کنید و از هر جایی که دوست دارید با تخفیف های فوق العاده   حتی تا 90 % هم خرید کنید و لذت ببرید. بن اینجا با ارائه بهترین تخفیف ها از بهترین کسب وکار ها سعی دارد تا رضایت شما کاربران گرامی را به دست آورد.  </p>
                                </div>
                            </section>
                        
               
@endsection

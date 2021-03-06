
@if(!$category->parent_id or empty($featured_product->gallery))
                <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
                    <div id="wowslider-container1">
                        <div class="ws_images">
                            <ul>
                                @foreach ( $sliderimages as  $sliderimage )
                                    <li><a href="{{$sliderimage->url}}"><img src="{{ productImage($sliderimage->image) }}"  /></a></li>
                                @endforeach
                            </ul></div>
                    <div class="ws_script" style="position:absolute;left:-99%"></div>
                        <div class="ws_shadow"></div>
                        </div>	
                        <script type="text/javascript" src="../../engine1/wowslider.js"></script>
                        <script type="text/javascript" src="../../engine1/script.js"></script>
                        <!-- End WOWSlider.com BODY section -->
                        @else
                        
                        <div class="block_gallery_archive" style="
                        border-radius: 0;
                        border: none;
                    ">

                            <!-- images -->
    
                            <div class="gallery_item">
    
    
    
                                <!--option-->
    
                                <div class="option_item_gallery">
    
                                
                                    <span class="address"><i class="fa fa-map-marker"></i> {{$featured_product->location}} </span>
    
                                
                                        <span class="number-sale"><i class="fa fa-shopping-basket"></i>۰</span>
    
                                </div>
                                <div class="time_out">
                                    <i class="fa fa-clock-o"></i>
                                    <ul class="deal-timer {{$featured_product->slug}}"><li><span class="num">۷۱</span><span class="text">  روز </span></li><li><span class="num">۷</span><span class="text"> ساعت </span></li><li><span class="num">۵۸</span><span class="text"> دقیقه </span></li><li><span class="num">۳۶</span><span class="text"> ثانیه </span></li></ul>
                                <script>
                                                    jQuery(function() {
                                        var endDate = "{{date('Y-m-d', strtotime($featured_product->end_date))}}";
                                        jQuery('.{{$featured_product->slug}}').countdown({
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
    
    
    
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
    
    
                                    <!-- Wrapper for slides -->
    
                                    <div class="carousel-inner" role="listbox" style="
                                    border-radius: 20px 0px 20px 0px;
                                ">
    
    
    
                                        <div class="item active">
    
                                            <div class="img_item">
    
                                                <a href="{{ route('shop.show', $featured_product->id) }}" title="{{ $featured_product->name }}"><img src="{{ productImage($featured_product->image) }}" title="{{ $featured_product->name }}" alt="{{ $featured_product->name }}"></a>
    
                                            </div>
    
                                        </div>
                                        <?php $i=0; ?>
                                        @if(!empty($featured_product->gallery))
                                            @foreach (json_decode($featured_product->gallery, true) as $image)
                                                <?php $i++; ?>
                                                <div class="item">

                                                    <div class="img_item">
            
                                                    <a href="{{ route('shop.show', $featured_product->id) }}" title="{{ $featured_product->name }}"><img src="{{ productImage($image) }}" title="{{ $featured_product->name }}" alt="{{ $featured_product->name }}"></a>
            
                                                    </div>
            
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
    
                                    <!-- Indicators -->
    
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        @for ($indicator = 1 ; $indicator <= $i ; $indicator++)
                                            <li data-target="#myCarousel" data-slide-to="{{ $indicator }}"></li>
                                        @endfor
    
                                        
                                    </ol>
    
                                </div>
    
                            </div>


    
    
                            <!--details-->
    
                            <div class="content_item">
                                <span><a href="{{ route('shop.show', $featured_product->id) }}" title="{{ $featured_product->name }}"><i class="fa fa-home"></i>{{ $featured_product->name }}</a></span>
                                <span class="Discount"><b>%{{ toPersianNum($featured_product->discount)  }}</b>تخفیف</span>
                            <h2><a href="{{ route('shop.show', $featured_product->id) }}" title="{{ $featured_product->name }}">{{ toPersianNum($featured_product->description)}}</a></h2>
                            <table class="table_slider">
                                    <tbody>
                                        <tr>
                                            <td style="
                                            background-color: #f6861f;    padding: 8px;
                                        "><div class="timer_farsi_single" style="float: right;color: white;">
                                        <span     style="padding-left: 10px;
                                        font-size: 22px;">
                                                <i class="fa fa-clock-o"></i></span>
                                                <ul class="deal-timer {{$featured_product->slug}}"><li><span class="num">۷۱</span><span class="text">  روز </span></li><li><span class="num">۷</span><span class="text"> ساعت </span></li><li><span class="num">۵۸</span><span class="text"> دقیقه </span></li><li><span class="num">۳۶</span><span class="text"> ثانیه </span></li></ul>
                                            <script>
                                                                jQuery(function() {
                                                    var endDate = "{{date('Y-m-d', strtotime($featured_product->end_date))}}";
                                                    jQuery('.{{$featured_product->slug}}').countdown({
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
                                            </script>		</span>
                                            </div>
                                        </td>
                                        

                                        </tr>
                                        <tr>
                                        <td style="color: white;
                                        background-color: #19499c;    padding: 10px;
                                    " colspan="2"><span style="
                                            float: right;
                                            padding-right: 40px;
                                            color: #fb9b93;
                                            font-size: 18px;
                                        " class=""><del>
                                            <span class="">{{toPersianNum($featured_product->price)}}&nbsp;
                                                <span class="">تومان</span>
                                            </del>
                                            </span>
                                        
                                            <span style="
                                            float: left;
                                            color: #bff3bf;
                                            font-size: 18px;
                                            padding-left: 40px;
                                        ">{{toPersianNum(presentPrice($featured_product->price,$featured_product->discount))}}&nbsp;
                                                <span>تومان</span>
                                            </span>
                                        </span></td>
                                    </tr>
                                    <tr>
                                        <td style="
                                        color: white;
                                        background-color: #ec4436;    padding: 10px;
                                    "><span>تعداد خریداری شده  @if($featured_product->children->sum('sold')){{toPersianNum($featured_product->children->sum('sold'))}}@else{{toPersianNum($featured_product->sold)}}@endif</span></td>
                                        
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="eye_buy"><a href="{{ route('shop.show', ['product' => $featured_product->id, 'category' => $category->slug] ) }}"><i class="fa fa-shopping-cart"></i>مشاهده و خرید</a></div>
                            </div>
    
    
    
                        </div>
                        @endif
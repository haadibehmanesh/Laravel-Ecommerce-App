       @if(empty($errors->has('code_offer')) && empty($errors->has('notmatch')))
       <div class="panel-body">
            <div class="col-sm-9">
                <div class="col-sm-12 " style="margin-bottom:7px;border-bottom: dashed 1px #c0c0c0;">
                    <div class=" hidden-md hidden-lg col-xs-12 col-sm-12 pull-left img-pos">
                        <a href="{{ route('shop.show', $item->product->slug) }}" title="{{ $item->product->name }}">
                            <img src="{{ productImage($item->product->image) }}" title="{{ $item->product->name }}" width="100%" class="img-responsive" alt="">
                        </a>
                    </div>
                    <div class="col-md-8 col-xs-12" style="padding-left: 0px">
                                                    <label>
                                <h4><a href="{{ route('shop.show', $item->product->slug) }}" title="{{ $item->product->name }}" class="black-color none-decoration">
                                    {{$item->product->name}}
                                    </a>
                                </h4>
                            </label>
                            
                                                </div>
                    <div class="col-md-4 col-xs-12 pull-left rate-pos" style="margin-bottom: 18px;padding-right: 0px">                  
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-xs-12 mb-20 mt-20">
                        <span class="coupon-box">
                            <span class="text-bold">کد تخفیف:</span>
                                <span class="coupon-code">{{$item->code}}</span>
                        </span>
                        &nbsp;
                    </div>
                </div>
                <div class="col-md-12">
                    &nbsp;
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
                <div class="col-md-12">
                    <p class="col-sm-6"><strong>تاریخ خرید:</strong>
                        <span><?php 
                            $ydate = date('Y', strtotime($item->updated_at));  
                            $mdate = date('m', strtotime($item->updated_at));  
                            $ddate = date('d', strtotime($item->updated_at));  
                           $date = g2p($ydate,$mdate ,$ddate);
                       ?>
                       {{$date[0]}}/{{$date[1]}}/{{$date[2]}} </span>
                    </p>
                    <p class="col-sm-6"><strong>تاریخ انقضا:</strong>
                            <span><?php 
                                $ydate = date('Y', strtotime($item->product->date_available));  
                                $mdate = date('m', strtotime($item->product->date_available));  
                                $ddate = date('d', strtotime($item->product->date_available));  
                               $date = g2p($ydate,$mdate ,$ddate);
                           ?>
                           {{$date[0]}}/{{$date[1]}}/{{$date[2]}} </span>
                        </p>
                                    </div>
                <div class="col-md-12">
                    <p class="col-sm-6">
                        <strong>تعداد کل : {{$item->quantity}} </strong>
                    </p>
                    <p class="col-sm-6">
                        <strong>مبلغ پرداخت شده :  {{$item->total}}  تومان </strong>
                        <form class="code" method="POST" action="" enctype='multipart/form-data'>
                            {{ csrf_field() }}
                       <input type="hidden" name="code_offer" class="code_offer" value="{{ $item->code }}">
                       <label>تعداد مصرف فعلی:<br><input style="width:100%;box-sizing:border-box" type="number" name="code_used_count" class="code_used_count" /></label><br />
                        <p class="col-sm-6">
                        <strong>وضعیت : <span style="color:green"><?php echo $status = $item->quantity - $item->code_used_count;
                        ?> بن قابل ابطال می باشد.</strong></span>
                        </p>
                        @if($item->quantity - $item->code_used_count > 0)
                        <button onclick="codeValidation(event)" type="" value="" class="verify_code_offer">ابطال بن</button>
                        @else
                            <p class="alert alert-danger">
                                <span style="text-align:center">
                    بن قبلا باطل شده است!
                                </span>
                            </p>
                        @endif
                    </form>
                    </p>
                </div>
                            </div>
            <div class=" hidden-xs hidden-sm col-md-3 pull-left img-pos">
                    <a href="{{ route('shop.show', $item->product->slug) }}" title="{{ $item->product->name }}">
                            <img src="{{ productImage($item->product->image) }}" title="{{ $item->product->name }}" width="100%" class="img-responsive" alt="">
                        </a>
            </div>

        </div>
        @elseif(!empty($errors->has('code_offer')))
        <p class="alert alert-danger">
            <span style="text-align:center">
                    {{ $errors->first('code_offer') }}
            </span>
        </p>
        
        @else
        <p class="alert alert-danger">
            <span style="text-align:center">
                    {{ $errors->first('notmatch') }}
            </span>
        </p>
        
                    @endif
        
                    <script>
                        function codeValidation(e){
                            e.preventDefault();
                            jQuery.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                                },
                                type:'POST',
                                url:'/ajax/codeValidation',
                                data: jQuery('.code').serialize()        
                            }).success(function(data){
                                jQuery('.result_ajax').html(data);
                            });
                                    
            
            
                        }
                        </script>
                    
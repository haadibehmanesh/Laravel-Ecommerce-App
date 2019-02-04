@extends('app')
@section('pageTitle', 'همکاری با بن اینجا')
@section('content')
<section id="wrapper">
        <div class="container">
            <div class="row">
                <ol class="breadcrumb"><a href="/">خانه</a>/ همکاری با بن اینجا</ol>
            </div>
            
            <div class="title_post">
                <h2>همکاری با بن اینجا</h2>
                
                
            </div>
            <div class="woocommerce">


                    <div class="panel panel-default">
                            <div class="panel-heading"> فرم درخواست همکاری</div>

                        

                            <div class="panel-body" style="
                            margin: 0;
                        ">

                                    @if($errors->has('message'))
                                    <div class="alert alert-success">
                                        <strong>{{$errors->first('message')}}</strong>
                                    </div>
                                    @endif
            


                                <form method="POST" action="{{ url('/cooperation') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="col-md-6{{ $errors->has('name') ? ' has-error' : '' }}">
            
                                            <label for="name">نام و نام خانوادگی:</label>
                                            @if ($errors->has('name'))
                                            <div class="dokan-alert dokan-alert-success">
                                
                                                <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                            
                                            </div>
                                        @endif
                                            <input class="form-control"  name="name" type="text">
                                            
                                        </div>
                                        
                                        <div class="col-md-6{{ $errors->has('mobile') ? ' has-error' : '' }}">
            
                                            <label> موبایل :</label>
                                            @if ($errors->has('mobile'))
                                            <div class="dokan-alert dokan-alert-success">
                                
                                                <strong style="color: red;">{{ $errors->first('mobile') }}</strong>
                                            
                                            </div>
                                        @endif
                                            <input class="form-control" name="mobile" type="text">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6{{ $errors->has('company_name') ? ' has-error' : '' }}">
            
                                            <label>نام فروشگاه:</label>
                                            @if ($errors->has('company_name'))
                                            <div class="dokan-alert dokan-alert-success">
                                
                                                <strong style="color: red;">{{ $errors->first('company_name') }}</strong>
                                            
                                            </div>
                                        @endif
                                            <input class="form-control" name="company_name" type="text">
                                            
                                        </div>
                                        <div class="col-md-6{{ $errors->has('company_role') ? ' has-error' : '' }}">
                                            <label>سمت :</label>
                                            @if ($errors->has('company_role'))
                                            <div class="dokan-alert dokan-alert-success">
                                
                                                <strong style="color: red;">{{ $errors->first('company_role') }}</strong>
                                            
                                            </div>
                                        @endif
                                            <input class="form-control" name="company_role" type="text">
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6{{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <label>تلفن:</label>
                                            @if ($errors->has('phone'))
                                            <div class="dokan-alert dokan-alert-success">
                                
                                                <strong style="color: red;">{{ $errors->first('phone') }}</strong>
                                            
                                            </div>
                                        @endif
                                            <input class="form-control" name="phone" type="text">
                                            
                                        </div>
                                        <div class="col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label>ایمیل :</label>
                                            @if ($errors->has('email'))
                                            <div class="dokan-alert dokan-alert-success">
                                
                                                <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                            
                                            </div>
                                        @endif
                                            <input class="form-control" placeholder="(اختیاری)" name="email" type="text">
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12{{ $errors->has('address') ? ' has-error' : '' }}">
            
                                        <label>آدرس:</label>
                                        @if ($errors->has('address'))
                                            <div class="dokan-alert dokan-alert-success">
                                
                                                <strong style="color: red;">{{ $errors->first('address') }}</strong>
                                            
                                            </div>
                                        @endif
                                        <input class="form-control" name="address" type="text">
                                        
                                    </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="col-md-6{{ $errors->has('discount') ? ' has-error' : '' }}">
                
                                            <label>درصد تخفیف پیشنهادی :</label>
                                            @if ($errors->has('discount'))
                                            <div class="dokan-alert dokan-alert-success">
                                
                                                <strong style="color: red;">{{ $errors->first('discount') }}</strong>
                                            
                                            </div>
                                        @endif
                                            <input class="form-control" name="discount" type="text">
                                            
                                        </div>
                                            
                                         </div>
                                         <div class="form-group">
                                                <div class="col-md-6{{ $errors->has('category') ? ' has-error' : '' }}">
                    
                                                <label>دسته محصول و یا خدمات :</label>
                                                <select class="form-control" name="category">
                                                    <option value="1">رستوران و کافی شاپ</option>
                                                    <option value="2">تفریحی و ورزشی</option>
                                                    <option value="3">پزشکی و سلامت</option>
                                                    <option value="4">فرهنگی و آموزشی</option>
                                                    <option value="5">زیبایی و آرایشی</option>
                                                    <option value="6">کــا لا</option>
                                                    <option value="7">پیشنهادات بیشتر</option>
                                                </select>
                                            </div>
                                    <div class="form-group">
                                            <div class="col-md-6{{ $errors->has('text') ? ' has-error' : '' }}">
                                                    <label>عنوان محصول و یا خدمات :</label>
                                                     @if ($errors->has('text'))
                                                    <div class="dokan-alert dokan-alert-success">
                                        
                                                        <strong style="color: red;">{{ $errors->first('text') }}</strong>
                                                    
                                                    </div>
                                                @endif
                                                    <textarea class="form-control" style="height:100px" name="text" cols="50" rows="10"></textarea>
                                                   
                                                </div>
                                            <div class="col-md-6{{ $errors->has('description') ? ' has-error' : '' }}">
                
                                            <label>توضیحات :</label>
                                            @if ($errors->has('description'))
                                            <div class="dokan-alert dokan-alert-success">
                                
                                                <strong style="color: red;">{{ $errors->first('description') }}</strong>
                                            
                                            </div>
                                        @endif
                                            <textarea class="form-control" style="height:100px" name="description" cols="50" rows="10"></textarea>
                                            
                                        </div>
                                        </div>
                                    
                                        
                                    </div>
                                    
            
                                   
                                    <div class="form-group">
                                            <div style="
                                            padding-top: 5px;
                                        "class="col-md-6">
                                    <button type="submit" class="btn btn-success btn-lg">ارسال</button>
                                    </div>
                                    </div>
                                    </form>
                            </div>
                            
                        </div>

</div>
            
               

        </div>
</section>
@endsection
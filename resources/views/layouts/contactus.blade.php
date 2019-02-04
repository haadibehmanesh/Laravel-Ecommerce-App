@extends('app')
@section('pageTitle', 'تماس با ما')
@section('content')
<section id="wrapper">
        <div class="container">
            <div class="row">
                <ol class="breadcrumb"><a href="/">خانه</a>/ تماس با ما</ol>
            </div>
            
            <div class="title_post">
                <h2>تماس با ما</h2>
                
               
            </div>
            <div class="post-content">
                <div>
                    <span>
                        <h2>مشخصات عمومی</h2>
                    </span>
                    <div>
                    <span>
                            آدرس: شیراز خیابان قصردشت نبش کوچه 53 ساختمان نوین طبقه سوم
                    </span>
                    </div>
                </div>
                <div>
                    <span>
                        <h3>
                    شماره تماس پشتیبانی:
                        </h3>
                    
                     <i class="fa fa-phone" ></i> 0917-695-2155
                     <br>
                     <i class="fa fa-phone" ></i> 0713-626-5496
                    </span>
                </div>
                <br>
                <div>
                        اگر پیشنهاد، انتقاد، نظر و یا راهنمایی دارید، لطفا با بن اینجا تماس بگیرید. ما همیشه آماده دریافت انتقادها، نظرات و پیشنهادهای شما هستیم. برای تماس با ما می‌توانید از پست الکترونیکی  info@boninja.com استفاده کرده یا با شماره تلفن‌ 07136265496 تماس بگیرید. همچنین می توانید ما را در <a href="https://www.instagram.com/boninjaa" >instagram <i class="fa fa-instagram"></i></a>  نیز بیابید!
                        
                </div>
                <div>
                    <h3>
                    نشانی ما در شبکه های اجتماعی:
                    </h3>
                </div>
                <div>
                        <a href="https://www.instagram.com/boninjaa"><i class="fa fa-instagram"></i> سامانه خرید و تخفیف گروهی بن اینجا</a>
                </div>
                </div>
                <div class="address_map box_single">
                        <div class="title_block"><span>نشانی ما</span></div>
                        <div class="box_map">
                            <!--map-->
                            <div id="map_sellers" style="width:100%;height:400px;"></div>
                            <div class="label_map"><i class="fa fa-map-o"></i><span>مشاهده آدرس روی نقشه</span></div>
                        </div>
                </div>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfrK1E0GsP0vPKQLNAHbN4fqa1bjb7I7I"></script>
<script>
function single_product_map() {
    var mapOptions_sellers = {
        center: new google.maps.LatLng(29.6297833,52.5086218),
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.terrain,
        mapTypeControl: true,
        panControl: true,
        zoomControl: true,
        scaleControl: true,
        streetViewControl: false,
        overviewMapControl: true,
        rotateControl: false,
    };
    var map_sellers = new google.maps.Map(document.getElementById("map_sellers"), mapOptions_sellers);
    var marker_sellers = new google.maps.Marker({
        position: new google.maps.LatLng(29.6297833,52.5086218),
        map: map_sellers,
        title: 'سامانه خرید و تخفیف گروهی بن اینجا'
    });
}
single_product_map();
</script>
        </div>
</section>
@endsection
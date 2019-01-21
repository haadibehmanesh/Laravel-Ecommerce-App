@extends('app')
@section('pageTitle', 'درباره بن اینجا')
@section('content')
<section id="wrapper">
        <div class="container">
            <div class="row">
                <ol class="breadcrumb"><a href="/">خانه</a>/ درباره بن اینجا</ol>
            </div>
            
            <div class="title_post">
                <h1>درباره بن اینجا</h1>
                
                
            </div>
            <div class="post-content">
                    <p style="
                text-align: justify;
            ">بن اینجا ، با هدف ایجاد یک بستر مناسب برای معرفی سایر کسب و کار ها و ارائه تخفیفات آنها به مصرف کننده ایجاد شده است.
                    هدف ما در بن اینجا ، ارائه بهترین و با کیفیت ترین خدمات، به مشتریان عزیز از یک طرف و کمک به کسب و کارها جهت ارائه و معرفی خدمات به طیف گسترده ای از مشتریان از طرف دیگر می باشد.
                    تنوع وسیعی از کسب و کار شامل : رستوران و فست فود ، تفریحی و ورزشی ، پزشکی و سلامت ، آرایشی و زیبایی ، آموزشی هنر و تئاتر، خدمات و غیره در بستر سایت قابل دسترس می باشند که مصرف کنندگان با بالاترین درصد تخفیف امکان استفاده از این خدمات را دارند.
                    بن اینجا با دارا بودن تیم های حرفه ای فن آوری اطلاعات و بازاریابی قابلیت ارائه بهترین خدمات به همه کسب و کارهای تحت پوشش خود را دارا می باشد.
                    در نهایت هدف کلی ما در بن اینجا کمک به اقتصاد خانوار ایرانی از طریق صرفه جویی در هزینه ها و حمایت از کسب و کار های داخلی می باشد.
                    </p>

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
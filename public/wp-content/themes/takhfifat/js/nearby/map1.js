
//products = products;
//rootProducts = JSON.parse(rootProducts);
//rootServices = JSON.parse(rootServices);
//console.log(rootServices);
center = JSON.parse(center);


setMapHeight = function (){
    var height = $(window).height() - $("header").height();
    $('#map').css('height', height+"px");
}



$(document).ready(function() {
    window.isMobile = ($(window).width() <= 991);
    window.nbMarkers = {};
    
    var map;


    var mapOptions = {
        zoom: 14,
        center: {lat: center.latitude, lng: center.longitude},
        disableDefaultUI: true
    };
    map = new google.maps.Map(document.getElementById('map'),
            mapOptions);
    
    setMapHeight();
    $(window).resize(function(){
        setMapHeight();
        window.isMobile = ($(window).width() <= 991);
    });

    $("#btn-research").click(function(){
        clearMarkers();
        draw();
        $("#btn-research").addClass("hide");
    });

    //add an event listener on drag to show new result based on new area.
    google.maps.event.addListener(map, 'dragend', function() {
        if (window.isMobile) {
            $("#btn-research").removeClass("hide");
        } else {
            clearMarkers();
            draw();
        }
    });

    draw();

    //draw markers
    function draw() {
        
        var lat = map.getCenter().lat();
        var lng = map.getCenter().lng();
        //draw blue polygon
        var _center = new google.maps.LatLng(lat, lng);
        var howMuchDistance = 1;
        window.blueCircle = new google.maps.Circle({
            center: _center,
            radius: howMuchDistance * 1000,
            strokeColor: "#5f9be7",
            strokeOpacity: 0.1,
            strokeWeight: 2,
            fillColor: "#0000FF",
            fillOpacity: 0.1
        });
        blueCircle.setMap(map);
        
        //به دست آوردن دسته های انتخاب شده
        var selectedCategoryIds = [];
        $("input.category:checked").each(function () {
            selectedCategoryIds.push(parseInt($(this).val()));
        });

        if(products.length > 0){
            products.forEach(function(product, key){
                //alert(product.root);
                //product.root = 476;
                //ابتدا چک میکنیم که این محصول در دسته های انتخاب شده وجود دارد
               // if(selectedCategoryIds.indexOf(product.root) > -1){
                    
                    var latitude = product.latitude;
                    var longitude = product.longitude;
                    var distanceInKm = getDistanceFromLatLonInKm(lat, lng, latitude, longitude);

                    if (distanceInKm < howMuchDistance) {

                        var icon = baseUrl + 'wp-content/themes/takhfifat/images/nearby/20181014-105119-2292.png';
                       // var roots = (product.type == 'product') ? rootProducts: rootServices;
                        /*if(roots.length > 0){
                            roots.forEach(function(category, key){
                                if(category.id == product.root && category.location_icon !== ''){
                                    icon = baseUrl + category.location_icon; 
                                }
                            });
                        }*/
                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(latitude, longitude),
                            icon: icon,
                            animation: google.maps.Animation.DROP,
                            _productId: product.id,
                            _shopId: product.shop_id,
                           // _root: product.root,
                            optimized: false
                        });
                        nbMarkers[product.id] = marker;

                        google.maps.event.addListener(marker, 'click', (function(marker) {
                            return function() {
                                console.log(marker._productId);
                                //console.log(marker._root);
                                $(".fixed-offer").html(productTemplate(product));
                                $(".fixed-offer").removeClass('hide');
                            }
                        })(marker));

                        marker.setMap(map);

                        if (marker.getAnimation() !== null) {
                            marker.setAnimation(null);
                        } else {
                            marker.setAnimation(google.maps.Animation.BOUNCE);
                        }
                    }
               // }
                
            });
        }
    }

    //remove all markers
    function clearMarkers() {
        if (typeof blueCircle !== 'undefined') {
            blueCircle.setMap(null);
        }

        for (var x in nbMarkers) {
            nbMarkers[x].setMap(null);
        }
    }

    //get Distance From Latitude and Longitude In Km
    function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
        var R = 6371; // Radius of the earth in km
        var dLat = deg2rad(lat2 - lat1);  // deg2rad below
        var dLon = deg2rad(lon2 - lon1);
        var a =
                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2)
                ;
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c; // Distance in km
        return d;
    }

    //degree to radius
    function deg2rad(deg) {
        return deg * (Math.PI / 180)
    }
    
    //filter with category
    $("input.category").change(function(){
        clearMarkers();
        draw();
    });
    
    $(document).on("click" ,".btn-close-offer", function(){
        $(".fixed-offer").addClass('hide');
    });
    function productTemplate(product){
        var template = '';
        
        var title = product.title;
        var url = baseUrl + product.type + '/' + product.id;

        if (product.en_title) {
            title = product.en_title;
        }else if (product.short_title) {
            title = product.short_title;
        }
        
        var img = product.image;
        if(product.image == ''){
            if(product.type == 'product'){
                img = defaultProductImage;
            }else{
                img = defaultServiceImage;
            }
        }
        var src = baseUrl + img;

        var price = 0;
        var discount = 0;
        if (product.sell_price < product.price)
            price = product.price;
        if (parseFloat(product.discount) > 0)
            discount = product.discount;
    
        template += '<div class="offer-md-box">';
        template += '   <div class="offer-md">';
        template += '       <a href="javascript:void(0);" class="btn btn-danger btn-round btn-icon btn-close-offer" ><i class="ion-android-close"></i></a>';
        template += '       <div class="top">';
        template += '           <a href="' + url +'">';                        
        template += '               <img src="' + src +'" alt="' + title +'" class="img-responsive">';
        template += '           </a>';
        template += '       </div><!-- /.top -->';
        template += '       <div class="middle">';
        template += '           <div class="right-info">';  
        template += '               <h3><a href="' + url +'">' + product.short_title +'</a></h3>';
        template += '               <p class="title">' + title +'</p>';
        template += '               <a class="text-success" href="' + url +'">اطلاعات بیشتر...</a>';
        template += '           </div><!-- /.right-info -->';
        if(discount){
            template += '       <div class="single-chart">';
            template += '           <svg viewbox="0 0 36 36" class="circular-chart orange">';
            template += '               <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>';
            template += '               <path class="circle" stroke-dasharray="' + discount +', 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />';
            template += '               <text x="18" y="18" class="percentage">' + discount +'%</text>';
            template += '               <text x="18" y="25" class="percentage-text">تخفیف</text>';
            template += '           </svg>';
            template += '       </div><!-- single-chart -->';
        }
 
        var strPoint = (product.point==0) ? '': product.point;
        template += '       </div><!-- /.middle -->';
        template += '       <div class="bottom">';
        template += '           <div class="pull-right feedback">';
        template += '               <div class="point">';
        template += '                   <div class="point-number"> ' + strPoint + ' </div>';
        template +=                     printPoint(product.point);
        template += '               </div>';
        template += '               <div class="sales">';
        template += '                   <i class="ion-bag"></i> ' + product.sales;
        template += '               </div>';
        template += '           </div>';
        template += '           <div class="pull-left">';
        template += '               <div class="price-box">';
        if (product.price) { 
            template += '               <span class="del-price">' + numberFormat(product.price) + '</span>';
        } 
        template += '                   <span class="price">'+ numberFormat(product.sell_price) + '</span>';
        template += '               </div><!-- /.price-box -->';
        template += '           </div>';
        template += '       </div><!-- /.bottom -->';
        template += '   </div><!-- /.offer-lg -->';
        template += '</div><!-- /.col -->';
                
        return  template;  
    
    }
    
    // چاپ امتیاز ستاره ای 
    function printPoint(point) {
        console.log(point);
        var result = '';
        //number_format($point, 1, ".", "");
        point = parseFloat(point);
        point = point.toFixed(1);
        point = point.split(".");
        var whole = point[0];
        var decimal = point[1];

        if (whole > 5) {
            whole = 5;
            decimal = 0;
        }
        for (var i = 1; i <= whole; i++) {
            result += '<span class="fa fa-star"></span>';
        }
        switch (decimal) {
            case 0:
                break;
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
                result += '<span class="fa fa-star-half-o fa-flip-horizontal"></span>';
                i++;
                break;
            case 6:
            case 7:
            case 8:
            case 9:
                result += '<span class="fa fa-star"></span>';
                i++;
            default:
                break;
        }
        for (; i <= 5; i++) {
            result += '<span class="fa fa-star-o"></span>';
        }

        return result;
    }
    
    $("#btn-toggle-categories").click(function() {
        if ($(".fixed-categories").hasClass("active")) {
            $(".categories-section").slideUp();
            $(".fixed-categories").removeClass("active");
            $(this).find("i").addClass("fa fa-angle-up").removeClass("fa-angle-down");
        } else {
            $(".categories-section").slideDown();
            $(".fixed-categories").addClass("active");
            $(this).find("i").removeClass("fa fa-angle-up").addClass("fa fa-angle-down");
        }
    });
});
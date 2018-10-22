<?php

function presentPrice($price,$discount)
{ 
    $presentprice = $price - ($price*($discount/100));
    return $presentprice;
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function productImage($path)
{
    $path = str_replace('\\', '/', $path);
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
}

function categoryImage($path)
{
    $path = str_replace('\\', '/', $path);
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
}

function getNumbers()
{
    $tax = config('cart.tax') / 100;
    $discount = session()->get('coupon')['discount'] ?? 0;
    $code = session()->get('coupon')['name'] ?? null;
    $newSubtotal = (Cart::subtotal() - $discount);
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $newTax = $newSubtotal * $tax;
    $newTotal = $newSubtotal * (1 + $tax);

    return collect([
        'tax' => $tax,
        'discount' => $discount,
        'code' => $code,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
    ]);
}
function make_slug($string, $separator = '-')
{
	$string = trim($string);
	$string = mb_strtolower($string, 'UTF-8');

	// Make alphanumeric (removes all other characters)
	// this makes the string safe especially when used as a part of a URL
	// this keeps latin characters and Persian characters as well
	$string = preg_replace("/[^a-z0-9_\s-ءاآؤئبپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی]/u", '', $string);

	// Remove multiple dashes or whitespaces or underscores
	$string = preg_replace("/[\s-_]+/", ' ', $string);

	// Convert whitespaces and underscore to the given separator
	$string = preg_replace("/[\s_]/", $separator, $string);

	return $string;
}


function randomDigits($length){
    $numbers = range(1,9);
    $digits = '';
    shuffle($numbers);
    for($i = 0; $i < $length; $i++){
    	
       	$digits .= $numbers[$i];
    }
    return $digits;
}

function toPersianNum($number)
    {
        $number = str_replace("1","۱",$number);
        $number = str_replace("2","۲",$number);
        $number = str_replace("3","۳",$number);
        $number = str_replace("4","۴",$number);
        $number = str_replace("5","۵",$number);
        $number = str_replace("6","۶",$number);
        $number = str_replace("7","۷",$number);
        $number = str_replace("8","۸",$number);
        $number = str_replace("9","۹",$number);
        $number = str_replace("0","۰",$number);
        return $number;
    }

    

    function g2p($g_y, $g_m, $g_d)
    {
        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);
        $gy = $g_y-1600;
        $gm = $g_m-1;
        $gd = $g_d-1;
        $g_day_no = 365*$gy+floor(($gy+3)/4)-floor(($gy+99)/100)+floor(($gy+399)/400);
        for ($i=0; $i < $gm; ++$i){
            $g_day_no += $g_days_in_month[$i];
        }
        if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0))){
            /* leap and after Feb */
            ++$g_day_no;
        }
        $g_day_no += $gd;
        $j_day_no = $g_day_no-79;
        $j_np = floor($j_day_no/12053);
        $j_day_no %= 12053;
        $jy = 979+33*$j_np+4*floor($j_day_no/1461);
        $j_day_no %= 1461;
        if ($j_day_no >= 366) {
            $jy += floor(($j_day_no-1)/365);
            $j_day_no = ($j_day_no-1)%365;
        }
        $j_all_days = $j_day_no+1;
        for ($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i) {
            $j_day_no -= $j_days_in_month[$i];
        }
        $jm = $i+1;
        $jd = $j_day_no+1;
        
        return array($jy, $jm, $jd, $j_all_days);
    }

    function p2g($j_y, $j_m, $j_d)
    {
        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);
        $jy = $j_y-979;
        $jm = $j_m-1;
        $jd = $j_d-1;
        $j_day_no = 365*$jy + floor($jy/33)*8 + floor(($jy%33+3)/4);
        for ($i=0; $i < $jm; ++$i){
            $j_day_no += $j_days_in_month[$i];
        }
        $j_day_no += $jd;
        $g_day_no = $j_day_no+79;
        $gy = 1600 + 400*floor($g_day_no/146097);
        $g_day_no = $g_day_no % 146097;
        $leap = true;
        if ($g_day_no >= 36525){
            $g_day_no--;
            $gy += 100*floor($g_day_no/36524);
            $g_day_no = $g_day_no % 36524;
            if ($g_day_no >= 365){
                $g_day_no++;
            }else{
                $leap = false;
            }
        }
        $gy += 4*floor($g_day_no/1461);
        $g_day_no %= 1461;
        if ($g_day_no >= 366){
            $leap = false;
            $g_day_no--;
            $gy += floor($g_day_no/365);
            $g_day_no = $g_day_no % 365;
        }
        for ($i = 0; $g_day_no >= $g_days_in_month[$i] + ($i == 1 && $leap); $i++){
            $g_day_no -= $g_days_in_month[$i] + ($i == 1 && $leap);
        }
        $gm = $i+1;
        $gd = $g_day_no+1;
        return array($gy, $gm, $gd);
    }
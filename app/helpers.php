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
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
}

function categoryImage($path)
{
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
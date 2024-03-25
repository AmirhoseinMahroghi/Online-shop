<?php

use App\Models\City;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Province;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;

if (!function_exists('genrateFileName')) {
    function genrateFileName($name)
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        $hour = Carbon::now()->hour;
        $minute = Carbon::now()->minute;
        $second = Carbon::now()->second;
        $microsecond = Carbon::now()->microsecond;

        return $year . '_' . $month . '_' . $day . '_' . $hour . '_' . $minute . '_' . $second . '_' . $microsecond . '_' . $name;
    }
}

if (!function_exists('convertShamsiToGregorianDate')) {
    function convertShamsiToGregorianDate($date)
    {
        if ($date == null) {
            return null;
        }
        $pattern = "/[-\s]/";
        $shamsiDateSplit = preg_split($pattern, $date);

        $arrayGregorianDate = Verta::jalaliToGregorian($shamsiDateSplit[0], $shamsiDateSplit[1], $shamsiDateSplit[2]);

        return implode("-", $arrayGregorianDate) . " " . $shamsiDateSplit[3];
    }
}

if (!function_exists('cartTotalSaleAmount')) {
    function cartTotalSaleAmount()
    {
        $cartTotalSaleAmount = 0;
        foreach (\Cart::getContent() as $item) {
            if ($item->attributes->is_sale) {
                $cartTotalSaleAmount += $item->quantity * ($item->attributes->price - $item->attributes->sale_price);
            }
        }

        return $cartTotalSaleAmount;
    }
}

if (!function_exists('cartTotalDeliveryAmount')) {
    function cartTotalDeliveryAmount()
    {
        $cartTotalDeliveryAmount = 0;
        foreach (\Cart::getContent() as $item) {
            if ($item->attributes->is_sale) {
                $cartTotalDeliveryAmount += $item->associatedModel->delivery_amount;
            }
        }

        return $cartTotalDeliveryAmount;
    }
}

if (!function_exists('cartTotalAmount')) {
    function cartTotalAmount()
    {
        if (session()->has('coupon')) {
            if (session()->get('coupon.amount') > (\Cart::getTotal() + cartTotalDeliveryAmount())) {
                return 0;
            } else {
                return (\Cart::getTotal() + cartTotalDeliveryAmount()) - session()->get('coupon.amount');
            }
        } else {
            return \Cart::getTotal() + cartTotalDeliveryAmount();
        }
    }
}

if (!function_exists('checkCoupon')) {
    function checkCoupon($code)
    {
        $coupon = Coupon::where('code', $code)->where('expired_at', '>', Carbon::now())->first();

        if ($coupon == null) {
            session()->forget('coupon');
            return ['error' => 'کد تخفیف وارد شده صحیح نمی باشد'];
        }

        if (Order::where('user_id', auth()->id())->where('coupon_id', $coupon->id)->where('payment_status', 1)->exists()) {
            session()->forget('coupon');
            return ['error' => 'شما قبلا ازاین کد تخفیف استفاده کردید'];
        }

        if ($coupon->getRawOriginal('type') == 'amount') {
            session()->put('coupon', ['id' => $coupon->id, 'code' => $coupon->code, 'amount' => $coupon->amount]);
        } else {

            $total = \Cart::getTotal() + cartTotalDeliveryAmount();
            $amount = (($total * $coupon->percentage) / 100) > $coupon->max_percentage_amount ? $coupon->max_percentage_amount : (($total * $coupon->percentage) / 100);
            session()->put('coupon', ['id' => $coupon->id, 'code' => $coupon->code, 'amount' => $amount]);
        }

        return ['success' => 'کد تخفیف برای شما اعمال شد'];
    }
}

if (!function_exists('province_name')) {
    function province_name($provinceId)
    {
        return Province::findOrfail($provinceId)->name;
    }
}

if (!function_exists('city_name')) {
    function city_name($cityId)
    {
        return City::findOrfail($cityId)->name;
    }
}

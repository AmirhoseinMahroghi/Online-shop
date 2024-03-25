<?php

namespace App\Http\Controllers\Home;

use Cart;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Province;
use App\Models\UserAddresses;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'qtybutton' => 'required'
        ]);

        $product = Product::findOrFail($request->product_id);
        $productVariation = ProductVariation::findOrFail(json_decode($request->variation)->id);

        if ($request->qtybutton > $productVariation->quantity) {
            alert()->error('دقت کنید', 'تعداد وارد شده از محصول صحیح نمی باشد');
            return redirect()->back();
        }

        $rowId = $product->id . '-' . $productVariation->id;

        if (Cart::get($rowId) == null) {
            Cart::add(array(
                'id' => $rowId,
                'name' => $product->name,
                'price' => $productVariation->is_sale ? $productVariation->sale_price : $productVariation->price,
                'quantity' => $request->qtybutton,
                'attributes' => $productVariation->toArray(),
                'associatedModel' => $product
            ));
        } else {
            alert()->warning('دقت کنید', 'محصول مورد نظر قبلا به سبد خرید شما اضافه شده است');
            return redirect()->back();
        }

        alert()->success('با تشکر', 'محصول مورد نظر به سبد خرید شما اضافه شد');
        return redirect()->back();
    }

    public function index()
    {
        return view('home.cart.index');
    }

    public function update(Request $request)
    {
        session()->forget('coupon');

        $request->validate([
            'qtybutton' => 'required'
        ]);

        foreach ($request->qtybutton as $rowId => $quantity) {

            $item = Cart::get($rowId);

            if ($quantity > $item->attributes->quantity) {
                alert()->error('دقت کنید', 'تعداد وارد شده از محصول صحیح نمی باشد');
                return redirect()->back();
            }

            Cart::update($rowId, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $quantity
                ),
            ));
        }

        alert()->success('با تشکر', 'سبد خرید شما ویرایش شد');
        return redirect()->back();
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);

        alert()->success('با تشکر', 'محصول موردنظر از سبد خرید شما حذف شد');
        return redirect()->back();
    }

    public function clear()
    {
        Cart::clear();
        session()->forget('coupon');

        alert()->warning('با تشکر', 'سبد خرید شما خالی است');
        return redirect()->back();
    }

    public function checkCoupon(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);

        if (!auth()->check()) {
            alert()->warning('دقت کنید', 'برای استفاده از کد تخفیف ابتدا باید وارد وب سایت شوید');
            return redirect()->route('login');
        }

        $result = checkCoupon($request->code);
        // dd($result);

        if (array_key_exists('error', $result)) {
            alert()->warning('دقت کنید', $result['error']);
        } else {
            alert()->success('با تشکر', $result['success']);
        }

        return redirect()->back();
    }

    public function checkout()
    {
        if ((\Cart::isEmpty())) {
            alert()->warning('دقت کنید', 'سبد خرید شما خالی است');
            return redirect()->route('home.index');
        }

        $addresses = UserAddresses::where('user_id', auth()->id())->get();
        $provinces = Province::all();
        return view('home.cart.checkout', compact('addresses', 'provinces'));
    }

    public function forgetCoupon()
    {
        session()->forget('coupon');

        alert()->warning('با تشکر', 'کد تخفیف شما حذف گردید');
        return redirect()->back();
    }

    public function UserOrders()
    {
        $orders = Order::where('user_id', auth()->id())->orderBy('created_at','DESC')->get();
        return view('home.users_profile.orders', compact('orders'));
    }
}

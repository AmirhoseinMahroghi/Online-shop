<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use App\Models\UserAddresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = UserAddresses::where('user_id', auth()->id())->get();
        $provinces = Province::all();
        return view('home.users_profile.addresses', compact('provinces', 'addresses'));
    }

    public function store(Request $request)
    {
        $request->validateWithBag('addressStore', [
            'title' => 'required',
            'cellphone' => 'required|ir_mobile:zero',
            'province_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'postal_code' => 'required|ir_postal_code:without_seprate',
        ]);

        UserAddresses::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'cellphone' => $request->cellphone,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
        ]);

        alert()->success('باتشکر', 'آدرس موردنظر ثبت شد');
        return redirect()->back();
    }

    public function update(Request $request, UserAddresses $address)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'cellphone' => 'required|ir_mobile:zero',
            'province_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'postal_code' => 'required|ir_postal_code:without_seprate',
        ]);

        if ($validator->fails()) {
            $validator->errors()->add('address_id', $address->id);
            return redirect()->back()->withErrors($validator,'addressUpdate')->withInput();
        }

        $address->update([
            'title' => $request->title,
            'cellphone' => $request->cellphone,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
        ]);

        alert()->success('باتشکر', 'آدرس موردنظر ویرایش شد');
        return redirect()->back();
    }


    public function getProvinceCitiesList(Request $request)
    {
        $cities = City::where('province_id', $request->province_id)->get();

        return $cities;
    }
}

<?php

namespace App\Http\Controllers\Client;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function AllCoupon()
    {
        $cid = Auth::guard('client')->id();
        $coupon = Coupon::where('client_id', $cid)->latest()->get();
        return view('client.backend.coupon.all_coupon', compact('coupon'));
    }

    public function AddCoupon()
    {
        return view('client.backend.coupon.add_coupon');
    }

    public function StoreCoupon(Request $request)
    {
        Coupon::create([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_desc' => $request->coupon_desc,
            'discount' => $request->discount,
            'validity' => $request->validity,
            'client_id' => Auth::guard('client')->id(),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => '¡Cupón agregado Correctamente!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.coupon')->with($notification);
    }

    public function EditCoupon($id)
    {
        $coupon = Coupon::find($id);
        return view('client.backend.coupon.edit_coupon', compact('coupon'));
    }

    public function UpdateCoupon(Request $request)
    {
        $cop_id = $request->id;

        Coupon::find($cop_id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_desc' => $request->coupon_desc,
            'discount' => $request->discount,
            'validity' => $request->validity,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => '¡Cupón modificado Correctamente!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.coupon')->with($notification);
    }

    public function DeleteCoupon($id)
    {
        Coupon::find($id)->delete();

        $notification = array(
            'message' => '¡Cupón eliminado Correctamente!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
}

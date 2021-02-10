<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CouponController extends Controller
{
    public function __construct(){

        $this->middleware('auth:admin');

    }

    public function Coupon(){

        $coupon=DB::table('coupons')->get();
        return view('admin.coupon.coupon', compact ('coupon'));
    }

    public function CouponStore(Request $request){

        $data=array();
        $data['coupon']=$request->coupon;
        $data['discount']=$request->discount;
        DB::table('coupons')->insert($data);
        $notification = array(

            'message'=> 'Coupon Inserted Successfully',
            'alert-type'=> 'success'

        );

        return Redirect()->back()->with($notification);
    }

    public function CouponDelete($id){

        DB::table('coupons')->where('id',$id)->delete();
        $notification = array(

            'message'=> 'Coupon Deleted Successfully',
            'alert-type'=> 'error'

        );

        return Redirect()->back()->with($notification);
    }

    public function CouponEdit($id){

        $coupon = DB::table('coupons')->where('id',$id)->first();
        return view('admin.coupon.coupon_edit',compact('coupon'));

    }

    public function CouponUpdate(Request $request ,$id){

        $data=array();
        $data['coupon']=$request->coupon;
        $data['discount']=$request->discount;
        DB::table('coupons')->where('id',$id)->update($data);
        $notification = array(

            'message'=> 'Coupon Updated Successfully',
            'alert-type'=> 'success'

        );

        return Redirect()->route('admin.coupon')->with($notification);
        
    }
}

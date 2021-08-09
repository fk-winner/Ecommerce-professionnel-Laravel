<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Coupon;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Coupon(){
        $coupon = Coupon::all();
        return view('admin.coupon.coupon', compact('coupon'));
    }

    public function Storecoupon(Request $request){
        $validateData = $request->validate([
            'coupons' => 'required|max:55',
            'discount' => 'required',
        ]);

        $data = array();
        $data['coupons'] = $request->coupons;
        $data['discount'] = $request->discount;
        DB::table('coupons')->insert($data);
        $notification=array(
            'messege'=>'Coupon Added Successfully',
            'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
    }

    public function Deletecoupon($id){
        DB::table('coupons')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Coupon Deleted Successfully',
            'alert-type'=>'info',
            );
        return Redirect()->back()->with($notification);
    }

    public function Editcoupon($id){
        $coupon = DB::table('coupons')->where('id',$id)->first();
        return view('admin.coupon.editcoupon', compact('coupon'));
    }

    public function Updatecoupon(Request $request, $id){

        $data = array();
        $data['coupons'] = $request->coupons;
        $data['discount'] = $request->discount;
        DB::table('coupons')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'Coupon Updated Successfully',
            'alert-type'=>'success',
            );
            return Redirect()->route('admin.coupon')->with($notification);
    }
    // Newslater method
    public function Newslater(){
        $sub = DB::table('newslaters')->get();
        return View('admin.coupon.newslater', compact('sub'));
    }
    public function Deletesubscriber($id){
        DB::table('newslaters')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Subscriber Deleted Successfully',
            'alert-type'=>'info',
            );
        return Redirect()->back()->with($notification);
    }
}

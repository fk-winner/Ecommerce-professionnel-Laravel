<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function SubCategory(){
        $category = DB::table('categories')->get();
        $subcategory = DB::table('subcategories')
        ->join('categories', 'subcategories.category_id','categories.id')
        ->select('subcategories.*', 'categories.category_name')->get();
        return view('admin.category.view_subcategory', compact('subcategory','category'));
    }

    public function Storecategory(Request $request){
        $validateData = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ]);
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        DB::table('subcategories')->insert($data);
        $notification=array(
            'messege'=>'Sub-Category added successfully',
            'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
    }

    public function Deletesubcat($id){
        DB::table('subcategories')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Sub Category Deleted Successfully',
            'alert-type'=>'info',
            );
        return Redirect()->back()->with($notification);
    }

    public function Editsubcat($id){
        $category = DB::table('categories')->get();
        $subcategory = DB::table('subcategories')->where('id',$id)->first();
        return view('admin.category.editsubcategory', compact('subcategory','category'));
    }

    public function Updatesubcat(Request $request, $id){
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        DB::table('subcategories')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'Sub-Category updated successfully',
            'alert-type'=>'info',
            );
            return Redirect()->route('sub.categories')->with($notification);
    }
}

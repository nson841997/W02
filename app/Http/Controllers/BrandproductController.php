<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandproductController extends Controller
{
    public function  add_brand_product()
    {
        return view('admin.addBrandProduct');
    }
    public function  all_category_product()
    {
        $all_category_product = DB::table('tbl_brand_product')->get();
        $manager_category_product = view('admin.allCategoryProduct')->with('all_category_prd',$all_category_product);
        return view('admin_layout')->with('admin.allCategoryProduct',$manager_category_product);
    }
    public function  save_brand_product(Request $request)
    {
        $data = array();
//      $data['Tên colum trong db'] = $request->name(trong add_category_product)
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;

//        insert db
        DB::table('tbl_brand')->insert($data);
        Session::put('message','Thêm thương hiệu sản phẩm thành công');
        return redirect('add-brand-product');
    }
    public function active_category_product($category_product_id)
    {
        DB::table('tbl_brand')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','Thông báo: đã tắt kích hoạt thành công');
        return Redirect('all-category-product');

    }
    public function unactive_category_product($category_product_id)
    {
        DB::table('tbl_brand')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','Thông báo: đã kích hoạt thành công');
        return Redirect('all-category-product');
    }
    public function edit_category_product($category_product_id)
    {
        $edit_category_product = DB::table('tbl_brand')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.editCategoryProduct')->with('edit_category_prd',$edit_category_product);
        return view('admin_layout')->with('admin.editCategoryProduct',$manager_category_product);
    }

    public function update_category_product(Request $request, $category_product_id)
    {
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_brand')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect('all-category-product');
    }
    public function delete_category_product($category_product_id)
    {
        DB::table('tbl_brand')->where('category_id',$category_product_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect('all-category-product');
    }

}

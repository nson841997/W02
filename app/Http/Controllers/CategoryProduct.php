<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function  add_category_product()
    {
        return view('admin.addCategoryProduct');
    }
    public function  all_category_product()
    {
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.allCategoryProduct')->with('all_category_prd',$all_category_product);
        return view('admin_layout')->with('admin.allCategoryProduct',$manager_category_product);
    }
    public function  save_category_product(Request $request)
    {
        $data = array();
//        $data['Tên colum trong db'] = $request->name(trong add_category_product)
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

//        insert db
        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Thêm danh mục sản phẩm thành công');
        return redirect('add-category-product');
    }
    public function active_category_product($category_product_id)
    {
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','Thông báo: đã tắt kích hoạt thành công');
        return Redirect('all-category-product');

    }
    public function unactive_category_product($category_product_id)
    {
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','Thông báo: đã kích hoạt thành công');
        return Redirect('all-category-product');
    }
}

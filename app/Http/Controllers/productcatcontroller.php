<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class productcatcontroller extends Controller
{
    public function productcategory()
    {
        $data = DB::select('select * from product_category');

        return view('dashbord.productscat.index', compact('data'));
    }

    public function addproductcategory()
    {
        return view('dashbord.productscat.insert');
    }

    public function storeproductcategory(Request $req)
    {
        $req->validate([
            'title' => 'required|max:50',
            'catimg' => 'required|mimes:png,jpg',
        ]);

        $img = $req->catimg;
        $imgname = $img->getClientOriginalName();
        $imgname = 'productimages/' . Str::random('20') . "__" . $imgname;
        $img->move('productimages/', $imgname);

        DB::insert('insert into product_category(catname, catimg) value(?,?)', [$req->title, $imgname]);
        return redirect('dashbord/product-category');
    }

    public function editproductcategory($id)
    {
        $data = DB::select('select * from product_category where catid=?', [$id]);
        return view('dashbord.productscat.edit', compact('data'));
    }

    public function updateproductcategory(Request $req, $id)
    {
        $req->validate([
            'title' => 'required|max:50',
        ]);

        $data = DB::select('select * from product_category where catid=?', [$id]);

        if ($req->catimg) {
            $img = $req->catimg;
            $imgname = $img->getClientOriginalName();
            $imgname = 'productimages/' . Str::random('20') . "__" . $imgname;
            $img->move('productimages/', $imgname);
            unlink($req->oldimg);
        } else {
            $imgname = $req->oldimg;
        }

        if ($data) {
            DB::update('update product_category set catname = ?, catimg = ? where catid = ?', [$req->title, $imgname, $id]);
            return redirect('dashbord/product-category');
        }

        return redirect('dashbord/product-category');
    }

    public function deleteproductcategory($id)
    {
        $data = DB::select('select * from product_category where catid = ?', [$id]);

        if ($data) {
            unlink($data[0]->catimg);
            DB::delete('delete from product_category where catid = ?', [$id]);
            return redirect('dashbord/product-category');
        }

        return redirect('dashbord/product-category');
    }
}

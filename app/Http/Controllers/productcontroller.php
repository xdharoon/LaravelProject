<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class productcontroller extends Controller
{
    public function product(){

        $data=Db::select('select * from product inner join product_category on product.catid = product_category.catid');
        return view('dashbord.product.index',compact('data'));

    }

    public function addproduct(){
  $data=DB::select('select * from product_category');
        return view('dashbord.product.insert',compact('data'));

    }

    function storeproduct(Request $req){
        $req->validate([
            'pname' => 'required|max:50',
            'pprice' => 'required',
            'pdesc' => 'required',
            'cat' => 'required',
            'pdesc' => 'required',
            'pimg' => 'required|mimes:png,jpg',
        ]);
        if($req -> pimg){
            $img= $req->pimg;
            $imgname=$img->getClientOriginalName();
            $imgname="Productimages/".Str::random(10)."__".$imgname;
            $img->move('productimages/',$imgname);
            DB::insert('insert into product (pname, pimg, pprice, pdesc, catid, status) values (?, ?, ?, ?, ?, ?)', [$req->pname, $imgname, $req->pprice, $req->pdesc, $req->cat, $req->status]);
            return redirect('/dashbord/product');

        }
        return redirect('/dashbord/product');
    }
    public function editproduct($id){
         $data=Db::select('select * from product inner join product_category on product.catid = product_category.catid where pid=?',[$id]);
        return view('dashbord.product.edit',compact('data'));

    }
    public function updateproduct($id){
    }

    public function deleteproduct($id) {

}

}

<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function productsList(){
        // $product = Products::With('subcategory')->get();
        $product = Products::With('category')->get();
        return view('dashboard.products.index',compact('product'));
    }

    function insert()
    {
        // $SubService = SubCategories::all();
        $Service = Categories::all();
        return view('dashboard.products.insert',compact('Service'));
    }
    
    function Store(Request $req)
    {
        $req->validate([
            'Name' => 'required | max:50 | min:3',
            'Img' => 'required | image |mimes:png,jpg,jpeg',
        ]);

        $data = $req->all();

        $img = $req->Img;
        $imgname = $img->getClientOriginalName();
        $imgname = time() . "__" . $imgname;
        $img->move("images/Productimages/", $imgname);
    
        $st = new Products;
        $st->CategoryID = $req->CategoryID;
        $st->Name = $req->Name;
        $st->Img = "/images/Productimages/$imgname";
        $st->Description = $req->Description;
        $st->Price = $req->Price;
        $st->Status = $req->Status;
        $st->save();

        return redirect('/DbProducts');

    }

    function edit($id)
    {
        $st = Products::find($id);
        // $SubService = SubCategories::all();
        $Service = Categories::all();
        if ($st) {
            return view('dashboard.products.edit', compact('st','Service'));
        }
        return redirect('/DbProducts');

    }

    function update(Request $req, $id)
    {
        $st = Products::find($id);
        $imgname = $st->Img;
        if ($req->hasfile('Img')) {
            
            $img = $req->Img;
            $imgname = $img->getClientOriginalName();
            $imgname = time() . "__" . $imgname;
            $img->move("images/Productimages/", $imgname);
            $imgname = "/images/Productimages/".$imgname;
            if($st->Img){
                if(file_exists(public_path($st->Img))){
                    unlink(public_path($st->Img));
                }
            }
        }

        $st->CategoryID = $req->CategoryID;
        $st->Name = $req->Name;
        $st->Img = $imgname;
        $st->Description = $req->Description;
        $st->Price = $req->Price;
        $st->Status = $req->Status;
        $st->save();
        return redirect('/DbProducts');
    }

    function delete($id)
    {
        $st = Products::find($id);

        if ($st) {
            if($st->Img){
                if(file_exists(public_path($st->Img))){
                    unlink(public_path($st->Img));
                }
            }
            $st->delete();
            return redirect('/DbProducts');
        }

        return redirect('/DbProducts');
    }

}

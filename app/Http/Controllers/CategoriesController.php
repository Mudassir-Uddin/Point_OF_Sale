<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    function CategoriesList()
    {
        $service = Categories::all();
        return view('dashboard.Categories.index',compact('service'));
    }

    function insert()
    {
        return view('dashboard.Categories.insert');
    }

    function Store(Request $req)
    {
        $req->validate([
            'Name' => 'required | max:50 | min:3',
            // 'Img' => 'required | image | mimes:png,jpg',
            'Description' => 'required',
        ]);

        // dd($req);
        // $img = $req->Img;
        // $imgname = $img->getClientOriginalName();
        // $imgname = time() . "__" . $imgname;
        // $img->move("images/Serviceimages/", $imgname);

        $st = new Categories;
        $st->Name = $req->Name;
        // $st->Img = "/images/Serviceimages/$imgname";
        $st->Description = $req->Description;

        $st->save();

        return redirect('/CategoriesList');

    }

    function edit($id)
    {
        $st = Categories::find($id);
        if ($st) {
            return view('dashboard.Categories.edit', compact('st'));
        }
        return redirect('/CategoriesList');

    }

    function update(Request $req, $id)
    {
        $st = Categories::find($id);

        $imgname = $st->Img;
        if ($req->hasfile('Img')) {
            
            $img = $req->Img;
            $imgname = $img->getClientOriginalName();
            $imgname = time() . "__" . $imgname;
            $img->move("images/Serviceimages/", $imgname);
            $imgname = "/images/Serviceimages/".$imgname;
            if($st->Img){
                if(file_exists(public_path($st->Img))){
                    unlink(public_path($st->Img));
                }
            }
        }
            $st->Name = $req->Name;
            $st->Img = $imgname;
            $st->Description = $req->Description;

            $st->save();

            return redirect('/CategoriesList');
    }

    function delete($id)
    {
        $st = Categories::find($id);

        if ($st) {
            if($st->Img){
                if(file_exists(public_path($st->Img))){
                    unlink(public_path($st->Img));
                }
            }
            $st->delete();
            return redirect('/CategoriesList');
        }
        return redirect('/CategoriesList');
    }

}

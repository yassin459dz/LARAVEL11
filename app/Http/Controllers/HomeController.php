<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;


class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function home()
    {
        $product = Product::all();

        return view('home.index',compact('product'));
    }

    public function product_details($id)
    {
          $data = Product::find($id);
          return view('home.product_details', compact('data'));
    }

    public function order(Request $request)
    {
        $data= new Order();
        $data->title = $request->title;
        $data->price = $request->price;
        $data->nom = $request->Nom;
        $data->telephone = $request->telephone;
        $data->address = $request->address;
        $data->save();
        toastr()->closeButton()->success('Product ADD sec');

        return redirect()->back();
    }
}

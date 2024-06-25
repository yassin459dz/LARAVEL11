<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->categories_name = $request->category;

        $category->save();

        toastr()->closeButton()->success('Category Added suc');

        return redirect()->back();
    }
    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();

        toastr()->closeButton()->info('Category Deleted');

        return redirect()->back();
    }
    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request,$id)
    {
        $data = Category::find($id);
        $data->categories_name= $request->category;
        $data->save();
        toastr()->closeButton()->success('Category UPDATED suc');
        return redirect('/view_category');
    }

    public function add_product()
    {

        $category = Category::all();
        return view('admin.add_product', compact('category'));

    }

    public function upload_product(Request $request)
    {
        $data= new Product();
        $data->title = $request->title;
        $data->desc = $request->desc;
        $data->price = $request->price;
        $data->qte = $request->qte;
        $data->category = $request->category;

        $image = $request->image;
        if($image)
        {
            $imagename= time().'.'.$image->getClientOriginalExtension();
            $request->image->move('image_product',$imagename);
            $data->image=$imagename;
        }
        $data->save();
        toastr()->closeButton()->success('Product ADD sec');

        return redirect()->back();
    }

    public function view_product()
    {
        $product = Product::Paginate(15);
        return view('admin.view_product', compact('product'));

    }

    public function delete_product($id)
    {
        $data = Product::find($id);
///////////////IF YOU WANT TO DELETE THE IMAGE
        $image_path = public_path('image_product/'.$data->image);

        if(file_exists($image_path))
        {
            unlink($image_path);
        }
//////////////////////////////////////////////////////////
        $data->delete();

        toastr()->closeButton()->info('Product Deleted');

        return redirect()->back();
    }

    public function update_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.update_page', compact('data','category'));
    }

    public function edit_product(Request $request, $id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->desc = $request->desc;
        $data->price = $request->price;
        $data->qte = $request->qte;
        $data->category = $request->category;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('image_product', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        toastr()->closeButton()->success('Product UPDATED successfully');
        return redirect('/view_product');
    }

    public function product_search(Request $request)
    {
        $search = $request->search;

        // Perform the search query
        $product = Product::where('title', 'LIKE', '%' . $search . '%')->get();

        // Return view with compacted data
        return view('admin.view_product', compact('product'));
    }

    public function view_order()
    {
        $data = Order::all();
        return view('admin.view_order', compact('data'));
    }

    public function print($id)
    {
        $data = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice', compact('data'));
        return $pdf->download('invoice.pdf');
    }
}

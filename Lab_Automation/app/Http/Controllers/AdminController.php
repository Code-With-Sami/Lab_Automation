<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    //
    public function showProduct()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function createProduct()
    {
        return view('admin.products.create');
    }
    public function storeProduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('pname');
        $product->description = $request->input('pdescription');
        $product->price = $request->input('pprice');
        $product->quantity = $request->input('pqty');
        if ($request->hasFile('pimage')) {
            $img = time().'-'.$request->pimage->getClientOriginalName();
            $request->pimage->move(public_path('productsImages'),$img);
            $product->image = $img;
        }
        $product->status = $request->input('pstatus');
        $product->save();
        return redirect('show-product');
    }
    public function editProduct($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }
    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('pname');
        $product->description = $request->input('pdescription');
        $product->price = $request->input('pprice');
        $product->quantity = $request->input('pqty');
        if ($request->hasFile('pimage')) {
            $img = time().'-'.$request->pimage->getClientOriginalName();
            $request->pimage->move(public_path('productsImages'),$img);
            $product->image = $img;
        }
        $product->status = $request->input('pstatus');
        $product->save();
        return redirect('show-product');
    }
    public function deleteProduct($id)
    {
        Product::find($id)->delete();
        return redirect('show-product');
    }
}

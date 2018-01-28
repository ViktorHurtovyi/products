<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\ProductRequest;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $objProduct = new Product();
        $Products = $objProduct->get();
        return view("products.index", ['products' => $Products]);
    }

    public function addProduct()
    {
        return view("products.add");
    }

    public function addRequestProduct(ProductRequest $request)
    {

        $objProduct = new Product();
        $objProduct = $objProduct->create([
            'name' => $request->input('name'),
            'descriptions' => $request->input('descriptions'),
            'price' => $request->input('price')
        ]);
        $objPrice = new Price();
        $objPrice = $objPrice->create([
            'products_id' => $objProduct->id,
            'price' => $request->input('price')
        ]);
        if ($objProduct) {

            return back();
        } else {
            dd($request->all());
        }
    }

    public function editProduct(int $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return abort(404);
        }
        return view('products.edit', ['product' => $product]);

    }

    public function editRequestProduct(Request $request, int $id)
    {
        $objProduct = Product::find($id);
        $objPrice = new Price();
        $objPrice = $objPrice->create([
            'products_id' => $id,
            'price' => $request->input('price')
        ]);
        if (!$objProduct) {
            abort(404);
        }
        $objProduct->name = $request->input('name');
        $objProduct->descriptions = $request->input('descriptions');
        $objProduct->price = $request->input('price');
        if ($objProduct->save()) {
            return redirect(route('products'))->with('success');
        }else {
            return back()->with('error');
            dd($request->all());
        }
    }
    public function priceHistory(int $products_id)
    {
        $objprice = new Price();
        $objprice = $objprice->get()->where('products_id', $products_id);
        return view('products.priceHistory', ['price' => $objprice]);
    }
    public function deleteProduct(Request $request){
        if($request->ajax()){
            $id = (int)$request-> input('id');
            $objProduct = new Product();
            $objProduct->where('id', $id)->delete();
            $objPrice = new Price();
            $objPrice->where('products_id', $id)->delete();
        }
    }

}
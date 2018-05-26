<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ProductsController extends Controller
{

    function toModel($product)
    {
        $cat = Category::where('id', $product->category)->get()[0];
        $product->category = $cat->name;
        return $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->getAllProductsWithCat();
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image_url' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        $cat = Category::where('name', $request->input('category'))->get()[0];
        $onSale = $request->input('on_sale') ? 1 : 0;
        $product = new Product;
        $product->title = $request->input('title');
        $product->category = $cat->id;
        $product->image_url = $request->input('image_url');
        $product->price = $request->input('price');
        $product->on_sale = $onSale;
        $product->description = $request->input('description');
        $product->save();

        return redirect('/products')->with('success', __('silvex.products.create.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prod = Product::find($id);
        $cat = Category::where('id', $prod->category)->get()[0];
        $prod->category = $cat->name;
        $prod->price = number_format((float)$prod->price, 2, '.', '');
        return view('products.show')->with('product', $prod);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $cat = Category::where('id', $product->category)->get()[0];
        $product->category = $cat->name;
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'image_url' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        $cat = Category::where('name', $request->input('category'))->get()[0];
        $onSale = $request->input('on_sale') ? 1 : 0;
        $product = Product::find($id);
        $product->title = $request->input('title');
        $product->category = $cat->id;
        $product->image_url = $request->input('image_url');
        $product->price = $request->input('price');
        $product->on_sale = $onSale;
        $product->description = $request->input('description');
        $product->save();

        return redirect('/products')->with('success', __('silvex.products.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products')->with('success', __('silvex.products.delete.success'));
    }

    public function fishProducts()
    {
        return $this->getCategorizedProducts("fish");
    }

    public function categoryFish()
    {
        return $this->getCategorizedProducts("fish");
    }

    public function categoryFishProducts()
    {
        return $this->getCategorizedProducts("fish_products");
    }

    public function categoryAccessories()
    {
        return $this->getCategorizedProducts("accessories");
    }

    private function getAllProductsWithFixedPrice()
    {
        return Product::all()
            ->map(function ($product) {
                $product->price = number_format((float)$product->price, 2, '.', '');
                return $product;
            });
    }

    private function getAllProductsWithCat()
    {
        return $this->getAllProductsWithFixedPrice()
            ->map(function ($product) {
                $cat = Category::where('id', $product->category)->get()[0];
                $product->category = $cat->name;
                return $product;
            });
    }

    private function getCategorizedProducts($category)
    {
        Log::info("cat1:".$category);
        $products = $this->getAllProductsWithCat()
            ->filter(function ($product) use ($category) {
                $res = strcmp($category, $product->category);
                return $res == 0;
            });
        return view('products.index')->with('products', $products);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proData = Product::all();
        return view('ecommerce.product.product',compact('proData'));
    }

    public function indexUser()
    {
        $proData = Product::all();
        return view('ecommerce.product.product',compact('proData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_category = Category::all();
        return view('ecommerce.product.addProduct',compact('all_category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_product' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|numeric'
        ]);

        try {
            $proDat = new Product();
            $proDat->name_product = $request->name_product;
            $proDat->description = $request->description;
            $proDat->price = $request->price;
            $proDat->category_id = $request->category_id;
            $proDat->save();

            return redirect('product')->with('success', 'Berhasil Edit Data');
        } catch (\Exception $e) {
            return redirect('product')->with('fail', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Category_data = Category::all();
        $EditPro = Product::find($id);
        return view('ecommerce.product.editProduct',compact('EditPro','Category_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name_product' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|string',
            'category_id' => 'required|numeric'
        ]);

        try {
            Product::where('id',$request->edit_id)->update([
                'name_product' => $request->name_product,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category_id
            ]);
            return redirect('product')->with('success', 'Berhasil Edit Data');
        } catch (\Exception $e) {
            return redirect('product')->with('fail', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Product::where('id',$id)->delete();

            return redirect('product')->with('success', 'Berhasil Hapus Data');
        } catch (\Exception $e) {
            return redirect('product')->with('fail', $e->getMessage());
        }
    }
}

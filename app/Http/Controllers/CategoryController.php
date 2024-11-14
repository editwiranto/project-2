<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function catView()
    {
        $all_category = Category::all();
        return view('ecommerce.category.category',compact('all_category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addCategoryView()
    {
        return view('ecommerce.category.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addCategory(Request $request)
    {
        $request->validate([
            'name_category' => 'required|string'
        ]);

        try {
            $catData = new Category();
            $catData->name_category = $request->name_category;
            $catData->save();

            return redirect('category')->with('success', 'Berhasil Tambah Data');
        } catch (\Exception $e) {
            return redirect('category')->with('fail', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function editCategoryView($id)
    {
        $editData = Category::find($id);

        return view('ecommerce.category.editCategory',compact('editData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editData(request $request)
    {
        $request->validate([
            'name_category' => 'required|string'
        ]);

        try {
            Category::where('id', $request->edit_id)->update([
                'name_category' => $request->name_category
            ]);

            return redirect('category')->with('success', 'Berhasil Edit Data');
        } catch (\Exception $e) {
            return redirect('category')->with('fail', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusCat($id)
    {
        try {
            Category::where('id',$id)->delete();
            return redirect('category')->with('success', 'Berhasil Tambah Data');
        } catch (\Exception $e) {
            return redirect('category')->with('fail', $e->getMessage());
        }
    }
}

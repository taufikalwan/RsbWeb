<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('parent')->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $main_categories = Category::whereNull('parent_id')->get(['id', 'name']);

        return view('admin.categories.create', compact('main_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
         if($request->validated()) {
            $image = $request->file('image')->store(
                'assets/categories', 'public'
            );
            Category::create($request->except('image') + ['image' => $image]);
         }

        return redirect()->route('admin.categories.index')->with([
            'message' => 'berhasil dibuat !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $main_categories = Category::whereNull('parent_id')->where('id','!=', $category->id)->get(['id', 'name']);

        return view('admin.categories.edit', compact('category', 'main_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if($request->validated()) {
            if($request->image){
                File::delete('storage/'. $category->image);
                $image = $request->file('image')->store('assets/categories', 'public'); 
                $category->update($request->except('image') + ['image' => $image]);   
            }else {
                $category->update($request->validated());   
            }
        }

        return redirect()->route('admin.categories.index')->with([
            'message' => 'berhasil di tambah !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        File::delete('storage/'. $category->image);
        $category->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di hapus !',
            'alert-type' => 'danger'
        ]);
    }
}

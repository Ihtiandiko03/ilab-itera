<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->authorize('admin');

        return view('dashboard.categories.index', [
            'categories' => Category::where('is_delete', 0)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'slug' => 'required|unique:posts'
        ]);

        Category::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Kategori berita berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */


    // public function destroy(Category $category)
    // {
    //     Category::destroy($category->id);

    //     return redirect('/dashboard/categories')->with('success', 'Kategori berhasil dihapus');
    // }

    public function editkategoriberita($slug)
    {
        $getData = Category::where('slug', $slug)->get();

        return view('dashboard.categories.edit', [
            'category' => $getData[0],
        ]);

    }

    public function updatekategoriberita(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'slug' => 'required|unique:posts'
        ]);

        Category::where('id', $_POST['key'])->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Kategori berita berhasil ditambah');
    }

    public function hapus($id)
    {
        Category::where('slug', $id)->update(['is_delete' => 1]);

        return redirect('/dashboard/categories')->with('success', 'Kategori berhasil dihapus');
    }
}

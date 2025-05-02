<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    $category= category::all();
    return view('kategori.data_kt', compact('category'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.form_kt');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|unique:kategoris,slug|max:255',
    ]);

    category::create([
        'name' => $request->name,
        'slug' => $request->slug,
    ]);

    return redirect()->route('kategori.data')->with('success', 'Kategori berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
      $category = category::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $category = category::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:kategoris,slug,' . $category->id,
    ]);

    $category->update([
        'name' => $request->name,
        'slug' => $request->slug,
    ]);

    return redirect()->route('kategori.data')->with('success', 'Kategori berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $category = category::findOrFail($id);
    $category->delete();

    return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
}

}

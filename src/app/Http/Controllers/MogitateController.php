<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MogitateController extends Controller
{
    public function index(Request $request)
   {
    $query = Product::query();

    if ($request->filled('keyword')){
        $query->where('name','LIKE','%' . $request->keyword . '%');
    }

    if ($request->sort === 'price_desc'){
        $query->orderBy('price','desc');
    } elseif ($request->sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        }

        $products = $query->paginate(6)->withQueryString();

        return view('index', compact('products'));
    }

    public function createForm()
    {
        $seasons = Season::all();
        return view('register', compact('seasons'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'price' => ['required', 'integer', 'between:0,10000'],
            'description' => ['required', 'max:120'],
            'image' => ['required', 'file', 'mimes:png,jpg,jpeg'],
            'season_ids' => ['required', 'array'],
            'season_ids.*' => ['integer', 'exists:seasons,id'],
        ]);

        $path = $request->file('image')->store('products', 'public');
        $validated['image'] = $path;

        $product = Product::create($validated);
        $product->seasons()->sync($validated['season_ids']);

        return redirect()->route('index');
    }

    public function show(Product $product)
    {
        $seasons = Season::all();
        $product->load('seasons');

        return view('detail', compact('product', 'seasons'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'price' => ['required', 'integer', 'between:0,10000'],
            'description' => ['required', 'max:120'],
            'image' => ['nullable', 'file', 'mimes:png,jpg,jpeg'],
            'season_ids' => ['required', 'array'],
            'season_ids.*' => ['integer', 'exists:seasons,id'],
        ]);

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        } else {
            unset($validated['image']);
        }

        $product->update($validated);
        $product->seasons()->sync($validated['season_ids']);

        return redirect()->route('products.show', $product->id);
    }

    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('index');
    }
}

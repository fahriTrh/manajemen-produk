<?php
namespace App\Services\Product;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\facades\Storage;

class ProductService {
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5',
            'image' => 'file|image|max:1024'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('product-images'); 
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['description']), 50, '...');


        
        Product::create($validatedData);
        return TRUE;
    }

    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|min:5',
            'image' => 'file|image|max:1024'
        ];

        $validatedData = $request->validate($rules);
        
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        Product::where('id', $product->id)->update($validatedData);
        return TRUE;
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }
        Product::destroy($product->id);
        return TRUE;
    }
}
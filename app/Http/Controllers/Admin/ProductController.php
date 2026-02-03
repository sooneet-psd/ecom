<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->latest()->paginate(10);
        $categories = Category::all();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::with('subCategories')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products,sku',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'weight' => 'required|numeric', // Important for shipping
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'main_image' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = $this->generateUniqueSlug($request->name);
        // Toggle handling
        $data['is_order_now_enabled'] = $request->has('is_order_now_enabled');
        
        // Carousel options handling
        $data['is_new_arrival'] = $request->has('is_new_arrival');
        $data['is_featured'] = $request->has('is_featured');
        $data['is_recommended'] = $request->has('is_recommended');
        $data['is_on_sale'] = $request->has('is_on_sale');
        $data['carousel_priority'] = $request->input('carousel_priority', 0);

        // Main Image Upload
        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('products', 'public');
            $data['main_image'] = '/storage/' . $path;
        }

        // Multiple Images Upload
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $imagePaths[] = '/storage/' . $path;
            }
            $data['images'] = $imagePaths;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::with('subCategories')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products,sku,' . $product->id,
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'weight' => 'required|numeric',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'main_image' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->name !== $product->name) {
            $data['slug'] = $this->generateUniqueSlug($request->name, $product->id);
        }
        $data['is_order_now_enabled'] = $request->has('is_order_now_enabled');
        
        // Carousel options handling
        $data['is_new_arrival'] = $request->has('is_new_arrival');
        $data['is_featured'] = $request->has('is_featured');
        $data['is_recommended'] = $request->has('is_recommended');
        $data['is_on_sale'] = $request->has('is_on_sale');
        $data['carousel_priority'] = $request->input('carousel_priority', 0);

        // Main Image Upload
        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('products', 'public');
            $data['main_image'] = '/storage/' . $path;
        }

        // Multiple Images Upload
        if ($request->hasFile('images')) {
            $imagePaths = $product->images ?? [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $imagePaths[] = '/storage/' . $path;
            }
            $data['images'] = $imagePaths;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
    }

    /**
     * Generate a unique slug for the product.
     */
    private function generateUniqueSlug(string $name, ?int $excludeId = null): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        while (true) {
            $query = Product::where('slug', $slug);
            
            if ($excludeId) {
                $query->where('id', '!=', $excludeId);
            }

            if (!$query->exists()) {
                break;
            }

            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}

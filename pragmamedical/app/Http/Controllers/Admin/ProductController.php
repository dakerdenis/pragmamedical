<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private const IMAGE_FIELDS = ['main_image', 'image_1', 'image_2', 'image_3', 'image_4'];

    private function imageRules(): array
    {
        return ['nullable', 'image', 'mimes:jpeg,png,webp', 'max:2048'];
    }

    private function baseRules(): array
    {
        return [
            'title_az'        => ['required', 'string', 'max:255'],
            'title_ru'        => ['required', 'string', 'max:255'],
            'title_en'        => ['required', 'string', 'max:255'],
            'price'           => ['nullable', 'numeric', 'min:0'],
            'description_az'  => ['nullable', 'string'],
            'description_ru'  => ['nullable', 'string'],
            'description_en'  => ['nullable', 'string'],
            'usage_az'        => ['nullable', 'string'],
            'usage_ru'        => ['nullable', 'string'],
            'usage_en'        => ['nullable', 'string'],
            'indications_az'  => ['nullable', 'string'],
            'indications_ru'  => ['nullable', 'string'],
            'indications_en'  => ['nullable', 'string'],
        ];
    }

    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $rules = $this->baseRules();
        foreach (self::IMAGE_FIELDS as $field) {
            $rules[$field] = $this->imageRules();
        }

        $data = $request->validate($rules);

        foreach (self::IMAGE_FIELDS as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('products', 'public');
            }
        }

        Product::create($data);

        return redirect()->route('admin.products')->with('success', 'Товар добавлен.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.create', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $rules = $this->baseRules();
        foreach (self::IMAGE_FIELDS as $field) {
            $rules[$field] = $this->imageRules();
        }

        $data = $request->validate($rules);

        foreach (self::IMAGE_FIELDS as $field) {
            if ($request->hasFile($field)) {
                if ($product->$field) {
                    Storage::disk('public')->delete($product->$field);
                }
                $data[$field] = $request->file($field)->store('products', 'public');
            } else {
                unset($data[$field]);
            }
        }

        $product->update($data);

        return redirect()->route('admin.products')->with('success', 'Товар обновлён.');
    }

    public function destroy(Product $product)
    {
        foreach (self::IMAGE_FIELDS as $field) {
            if ($product->$field) {
                Storage::disk('public')->delete($product->$field);
            }
        }

        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Товар удалён.');
    }
}
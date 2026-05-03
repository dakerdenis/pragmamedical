<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    private const IMAGE_FIELDS = ['main_image', 'image_1', 'image_2', 'image_3', 'image_4'];

    private function imageRules(): array
    {
        return ['nullable', 'image', 'mimes:jpeg,png,webp', 'max:2048'];
    }

    public function index()
    {
        $posts = BlogPost::latest()->get();
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title_az'        => ['required', 'string', 'max:255'],
            'title_ru'        => ['required', 'string', 'max:255'],
            'title_en'        => ['required', 'string', 'max:255'],
            'published_date'  => ['nullable', 'date'],
            'description_az'  => ['nullable', 'string'],
            'description_ru'  => ['nullable', 'string'],
            'description_en'  => ['nullable', 'string'],
        ];

        foreach (self::IMAGE_FIELDS as $field) {
            $rules[$field] = $this->imageRules();
        }

        $data = $request->validate($rules);

        foreach (self::IMAGE_FIELDS as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('blog', 'public');
            }
        }

        BlogPost::create($data);

        return redirect()->route('admin.blog')->with('success', 'Статья добавлена.');
    }

    public function edit(BlogPost $post)
    {
        return view('admin.blog.edit', compact('post'));
    }

    public function update(Request $request, BlogPost $post)
    {
        $rules = [
            'title_az'        => ['required', 'string', 'max:255'],
            'title_ru'        => ['required', 'string', 'max:255'],
            'title_en'        => ['required', 'string', 'max:255'],
            'published_date'  => ['nullable', 'date'],
            'description_az'  => ['nullable', 'string'],
            'description_ru'  => ['nullable', 'string'],
            'description_en'  => ['nullable', 'string'],
        ];

        foreach (self::IMAGE_FIELDS as $field) {
            $rules[$field] = $this->imageRules();
        }

        $data = $request->validate($rules);

        foreach (self::IMAGE_FIELDS as $field) {
            if ($request->hasFile($field)) {
                // Delete old file
                if ($post->$field) {
                    Storage::disk('public')->delete($post->$field);
                }
                $data[$field] = $request->file($field)->store('blog', 'public');
            } else {
                // Don't overwrite existing image with null
                unset($data[$field]);
            }
        }

        $post->update($data);

        return redirect()->route('admin.blog')->with('success', 'Статья обновлена.');
    }

    public function destroy(BlogPost $post)
    {
        foreach (self::IMAGE_FIELDS as $field) {
            if ($post->$field) {
                Storage::disk('public')->delete($post->$field);
            }
        }

        $post->delete();

        return redirect()->route('admin.blog')->with('success', 'Статья удалена.');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\TranslationHelper;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $translations = TranslationHelper::all();

        // Group by prefix (header, footer, home, etc.)
        $groups = [];
        foreach ($translations as $key => $values) {
            $prefix = explode('.', $key)[0] ?? 'other';
            $groups[$prefix][$key] = $values;
        }

        return view('admin.pages.index', compact('groups'));
    }

    public function update(Request $request)
    {
        $translations = TranslationHelper::all();
        $input = $request->input('trans', []);

        foreach ($input as $key => $langs) {
            if (isset($translations[$key])) {
                foreach (['az', 'ru', 'en'] as $lang) {
                    $translations[$key][$lang] = $langs[$lang] ?? '';
                }
            }
        }

        TranslationHelper::save($translations);

        return redirect()->route('admin.pages')->with('success', 'Tərcümələr yadda saxlanıldı.');
    }
}
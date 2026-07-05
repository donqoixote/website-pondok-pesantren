<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function __invoke()
    {
        $galleries = Gallery::orderByDesc('created_at')->get();

        return view('pages.galeri', compact('galleries'));
    }

    public function show(Gallery $gallery)
    {
        return view('pages.galeri-show', compact('gallery'));
    }
}

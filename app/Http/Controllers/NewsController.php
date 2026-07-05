<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::published()
            ->orderByDesc('published_at')
            ->paginate(6);

        return view('pages.berita', compact('news'));
    }

    public function show(News $berita)
    {
        abort_unless($berita->is_published, 404);

        return view('pages.berita-show', ['item' => $berita]);
    }
}

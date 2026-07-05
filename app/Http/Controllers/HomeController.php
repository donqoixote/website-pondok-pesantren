<?php

namespace App\Http\Controllers;

use App\Models\News;

class HomeController extends Controller
{
    public function __invoke()
    {
        $news = News::published()
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('pages.home', compact('news'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Concerns\ValidatesPublicForms;
use App\Models\KaryaSantri;
use Illuminate\Http\Request;

class KaryaSantriController extends Controller
{
    use ValidatesPublicForms;

    public function index(Request $request)
    {
        $category = $request->query('kategori');

        $query = KaryaSantri::approved()->orderByDesc('created_at');

        if ($category) {
            $query->where('category', $category);
        }

        $karya = $query->paginate(9)->withQueryString();

        return view('pages.karya-santri.index', compact('karya', 'category'));
    }

    public function create()
    {
        return view('pages.karya-santri.tulis');
    }

    public function store(Request $request)
    {
        $this->rejectIfHoneypotFilled($request);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'class' => 'nullable|string|max:255',
            'category' => 'required|in:Puisi,Cerpen,Kaligrafi,Opini,Lainnya',
            'content' => 'required_without:image_path|nullable|string|max:50000',
            'image_path' => 'nullable|image|max:5120',
            'website' => 'nullable|max:0',
        ]);

        $data = [
            'title' => $validated['title'],
            'author' => $validated['author'],
            'class' => $validated['class'] ?? null,
            'category' => $validated['category'],
            'content' => $validated['content'] ?? null,
            'is_approved' => false,
        ];

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('karya', 'public');
        }

        KaryaSantri::create($data);

        return back()->with('success', 'Karya Anda telah berhasil dikirim! Karya Anda akan ditinjau oleh Admin terlebih dahulu sebelum dipublikasikan.');
    }
}

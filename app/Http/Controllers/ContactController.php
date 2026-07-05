<?php

namespace App\Http\Controllers;

use App\Http\Concerns\ValidatesPublicForms;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use ValidatesPublicForms;

    public function index()
    {
        return view('pages.kontak');
    }

    public function store(Request $request)
    {
        $this->rejectIfHoneypotFilled($request);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'pesan' => 'required|string|max:5000',
            'website' => 'nullable|max:0',
        ]);

        ContactMessage::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'] ?? null,
            'pesan' => $validated['pesan'],
        ]);

        return back()->with('success', 'Terima kasih, pesan Anda telah berhasil dikirim!');
    }
}

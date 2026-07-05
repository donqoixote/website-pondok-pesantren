<?php

namespace App\Http\Controllers;

use App\Http\Concerns\ValidatesPublicForms;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    use ValidatesPublicForms;

    public function index()
    {
        return view('pages.pendaftaran');
    }

    public function store(Request $request)
    {
        $this->rejectIfHoneypotFilled($request);

        $validated = $request->validate([
            'nama_santri' => 'required|string|max:255',
            'jenjang' => 'required|in:mts,ma',
            'ttl' => 'nullable|string|max:255',
            'nama_ortu' => 'nullable|string|max:255',
            'hp' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:2000',
            'website' => 'nullable|max:0',
        ]);

        Registration::create($validated);

        return back()->with('success', 'Pendaftaran online Anda telah berhasil dikirim! Silakan tunggu konfirmasi panitia melalui WhatsApp.');
    }

    public function status(Request $request)
    {
        $hp = trim($request->query('hp', ''));
        $registrations = collect();

        if ($hp !== '') {
            $query = Registration::query();
            
            // Bersihkan karakter non-digit
            $cleanHp = preg_replace('/\D/', '', $hp);
            
            if (strlen($cleanHp) >= 9) {
                $lastDigits = substr($cleanHp, -9);
                $query->where('hp', 'like', '%' . $lastDigits);
            } else {
                $query->where('hp', $hp);
            }
            
            $registrations = $query->orderByDesc('created_at')->get();
        }

        return view('pages.pendaftaran-status', compact('registrations', 'hp'));
    }
}

<?php

namespace App\Http\Concerns;

use Illuminate\Http\Request;

trait ValidatesPublicForms
{
    protected function rejectIfHoneypotFilled(Request $request): void
    {
        if ($request->filled('website')) {
            abort(422, 'Permintaan tidak valid.');
        }
    }
}

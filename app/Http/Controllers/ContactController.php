<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'business' => ['required', 'string', 'max:150'],
            'project_type' => ['nullable', 'string', 'max:100'],
            'budget' => ['nullable', 'string', 'max:100'],
            'contact_preference' => ['nullable', 'string', 'max:50'],
            'message' => ['required', 'string', 'max:1000'],
            'website' => ['nullable', 'prohibited'],
        ]);

        Log::info('Nuevo mensaje de contacto', $data);

        return back()->with('success', 'Gracias por tu mensaje. Te contactaré pronto.');
    }

    public function showForm()
    {
        return view('contacto');
    }
}

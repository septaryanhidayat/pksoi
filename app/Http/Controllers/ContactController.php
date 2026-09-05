<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Post;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function hubungi()
    {
        $page = Post::pages()->where('slug', 'hubungi')->first();
        return view('frontend.hubungi.index', compact('page'));
    }

    public function submitFeedback(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'nullable|email|max:150',
            'whatsapp' => 'nullable|string|max:30',
            'saran_kritik' => 'required|string|max:2000',
        ]);

        Feedback::create([
            'name' => $validated['nama'],
            'email' => $validated['email'] ?? null,
            'whatsapp' => $validated['whatsapp'] ?? null,
            'message' => $validated['saran_kritik'],
            'status' => 'unread',
        ]);

        return redirect()->route('hubungi')->with('success', 'Terima kasih! Pesan, kritik, dan saran Anda telah berhasil dikirimkan kepada Pengurus DPD PKS Ogan Ilir.');
    }

    public function donasi()
    {
        $page = Post::pages()->where('slug', 'donasi')->first();
        return view('frontend.donasi.index', compact('page'));
    }
}

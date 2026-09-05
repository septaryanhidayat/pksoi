<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\AnggotaDewan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminDewanController extends Controller
{
    public function index()
    {
        $dewan = AnggotaDewan::orderBy('order', 'asc')->get();
        return view('admin.dewan.index', compact('dewan'));
    }

    public function create()
    {
        return view('admin.dewan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'fraction' => 'nullable|string|max:255',
            'profile_summary' => 'nullable|string',
            'education' => 'nullable|string',
            'order' => 'nullable|integer',
            'photo' => 'nullable|image|max:3072',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . Str::slug($validated['name']) . '.webp';
            $file->move(public_path('uploads/dewan'), $filename);
            $photoPath = '/uploads/dewan/' . $filename;
        }

        $dewan = AnggotaDewan::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'position' => $validated['position'],
            'fraction' => $validated['fraction'] ?? 'Fraksi PKS DPRD Ogan Ilir',
            'profile_summary' => $validated['profile_summary'] ?? '',
            'education' => $validated['education'] ?? '',
            'photo' => $photoPath ?? '/uploads/2025/09/cropped-logo-thumbnail.webp',
            'order' => $validated['order'] ?? 0,
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'action' => 'dewan_create',
            'description' => "Menambahkan data Anggota Dewan: {$dewan->name}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'info',
        ]);

        return redirect()->route('admin.dewan.index')->with('success', 'Data Anggota Dewan berhasil ditambahkan.');
    }

    public function edit(AnggotaDewan $dewan)
    {
        return view('admin.dewan.edit', compact('dewan'));
    }

    public function update(Request $request, AnggotaDewan $dewan)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'fraction' => 'nullable|string|max:255',
            'profile_summary' => 'nullable|string',
            'education' => 'nullable|string',
            'order' => 'nullable|integer',
            'photo' => 'nullable|image|max:3072',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . Str::slug($validated['name']) . '.webp';
            $file->move(public_path('uploads/dewan'), $filename);
            $dewan->photo = '/uploads/dewan/' . $filename;
        }

        $dewan->name = $validated['name'];
        $dewan->position = $validated['position'];
        $dewan->fraction = $validated['fraction'] ?? 'Fraksi PKS DPRD Ogan Ilir';
        $dewan->profile_summary = $validated['profile_summary'] ?? '';
        $dewan->education = $validated['education'] ?? '';
        $dewan->order = $validated['order'] ?? 0;
        $dewan->save();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'action' => 'dewan_update',
            'description' => "Memperbarui data Anggota Dewan: {$dewan->name}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'info',
        ]);

        return redirect()->route('admin.dewan.index')->with('success', 'Data Anggota Dewan berhasil diperbarui.');
    }

    public function destroy(Request $request, AnggotaDewan $dewan)
    {
        $name = $dewan->name;
        $dewan->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'action' => 'dewan_delete',
            'description' => "Menghapus data Anggota Dewan: {$name}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'warning',
        ]);

        return redirect()->route('admin.dewan.index')->with('success', 'Data Anggota Dewan berhasil dihapus.');
    }
}

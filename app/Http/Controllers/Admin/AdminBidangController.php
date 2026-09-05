<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Bidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminBidangController extends Controller
{
    public function index()
    {
        $bidangs = Bidang::orderBy('order', 'asc')->get();
        return view('admin.bidang.index', compact('bidangs'));
    }

    public function create()
    {
        return view('admin.bidang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'icon' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $bidang = Bidang::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'] ?? '',
            'address' => $validated['address'] ?? '',
            'phone' => $validated['phone'] ?? '',
            'email' => $validated['email'] ?? '',
            'icon' => $validated['icon'] ?? 'fa-solid fa-users',
            'order' => $validated['order'] ?? 0,
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'action' => 'bidang_create',
            'description' => "Menambahkan Bidang DPD: {$bidang->name}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'info',
        ]);

        return redirect()->route('admin.bidang.index')->with('success', 'Bidang DPD berhasil ditambahkan.');
    }

    public function edit(Bidang $bidang)
    {
        return view('admin.bidang.edit', compact('bidang'));
    }

    public function update(Request $request, Bidang $bidang)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'icon' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $bidang->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? '',
            'address' => $validated['address'] ?? '',
            'phone' => $validated['phone'] ?? '',
            'email' => $validated['email'] ?? '',
            'icon' => $validated['icon'] ?? 'fa-solid fa-users',
            'order' => $validated['order'] ?? 0,
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'action' => 'bidang_update',
            'description' => "Memperbarui Bidang DPD: {$bidang->name}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'info',
        ]);

        return redirect()->route('admin.bidang.index')->with('success', 'Bidang DPD berhasil diperbarui.');
    }

    public function destroy(Request $request, Bidang $bidang)
    {
        $name = $bidang->name;
        $bidang->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'action' => 'bidang_delete',
            'description' => "Menghapus Bidang DPD: {$name}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'warning',
        ]);

        return redirect()->route('admin.bidang.index')->with('success', 'Bidang DPD berhasil dihapus.');
    }
}

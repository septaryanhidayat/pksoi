<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminSettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', 'og_image_file', 'site_logo_file']);

        // Handle OG Image file upload
        if ($request->hasFile('og_image_file')) {
            $file = $request->file('og_image_file');
            $filename = 'og_' . time() . '.png';
            $file->move(public_path('uploads/settings'), $filename);
            $data['og_image'] = '/uploads/settings/' . $filename;
        }

        // Handle Site Logo file upload
        if ($request->hasFile('site_logo_file')) {
            $file = $request->file('site_logo_file');
            $filename = 'logo_' . time() . '.png';
            $file->move(public_path('uploads/settings'), $filename);
            $data['site_logo'] = '/uploads/settings/' . $filename;
        }

        foreach ($data as $key => $val) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $val ?? '', 'group' => 'general']
            );
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'action' => 'settings_update',
            'description' => 'Memperbarui konfigurasi website dan pengaturan SEO & OpenGraph',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'info',
        ]);

        return back()->with('success', 'Pengaturan website dan SEO berhasil disimpan!');
    }
}

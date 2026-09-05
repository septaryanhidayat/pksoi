<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $val) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $val, 'group' => 'general']
            );
        }

        return back()->with('success', 'Pengaturan website berhasil diperbarui!');
    }
}

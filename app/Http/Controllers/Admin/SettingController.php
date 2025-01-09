<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        // Mengambil data settings
        $settings = Setting::all();

        // Mengirimkan data settings ke view
        return view('admin.settings.index', compact('settings'));
    }
    
    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan pengaturan baru
        $validated = $request->validate([
            'name' => 'required|string',
            'value' => 'required|string',
        ]);

        Setting::create($validated);

        return redirect()->route('admin.settings.index');
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        // Validasi dan perbarui pengaturan
        $validated = $request->validate([
            'name' => 'required|string',
            'value' => 'required|string',
        ]);

        $setting->update($validated);

        return redirect()->route('admin.settings.index');
    }

    public function destroy(Setting $setting)
    {
        // Hapus pengaturan
        $setting->delete();

        return redirect()->route('admin.settings.index');
    }
}

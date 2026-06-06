<?php

namespace App\Http\Controllers\Admin;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function edit()
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'company_email' => 'nullable|email',
            'company_phone' => 'nullable|string|max:20',
            'company_address' => 'nullable|string',
            'company_hours' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'whatsapp_link' => 'nullable|url|max:500',
            'instagram_link' => 'nullable|url|max:500',
            'facebook_link' => 'nullable|url|max:500',
            'twitter_link' => 'nullable|url|max:500',
            'map_embed' => 'nullable|string',
            'doctor_name' => 'nullable|string|max:255',
            'doctor_title' => 'nullable|string|max:255',
            'doctor_description' => 'nullable|string',
            'doctor_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            'doctor_show' => 'nullable|string',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logo', 'public');
            $this->saveSetting('logo_path', $logoPath);
        }

        // Handle doctor photo upload
        if ($request->hasFile('doctor_photo')) {
            $doctorPhotoPath = $request->file('doctor_photo')->store('doctors', 'public');
            $this->saveSetting('doctor_photo_path', $doctorPhotoPath);
        }

        // Save other settings
        $this->saveSetting('company_name', $validated['company_name'] ?? null);
        $this->saveSetting('company_email', $validated['company_email'] ?? null);
        $this->saveSetting('company_phone', $validated['company_phone'] ?? null);
        $this->saveSetting('company_address', $validated['company_address'] ?? null);
        $this->saveSetting('company_hours', $validated['company_hours'] ?? null);
        $this->saveSetting('whatsapp_link', $validated['whatsapp_link'] ?? null);
        $this->saveSetting('instagram_link', $validated['instagram_link'] ?? null);
        $this->saveSetting('facebook_link', $validated['facebook_link'] ?? null);
        $this->saveSetting('twitter_link', $validated['twitter_link'] ?? null);
        $this->saveSetting('map_embed', $validated['map_embed'] ?? null);
        $this->saveSetting('doctor_name', $validated['doctor_name'] ?? null);
        $this->saveSetting('doctor_title', $validated['doctor_title'] ?? null);
        $this->saveSetting('doctor_description', $validated['doctor_description'] ?? null);
        $this->saveSetting('doctor_show', ($request->input('doctor_show') === '1') ? '1' : '0');

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully!');
    }

    private function saveSetting($key, $value)
    {
        SiteSetting::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}

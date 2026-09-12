<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('backend.setting.setting')
            ->with('setting', Setting::first());
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        $request->validate([
            'logo' => 'required',
            'email' => 'nullable|email',
            'youtube' => 'nullable|url',
            'instagram' => 'nullable|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $setting->logo = $request->logo;
        $setting->email = $request->email;
        $setting->youtube = $request->youtube;
        $setting->instagram = $request->instagram;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->phone = $request->phone;
        $setting->address = $request->address;

        $setting->save();
        Session()->flash('success', 'Setting updated successfully');
        return redirect()->back();
    }
}

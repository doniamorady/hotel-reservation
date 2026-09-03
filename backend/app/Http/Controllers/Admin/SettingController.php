<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Setting\UpdateSettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('admin.setting.index', compact('settings'));
    }

    public function update(UpdateSettingRequest $request)
    {
        $data = $request->validated();
        $setting = Setting::first();
            $setting->update($data);

        return redirect()->route('admin.setting.index')->with('toast-success', 'تنظیمات با موفقیت ذخیره شد');
    }
}

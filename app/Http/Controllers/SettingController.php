<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\Setting\UpdateSettingRequest;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $settings = Setting::first();
        return  new SettingResource($settings);
    }

    public function update(UpdateSettingRequest $request)
    {
        $inputs = $request->validated();

        $setting = Setting::first();

        $setting->update($inputs);

        return new SettingResource($setting);
    }
}

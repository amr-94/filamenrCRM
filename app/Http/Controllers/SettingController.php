<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = GeneralSetting::first();
        return $settings;
    }
}

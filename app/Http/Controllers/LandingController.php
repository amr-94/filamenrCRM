<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\PricingPlan;
use App\Models\ReachUs;
use App\Models\GeneralSetting;
use App\Models\FeatureSection;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => GeneralSetting::first(),
            'monthly_plans' => PricingPlan::where('is_active', true)->where('period', 'monthly')->orderBy('order')->get(),
            'yearly_plans' => PricingPlan::where('is_active', true)->where('period', 'yearly')->orderBy('order')->get(),
            'faqs' => Faq::where('is_active', true)->orderBy('order')->get(),
            'reach_us' => ReachUs::where('is_active', true)->orderBy('order')->get(),
            'feature_sections' => FeatureSection::with('items')->where('is_active', true)->orderBy('order')->get(),
        ];

        return response()->json($data);
    }
}

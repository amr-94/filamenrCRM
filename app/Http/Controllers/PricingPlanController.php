<?php

namespace App\Http\Controllers;

use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingPlanController extends Controller
{
    public function index()
    {
        $monthly_plans = PricingPlan::where('is_active', true)
            ->where('period', 'monthly')
            ->orderBy('order')
            ->get();

        $yearly_plans = PricingPlan::where('is_active', true)
            ->where('period', 'yearly')
            ->orderBy('order')
            ->get();

        return response()->json([
            'monthly_plans' => $monthly_plans,
            'yearly_plans' => $yearly_plans,
        ]);
    }
}

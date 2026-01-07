<?php

namespace App\Http\Controllers;

use App\Models\ReachUs;
use Illuminate\Http\Request;

class ReachUsController extends Controller
{
    public function index()
    {
        $reachUs = ReachUs::where('is_active', true)->orderBy('order')->get();
        return $reachUs;
    }
}

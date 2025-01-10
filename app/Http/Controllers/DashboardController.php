<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForecastUnit;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $forecastUnits = ForecastUnit::where('user_id', Auth::id())->get();
        return view('dashboard', compact('forecastUnits'));
    }
}
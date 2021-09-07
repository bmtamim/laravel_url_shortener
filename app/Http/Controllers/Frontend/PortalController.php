<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index(): View
    {
        $packages = Package::query()->where('status', true)->take(3)->get();
        return view('frontend.dashboard.portal.index', compact('packages'));
    }
}

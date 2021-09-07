<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __invoke(Request $request): View
    {
        $links = Link::query()->whereBetween('updated_at', [now()->subDays(7), now()])->get();
        $clicks = [];
        $clicks[] = $this->sumCLicks($links, now()->subDays(6));
        $clicks[] = $this->sumCLicks($links, now()->subDays(5));
        $clicks[] = $this->sumCLicks($links, now()->subDays(4));
        $clicks[] = $this->sumCLicks($links, now()->subDays(3));
        $clicks[] = $this->sumCLicks($links, now()->subDays(2));
        $clicks[] = $this->sumCLicks($links, now()->subDays(1));
        $clicks[] = $this->sumCLicks($links, now());

        return view('frontend.dashboard.dashboard', compact('clicks'));
    }

    public function sumCLicks($links, $date): int
    {
        return $links->filter(function ($item) use ($date) {
            return $item->where('updated_at', $date);
        })->sum('clicks');
    }
}

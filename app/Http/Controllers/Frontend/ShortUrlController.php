<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'link' => ['required', 'string', 'url'],
        ]);

        $links = Link::query()->get();

        $link = Link::create([
            'code' => $this->generateCode($links),
            'link' => $request->input('link'),
        ]);

        $shortedLink = config('app.url') . '/' . $link->code;

        return response()->json($shortedLink);
    }

    private function generateCode($links): string
    {
        $code = Str::random(8);

        if ($links->where('code', $code)->count() > 0) {
            $this->generateCode($links);
        }

        return $code;
    }
}

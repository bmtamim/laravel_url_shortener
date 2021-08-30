<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShortUrlRequest;
use App\Models\Link;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    public function store(ShortUrlRequest $request): JsonResponse
    {
        $links = Link::query()->get();

        $link = Link::create([
            'code' => $this->generateCode($links),
            'link' => $request->input('link'),
        ]);

        $shortedLink = config('app.url') . '/' . $link->code;

        return response()->json([
            'link'       => $shortedLink,
            'link_count' => Link::query()->count(),
        ]);
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

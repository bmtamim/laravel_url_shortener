<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class RedirectUrlController extends Controller
{
    public function __invoke($code)
    {
        $link = Link::query()->where('code', $code)->firstOrFail();

        $link->increment('clicks');

        return redirect()->to($link->link);
    }
}

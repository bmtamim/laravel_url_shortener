<?php

namespace App\Http\Controllers\Frontend;

use App\Actions\ShortUrlAction;
use App\DTO\ShortUrlDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShortUrlRequest;
use Illuminate\Http\JsonResponse;

class ShortUrlController extends Controller
{
    public function store(ShortUrlRequest $request, ShortUrlAction $action): JsonResponse
    {

        $response = $action->create(ShortUrlDTO::createFromRequest($request));

        return response()->json($response);

    }

}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\ShortUrlAction;
use App\DTO\ShortUrlDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShortUrlRequest;
use App\Models\Link;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{

    public function index()
    {
        $links = Link::query()->where('user_id', Auth::id())->orWhere('user_ip', request()->ip())->get();

        return view('frontend.dashboard.link.index', compact('links'));
    }


    public function create()
    {
        return view('frontend.dashboard.link.create');
    }


    public function store(ShortUrlRequest $request, ShortUrlAction $action): JsonResponse
    {
        $response = $action->create(ShortUrlDTO::createFromRequest($request));
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

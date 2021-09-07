<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfileRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index(): View
    {
        return view('frontend.dashboard.user.profile');
    }


    public function update(ProfileRequest $request, $id)
    {
        //
    }

}

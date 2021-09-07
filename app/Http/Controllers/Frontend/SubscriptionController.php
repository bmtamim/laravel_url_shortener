<?php

namespace App\Http\Controllers\Frontend;

use App\Actions\CheckoutAction;
use App\Contracts\PaymentMethod;
use App\DTO\CheckoutDTO;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\Payment\StripeController;
use App\Http\Requests\CheckoutRequest;
use App\Models\Package;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index($slug)
    {
        $package = Package::query()->where(['slug' => $slug, 'status' => true])->firstOrFail();
        return view('frontend.core.checkout', compact('package'));
    }

    public function store(CheckoutRequest $request, Package $package, CheckoutAction $action)
    {
        try {
            $action(CheckoutDTO::createFromRequest($request), $package);
            return redirect()->route('user.dashboard');
        } catch (\Exception $exception) {
            dd($exception);
        }
    }
}

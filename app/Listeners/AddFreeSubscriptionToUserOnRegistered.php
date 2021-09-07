<?php

namespace App\Listeners;

use App\Models\Package;
use App\Models\Subscription;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;

class AddFreeSubscriptionToUserOnRegistered
{
    private $package;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->package = Package::query()->where(['slug' => 'free'])->first();
    }

    /**
     * Handle the event.
     *
     * @param Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $ends_at = Carbon::now()->addMonths(12);
        if ($this->package->billing_type == 'monthly') {
            $ends_at = Carbon::now()->addMonth();
        } elseif ($this->package->billing_type == 'monthly') {
            $ends_at = Carbon::now()->addMonths(6);
        } elseif ($this->package->billing_type == 'yearly') {
            $ends_at = Carbon::now()->addMonths(12);
        }

        Subscription::query()->create([
            'user_id'       => $event->user->id,
            'package_id'    => $this->package->id,
            'package_name'  => $this->package->name,
            'package_price' => $this->package->price,
            'billing_type'  => $this->package->billing_type,
            'links_limit'   => $this->package->links_limit,
            'links_period'  => $this->package->links_period,
            'currency'      => $this->package->currency,
            'start_at'      => Carbon::now(),
            'end_at'        => $ends_at,
            'status'        => 'active',
        ]);
    }
}

<?php


namespace App\Services;


use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class checkLinksLimit
{
    private $links;

    public function __construct($links)
    {
        $this->links = $links;
        $this->check();
    }

    public function check()
    {
        if (!Auth::check() && $this->links->count() >= 2) {
            throw ValidationException::withMessages([
                'link' => "You have reached your limit. <a href=" . route('pricing.index') . ">Upgrade Plan</a>",
            ]);
        } elseif (Auth::check() && Auth::user()->linksLimit() <= $this->links->count()) {
            throw ValidationException::withMessages([
                'link' => "You have reached your limit. <a href=" . route('pricing.index') . ">Upgrade Plan</a>",
            ]);
        }
    }
}

<?php


namespace App\Actions;


use App\DTO\ShortUrlDTO;
use App\Models\Link;
use App\Services\checkLinksLimit;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ShortUrlAction
{
    public function create(ShortUrlDTO $DTO): array
    {
        $links = Link::query()->where('user_ip', $DTO->user_ip)
            ->when(Auth::check(), function ($query) {
                $query->orWhere('user_id', Auth::id());
            })->get()->filter(function ($link) {
                return Carbon::parse($link->created_at)->isCurrentMonth();
            });

        (new checkLinksLimit($links));

        $link = Link::create($DTO->toArray());

        $shortedLink = generateShortLink($link->code);

        return [
            'link'       => $shortedLink,
            'link_count' => $DTO::$links->count() + 1,
        ];
    }
}

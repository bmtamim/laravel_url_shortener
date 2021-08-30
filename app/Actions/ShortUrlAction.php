<?php


namespace App\Actions;


use App\DTO\ShortUrlDTO;
use App\Models\Link;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ShortUrlAction
{
    public function create(ShortUrlDTO $DTO): array
    {
        if ($DTO::$links->where('user_ip', $DTO->user_ip)->count() >= 20) {
            throw ValidationException::withMessages([
                'link' => "You have reached your free plan limit. <a href='#'>Please Upgrade</a>",
            ]);
        }

        $link = Link::create($DTO->toArray());

        $shortedLink = generateShortLink($link->code);

        return [
            'link'       => $shortedLink,
            'link_count' => $DTO::$links->count() + 1,
        ];
    }
}

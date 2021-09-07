<?php


namespace App\DTO;


use App\Http\Requests\ShortUrlRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\DataTransferObject\DataTransferObject;

class ShortUrlDTO extends DataTransferObject
{
    public $user_id;
    public $user_ip;
    public $code;
    public $link;
    public static $links;

    public static function createFromRequest(ShortUrlRequest $request): ShortUrlDTO
    {
        self::$links = DB::table('links')->select('id', 'user_id', 'user_ip', 'code', 'created_at')->get();
        $data = [
            'user_id' => Auth::check() ? Auth::id() : null,
            'user_ip' => $request->ip(),
            'code'    => self::generateCode(self::$links),
            'link'    => $request->input('link'),
        ];
        return new self($data);
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'user_ip' => $this->user_ip,
            'code'    => $this->code,
            'link'    => $this->link,
        ];
    }

    private static function generateCode($links): string
    {
        $code = Str::random(8);

        if ($links->where('code', $code)->count() > 0) {
            self::generateCode($links);
        }

        return $code;
    }
}

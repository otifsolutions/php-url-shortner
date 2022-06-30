<?php

namespace OTIFSolutions\ShortUrlApp\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Self_;

class ShortUrl extends \Illuminate\Database\Eloquent\Model {
    use HasFactory;

    protected $guarded = ['id'];

    public function trackers() {
        return $this->hasMany(Tracker::class, 'short_url_id');
    }

    /**
     * Set a value in the table.
     * Default Type : 'STRING'
     *
     * @param $url
     *
     */
    public static function set($url) {
        self::updateOrCreate(
            ['url' => $url],
            ['url' => ($url),
             'code' => Str::random(7)]);
    }

    /**
     * Get a value parsed in the type for a given url. Null if not exists
     *
     * @param $url
     * @return mixed|null
     */
    public static function get($url) {
        $item = self::where('url', $url)->first();
        if ($item) {
            return response()->json($item);
        } else
            return null;

    }

    /**
     * Delete url from database by key.
     *
     * @param $url
     * @return bool|null
     */
    public static function remove($url) {
        return self::where('url', $url)->delete();
    }

}

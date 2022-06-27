<?php

namespace OTIFSolutions\ShortUrlApp\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class ShortUrl extends \Illuminate\Database\Eloquent\Model {
    use HasFactory;

    protected $guarded = ['id'];

    public function trackers() {

        return $this->hasMany(Tracker::class, 'short_url_id');
    }

    /**
     * Get a value parsed in the type for a given key. Null if not exists
     *
     * @param $key
     * @return mixed|null
     */
    public static function get($key) {
        $item = self::where('key', $key)->first();
        if ($item) {
            return self::cast(Crypt::decryptString($item['value']), $item['type']);
        }
        return null;
    }

    /**
     * Set a value in the settings table.
     * Type can be : 'STRING','BOOL','INT','JSON','DOUBLE'
     * Default Type : 'STRING'
     *
     * @param $key
     * @param $value
     *
     */
    public static function set($key, $value) {
        self::updateOrCreate([
            'key' => $key],
            ['value' => ($value),
                'code' => Str::random(5)]);
    }

    /**
     * Delete Setting from database by key.
     *
     * @param $key
     * @return bool|null
     */
    public static function remove($key) {
        return self::where('key', $key)->delete();
    }

}

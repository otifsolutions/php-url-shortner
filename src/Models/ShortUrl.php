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
     * Get a value parsed in the type for a given key. Null if not exists
     *
     * @param $key
     * @return mixed|null
     */
    public static function get($key) {
        $item = self::where('key', $key)->first();
        if ($item) {
            return response()->json($item);
        }
        else
            return null;

    }
    /**
     * Delete url from database by key.
     *
     * @param $key
     * @return bool|null
     */
    public static function remove($key) {
        return self::where('key', $key)->delete();
    }

}

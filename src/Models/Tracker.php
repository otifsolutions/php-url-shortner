<?php

namespace OTIFSolutions\ShortUrlApp\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracker extends Model {
    use HasFactory;

    protected $guarded = ['id'];

    public function shortUrl() {

        return $this->belongsTo(ShortUrl::class);
    }
}

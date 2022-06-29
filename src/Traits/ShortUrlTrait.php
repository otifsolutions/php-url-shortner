<?php

namespace OTIFSolutions\ShortUrlApp\Traits;

use OTIFSolutions\ShortUrlApp\Models\Tracker;

trait ShortUrlTrait {
    public static function getDetails() {
        $details = Tracker::all();
        if ($details){
            return response()->json(['message'=>'success' , 'user details' => $details]);
        }
        return response()->json(['errors'=>['error' => ['data not found']]],403);
    }
}
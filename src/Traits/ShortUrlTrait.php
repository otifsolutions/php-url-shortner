<?php

namespace OTIFSolutions\ShortUrlApp\Traits;

use OTIFSolutions\ShortUrlApp\Models\Tracker;

trait ShortUrlTrait {
    public static function getDetails() {
        $details = Tracker::all();
        if ($details){

            return response()->json(['message'=>'success' , 'data' => $data]);
        }
        return response()->json(['errors'=>['error' => ['data not found']]],403);
    }

    public static function getData($ipAddress) {

        $data = Tracker::where('ip_address', $ipAddress)->get();
        if ($data) {
            return response()->json(['message'=>'success' , 'data' => $details]);
        }

        return response()->json(['errors'=>['error' => ['data not found']]],403);
    }
}
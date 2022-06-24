<?php

namespace OTIFSolutions\ShortUrlApp\Traits;

use OTIFSolutions\ShortUrlApp\Models\Tracker;

trait ShortUrlTrait {
    public static function getDetails() {
        $details = Tracker::all();
        if ($details){

            return response()->json(['success' => ['details' => $details]]);
        }
        return response()->json(['error' => ['data not found']]);
    }

    public static function getData($ipAddress) {

        $data = Tracker::where('ip_address', $ipAddress)->get();
        if ($data) {
            return response()->json(['success' => ['data' => $data]]);
        }
        return response()->json(['error' => ['data not found']]);

    }
}
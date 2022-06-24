<?php

namespace OTIFSolutions\ShortUrlApp\Traits;

use OTIFSolutions\ShortUrlApp\Models\Tracker;

trait ShortUrlTrait{
    public static function getDetails(){
        $details = Tracker::all();
        return response()->json(['Success' => ['details' => $details]]);
    }

    public static function getData($ipAddress){

        $data = Tracker::where('ip_address', $ipAddress);
        return response()->json(['Success' => ['data' => $data]]);

    }
}
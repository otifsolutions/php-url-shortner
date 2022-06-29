<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use OTIFSolutions\ShortUrlApp\Models\ShortUrl;
use OTIFSolutions\ShortUrlApp\Models\Tracker;

Route::get('/url', function (Request $request) {

    $shortUrl = ShortUrl::where('code', $request->get('q'))->first();
    if ($shortUrl) {
        Tracker::create([
            'short_url_id' => $shortUrl['id'],
            'ip_address' => $request->ip(),
            'full_url' => $request->fullUrl(),
            'operating_system' => $request->header('sec-ch-ua-platform'),
            'browser' => $request->userAgent(),
        ]);
        return redirect($shortUrl['url']);
    }
    return response()->json(['errors' => ['error' => 'url not exists']]);
});

<?php

namespace OTIFSolutions\ShortUrlApp\Http\Middleware;

use OTIFSolutions\ShortUrlApp\Models\ShortUrl;
use OTIFSolutions\ShortUrlApp\Models\Tracker;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShortUrlApp {
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        $data = ShortUrl::where('code', $request->get('q'))->first();
        if ($data) {
            $getData = Tracker::create([
                'short_url_id' => $data['id'],
                'ip_address' => $request->ip(),
                'full_url' => $request->fullUrl(),
                'operating_system' => $request->header('sec-ch-ua-platform'),
                'browser' => $request->userAgent(),
            ]);
        }
        return $next($request);
    }
}

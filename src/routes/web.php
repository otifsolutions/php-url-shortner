<?php
use Illuminate\Support\Facades\Route;
use OTIFSolutions\ShortUrlApp\Models\ShortUrl;

Route::get('/url', function () {

})->middleware('url_tracker');

<?php

namespace App\Http\Controllers;

use App\Models\UrlShortener;
use Illuminate\Http\Request;

class UrlShortenerController extends Controller
{
    public function index()
    {
        return view('Dashboard.modules.url.url_shortener');
    }

    public function shorten(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $url = new UrlShortener;

        $url->url = $request->url;

        // Extract the path from the URL
        $parsedUrl = parse_url($url->url);
        $path = isset($parsedUrl['path']) ? trim($parsedUrl['path'], '/') : '';

        // Generate a unique identifier
        $uniqueId = substr(uniqid(), 0, 6);

        // Use the path as the shortened URL and append the unique identifier
        $url->shortened_url = $path . '/' . $uniqueId;

        $url->save();

        $myUrl = UrlShortener::latest()->first();

        return view('Dashboard.modules.url.shortened', compact('myUrl'));
    }
}

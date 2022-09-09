<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\News;


class NewsController extends Controller
{
    public function all()
    {
        $news = News::all();
        return response()->json($news);
    }
}

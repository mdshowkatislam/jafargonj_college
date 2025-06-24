<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Article\ArticleService;
use App\Services\BannerService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $articleService;
    private $bannerService;

    public function __construct(BannerService $bannerService, ArticleService $articleService)
    {
        $this->articleService = $articleService;
        $this->bannerService = $bannerService;
    }
}

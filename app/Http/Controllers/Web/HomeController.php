<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AdsBanner;
use App\Models\Blog;
use App\Models\HomeSetupCategorySection;
use App\Models\HomeSetupCategoryStatus;
use App\Models\HomeSetupFeaturedBlog;
use App\Models\HomeSetupFooterBlogStatus;
use App\Models\HomeSetupFeaturedBlogStatus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("welcome");
    }

    public function privacy()
    {
        return view("web/privacy");
    }

    public function terms()
    {
        return view("web/terms");
    }
}

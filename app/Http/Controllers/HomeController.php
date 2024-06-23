<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Post;
use App\Models\Team;
use App\Models\About;
use App\Models\Image;
use App\Models\Insta;
use App\Models\Other;
use App\Models\Video;
use App\Models\Context;

use App\Models\Favicon;
use App\Models\MyImage;
use App\Models\Document;
use App\Models\OtherPost;
use App\Models\CoverImage;
use App\Models\Information;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Models\Visitor; 
use App\Models\FAQ; 
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // Method to fetch visitor count
    private function getVisitorCount(Request $req)
    {
        $ipAddress = $req->ip();
        $today = Carbon::today();

        // Check if the IP address has already been recorded today
        $visit = Visitor::where('ip_address', $ipAddress)
                        ->whereDate('created_at', $today)
                        ->first();

        if (!$visit) {
            // Record the visit
            Visitor::create(['ip_address' => $ipAddress]);
        }

        // Get the total visitor count
        $visitorCount = Visitor::count();

        return $visitorCount;
    }

    // Method to fetch common data for views
    private function fetchCommonData(Request $req)
{
    $visitorCount = $this->getVisitorCount($req);

    $context = Context::all();
    $contextnav = Context::all();
    $favicon = Favicon::first();
    $post = Post::all();
    $coverimages = CoverImage::latest()->get()->take(5);
    $links = Link::latest()->get()->take(7);
    $images = MyImage::latest()->get()->take(4);
    $teams = Team::whereIn('role', ['Chairperson', 'Vice Chairperson', 'Administrative Chief', 'Information Officer'])
                    ->take(4)
                    ->get();
    $about = About::first();
    $videos = Video::latest()->get()->take(3);
    $posts = Post::latest()->get()->take(6);
    $sitesetting = SiteSetting::first(); // Fetching SiteSetting here
    $noticestitle = Context::where('title', 'Notice')->latest()->first();
    $notices = collect();

    if ($noticestitle) {
        $notices = $noticestitle->get_informations()->latest()->get()->take(10);
    }

    $press = Information::whereType('pressrelease')->latest()->get()->take(5);
    $news = Information::whereType('news')->latest()->get()->take(5);
    $noticepop = Information::whereType('notice')->latest()->first();
    $instas = Insta::latest()->get()->take(3);

    return [
        'coverimages' => $coverimages,
        'links' => $links,
        'images' => $images,
        'teams' => $teams,
        'about' => $about,
        'videos' => $videos,
        'posts' => $posts,
        'sitesetting' => $sitesetting,
        'notices' => $notices,
        'press' => $press,
        'news' => $news,
        'noticepop' => $noticepop,
        'instas' => $instas,
        'post' => $post,
        'favicon' => $favicon,
        'context' => $context,
        'contextnav' => $contextnav,
        'noticestitle' => $noticestitle ? $noticestitle->title : null,
        'visitorCount' => $visitorCount,
    ];
}
    // Index method
    public function index(Request $req)
    {
        $data = $this->fetchCommonData($req);

        return view('portal.index', $data);
    }

    // Other page method example
    public function otherPage(Request $req)
    {
        $data = $this->fetchCommonData($req);

        return view('portal.otherpage', $data);
    }

    // FAQ method in HomeController
    
    public function faq()
    {
    $faqs = FAQ::all();
    $data = $this->fetchCommonData(request()); // Assuming you use request() helper to pass Request object

    return view('portal.layouts.faq', compact('faqs') + $data);
}

    
}

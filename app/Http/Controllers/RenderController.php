<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Team;
use App\Models\OtherPost;
use App\Models\Category;
use App\Models\CommitteeDetail;
use App\Models\Context;
use App\Models\Document;
use App\Models\ExecutiveDetail;
use App\Models\Information;
use App\Models\Link;
use App\Models\Message;
use App\Models\Post;
use App\Models\Video;
use App\Models\MyImage;
use App\Models\Other;
use App\Models\Mvc;
use App\Models\SiteSetting;
use App\Models\Orgchart;
use App\Models\Youth;

class RenderController extends Controller
{

    public function render_about(){
        $sitesetting = Sitesetting::first();
        $links = Link::latest()->get()->take(7);
        $noticestitle = Context::where('title', 'Notice')->latest()->first();
       
        $notices = $noticestitle->get_informations()->latest()->get()->take(10);        $contextnav = Context::all();
        $about = About::first();
        $mvcs = MVC::latest()->get()->take(4);

        return view('portal.about', compact('sitesetting', 'links', 'notices', 'about','mvcs', 'contextnav', 'noticestitle'));
    }

    public function render_team(){
        $sitesetting = Sitesetting::first();
        $links = Link::latest()->get()->take(7);
        $noticestitle = Context::where('title', 'Notice')->latest()->first();
       
        $notices = $noticestitle->get_informations()->latest()->get()->take(10);        $contextnav = Context::all();
        $teams = Team::all();

        return view('portal.team', compact('sitesetting', 'links', 'notices', 'teams', 'contextnav', 'noticestitle'));

    }

    public function render_chart(){
        $sitesetting = Sitesetting::first();
        $links = Link::latest()->get()->take(7);
        $noticestitle = Context::where('title', 'Notice')->latest()->first();
       
        $notices = $noticestitle->get_informations()->latest()->get()->take(10);        $orgchart = Orgchart::first();
        $contextnav = Context::all();
   
        return view('portal.organizationalchart', compact('sitesetting', 'links', 'notices','orgchart','contextnav', 'noticestitle'));

    }

    public function render_images(){
        $sitesetting = Sitesetting::first();
        $links = Link::latest()->get()->take(7);
        $noticestitle = Context::where('title', 'Notice')->latest()->first();
       
        $notices = $noticestitle->get_informations()->latest()->get()->take(10);        $contextnav = Context::all();
        $images = MyImage::latest()->get();
   
        return view('portal.images', compact('sitesetting', 'links', 'notices','images', 'contextnav', 'noticestitle'));

    }

    public function render_image($id){
        $sitesetting = Sitesetting::first();
        $links = Link::latest()->get()->take(7);
        $noticestitle = Context::where('title', 'Notice')->latest()->first();
       
        $notices = $noticestitle->get_informations()->latest()->get()->take(10);        $contextnav = Context::all();
        $image = MyImage::find($id);
   
        return view('portal.image', compact('sitesetting', 'links', 'notices','image', 'contextnav', 'noticestitle'));

    }

    public function render_videos(){
        $sitesetting = Sitesetting::first();
        $links = Link::latest()->get()->take(7);
        $noticestitle = Context::where('title', 'Notice')->latest()->first();
       
        $notices = $noticestitle->get_informations()->latest()->get()->take(10);        $contextnav = Context::all();
        $videos = Video::latest()->get();
   
        return view('portal.video', compact('sitesetting', 'links', 'notices','videos', 'contextnav', 'noticestitle'));

    }
    


    public function contact_page(){

        $sitesetting = SiteSetting::first();
        $links = Link::latest()->get()->take(7);
        $noticestitle = Context::where('title', 'Notice')->latest()->first();
       
        $notices = $noticestitle->get_informations()->latest()->get()->take(10);        $contextnav = Context::all();

        return view('portal.contact_page', compact('sitesetting','links', 'notices', 'contextnav', 'noticestitle'));
    }

    public function singleinformation_page($contextId){

        // $informationQuery = Context::whereHas('get_informations', function ($q) use ($id){
        //     $q->where('id', $id);

        // })->latest();

        // $category = Context::where('id', $id)->first();
      
        // $informations = Information::whereHas('get_contexts', function ($q) use ($id) {
        //     $q->where('id', $id);
        // })->latest();
       
        $context = Context::findOrFail($contextId);
        $informations = $context->get_informations()->latest()->get();

        $contextnav = Context::all();
        $sitesetting = SiteSetting::first();
        $links = Link::latest()->get()->take(5);
        $noticestitle = Context::where('title', 'Notice')->latest()->first();
       
        $notices = $noticestitle->get_informations()->latest()->get()->take(10);
        return view('portal.information_page', compact('sitesetting','links', 'notices' ,'context','informations', 'contextnav', 'noticestitle'));


    }


}

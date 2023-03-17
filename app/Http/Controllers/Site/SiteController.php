<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Fact;
use App\Models\Image;
use App\Models\Post;
use App\Models\Project;
use App\Models\projectDetaile;
use App\Models\Question;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $services = Service::paginate(10);
        $facts= Fact::paginate(4);
        $projects=Project::all();
        $details=projectDetaile::all();
        $testimonials=Testimonial::where('type','testimonial')->get();
        $clients=Client::all();
        $posts=Post::orderByDesc('id')->limit(3)->get();
        return view('site.index',compact('sliders','services','facts','projects','details','testimonials','clients','posts'));
    }
    public function about()
    {
        $teams=Team::all();
        $images = Image::where('type','service')->get();
        return view('site.about',compact('images','teams'));
    }

    public function teams()
    {
        $teams=Team::all();
        return view('site.team',compact('teams'));
    }

    public function testimonials()
    {
        $testimonials=Testimonial::where('type','testimonial')->get();
        return view('site.testimonials',compact('testimonials'));
    }

    public function faqs()
    {
        $posts=Post::select('id','content','image')->get();
        $faqs =Question::where('type','faq')->get();
        return view('site.faq',compact('faqs','posts'));
    }

}

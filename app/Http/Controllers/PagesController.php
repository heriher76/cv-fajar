<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyBio;
use App\AboutMe;
use App\Experience;
use App\Quote;
use App\Education;
use App\Portfolio;
use App\Skill;
use App\Setting;

class PagesController extends Controller
{
    public function index() {
    	$myBio = MyBio::first();
    	$myAbout = AboutMe::first();
    	$myExperiences = Experience::all();
    	$myEducations = Education::all();
    	$mySkills = Skill::all();
    	$myQuote = Quote::first();
    	$portfolios = Portfolio::all();
    	$parallax = Setting::first();

    	return view('front.index', compact('myBio', 'myAbout', 'myExperiences', 'myQuote', 'portfolios', 'myEducations', 'mySkills', 'parallax'));
    }
}

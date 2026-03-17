<?php
// File: app/Http/Controllers/PortfolioController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSetting;
use App\Models\AboutSetting;
use App\Models\Skill;
use App\Models\Portfolio;
use App\Models\SiteSetting;
use App\Models\ContactMessage;

class PortfolioController extends Controller
{
    public function index()
    {
        $hero = HeroSetting::first() ?? new HeroSetting([
            'name' => 'Your Name',
            'tagline' => 'Full Stack Developer',
            'description' => 'Welcome to my portfolio.'
        ]);

        $about = AboutSetting::first() ?? new AboutSetting([
            'title' => 'About Me',
            'bio' => 'I am a developer.',
        ]);

        $skills = Skill::where('is_active', true)->orderBy('order')->get()->groupBy('category');

        $portfolios = Portfolio::where('is_active', true)->orderBy('is_featured', 'desc')->orderBy('order')->get();

        $siteTitle = SiteSetting::get('site_title', 'Portfolio');

        return view('frontend.index', compact('hero', 'about', 'skills', 'portfolios', 'siteTitle'));
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->only(['name', 'email', 'subject', 'message']));

        return back()->with('success', 'Pesan berhasil dikirim! Saya akan segera menghubungi Anda.');
    }
}

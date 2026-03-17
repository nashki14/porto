<?php
// File: app/Http/Controllers/Admin/DashboardController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSetting;
use App\Models\AboutSetting;
use App\Models\Skill;
use App\Models\Portfolio;
use App\Models\SiteSetting;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'portfolios' => Portfolio::count(),
            'skills' => Skill::count(),
            'messages' => ContactMessage::count(),
            'unread' => ContactMessage::where('is_read', false)->count(),
        ];
        $recentMessages = ContactMessage::latest()->take(5)->get();
        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }

    // ===== HERO =====
    public function heroEdit()
    {
        $hero = HeroSetting::firstOrCreate([], ['name' => 'Your Name', 'tagline' => 'Developer']);
        return view('admin.hero', compact('hero'));
    }

    public function heroUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'description' => 'nullable|string',
            'github_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $hero = HeroSetting::firstOrCreate([]);
        $data = $request->except(['profile_photo', 'cv_file', '_token', '_method']);

        if ($request->hasFile('profile_photo')) {
            if ($hero->profile_photo) Storage::disk('public')->delete($hero->profile_photo);
            $data['profile_photo'] = $request->file('profile_photo')->store('photos', 'public');
        }

        if ($request->hasFile('cv_file')) {
            if ($hero->cv_file) Storage::disk('public')->delete($hero->cv_file);
            $data['cv_file'] = $request->file('cv_file')->store('files', 'public');
        }

        $hero->update($data);
        return back()->with('success', 'Hero section berhasil diperbarui!');
    }

    // ===== ABOUT =====
    public function aboutEdit()
    {
        $about = AboutSetting::firstOrCreate([], ['title' => 'About Me', 'bio' => '']);
        return view('admin.about', compact('about'));
    }

    public function aboutUpdate(Request $request)
    {
        $about = AboutSetting::firstOrCreate([]);
        $about->update($request->except(['_token', '_method']));
        return back()->with('success', 'About section berhasil diperbarui!');
    }

    // ===== SKILLS =====
    public function skills()
    {
        $skills = Skill::orderBy('category')->orderBy('order')->get();
        return view('admin.skills', compact('skills'));
    }

    public function skillStore(Request $request)
    {
        $request->validate(['name' => 'required', 'level' => 'required|integer|min:0|max:100', 'category' => 'required']);
        Skill::create($request->except(['_token']));
        return back()->with('success', 'Skill berhasil ditambahkan!');
    }

    public function skillUpdate(Request $request, Skill $skill)
    {
        $skill->update($request->except(['_token', '_method']));
        return back()->with('success', 'Skill berhasil diperbarui!');
    }

    public function skillDestroy(Skill $skill)
    {
        $skill->delete();
        return back()->with('success', 'Skill berhasil dihapus!');
    }

    // ===== PORTFOLIO =====
    public function portfolios()
    {
        $portfolios = Portfolio::orderBy('order')->get();
        return view('admin.portfolios', compact('portfolios'));
    }

    public function portfolioCreate()
    {
        return view('admin.portfolio-form', ['portfolio' => new Portfolio()]);
    }

    public function portfolioStore(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255']);
        $data = $request->except(['_token', 'image', 'tech_stack_input']);
        $data['tech_stack'] = $request->tech_stack_input ? explode(',', $request->tech_stack_input) : [];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }

        Portfolio::create($data);
        return redirect()->route('admin.portfolios')->with('success', 'Portfolio berhasil ditambahkan!');
    }

    public function portfolioEdit(Portfolio $portfolio)
    {
        return view('admin.portfolio-form', compact('portfolio'));
    }

    public function portfolioUpdate(Request $request, Portfolio $portfolio)
    {
        $data = $request->except(['_token', '_method', 'image', 'tech_stack_input']);
        $data['tech_stack'] = $request->tech_stack_input ? explode(',', $request->tech_stack_input) : [];
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            if ($portfolio->image) Storage::disk('public')->delete($portfolio->image);
            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }

        $portfolio->update($data);
        return redirect()->route('admin.portfolios')->with('success', 'Portfolio berhasil diperbarui!');
    }

    public function portfolioDestroy(Portfolio $portfolio)
    {
        if ($portfolio->image) Storage::disk('public')->delete($portfolio->image);
        $portfolio->delete();
        return back()->with('success', 'Portfolio berhasil dihapus!');
    }

    // ===== SETTINGS =====
    public function settings()
    {
        $settings = SiteSetting::pluck('value', 'key');
        return view('admin.settings', compact('settings'));
    }

    public function settingsUpdate(Request $request)
    {
        foreach ($request->except(['_token', '_method']) as $key => $value) {
            SiteSetting::set($key, $value);
        }
        return back()->with('success', 'Pengaturan berhasil disimpan!');
    }

    // ===== MESSAGES =====
    public function messages()
    {
        $messages = ContactMessage::latest()->paginate(10);
        return view('admin.messages', compact('messages'));
    }

    public function messageRead(ContactMessage $message)
    {
        $message->update(['is_read' => true]);
        return view('admin.message-detail', compact('message'));
    }

    public function messageDestroy(ContactMessage $message)
    {
        $message->delete();
        return back()->with('success', 'Pesan berhasil dihapus!');
    }
}

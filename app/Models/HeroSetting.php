<?php

// File: app/Models/HeroSetting.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class HeroSetting extends Model {
    protected $table = 'hero_settings';
    protected $fillable = ['name','tagline','description','profile_photo','cv_file','github_url','linkedin_url','instagram_url'];
}
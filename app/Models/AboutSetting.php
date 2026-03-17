<?php

// ========================================================
// File: app/Models/AboutSetting.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AboutSetting extends Model {
    protected $table = 'about_settings';
    protected $fillable = ['title','bio','location','email','phone','years_experience','projects_done','clients'];
}
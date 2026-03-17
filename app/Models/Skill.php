<?php

// ========================================================
// File: app/Models/Skill.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model {
    protected $fillable = ['name','level','category','icon','order','is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
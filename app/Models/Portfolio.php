<?php

// ========================================================
// File: app/Models/Portfolio.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model {
    protected $fillable = ['title','description','image','project_url','github_url','category','tech_stack','is_featured','is_active','order'];
    protected $casts = ['tech_stack' => 'array', 'is_featured' => 'boolean', 'is_active' => 'boolean'];
}
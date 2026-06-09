<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
		'slug',
		'description',
		'image',
		'status'
    ];
	
	protected static function booted()
	{
		static::creating(function ($project) {
        $project->slug = Str::slug($project->title);
		});
	}
	
	protected static function boot()
	{
		parent::boot();

		static::creating(function ($project) {
        $project->slug = Str::slug($project->title);
		});
	}

}

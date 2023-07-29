<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;
    protected $table = 'feeds';
    protected $fillable = [
        'title',
        'feed',
        'active',
        'category'
    ];

    // Validation rules for the feeds
    public static $form_rules = [
        'title'             =>      'required',
        'feed'              =>      'required|url|active_url',
        'active'            =>      'required|between:0,1',
        'category'          =>      'required|in:News,Sports,Technology'
    ];
}

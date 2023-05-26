<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'slug'];
    // protected $dispatchesEvents = [
    //     'creating' => 'App\Events\CategoryCreating',
    //     'updating' => 'App\Events\CategoryUpdating',
    // ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($category) {
    //         event(new \App\Events\CategoryCreating($category));
    //     });

    //     static::updating(function ($category) {
    //         event(new \App\Events\CategoryUpdating($category));
    //     });
    // }
}

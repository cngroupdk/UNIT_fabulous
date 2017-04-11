<?php

/**
 * Created by PhpStorm.
 * User: Lukas Figura
 * Date: 11/04/2017
 */


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Box extends Model
{
    use SoftDeletes;

    protected $table = "boxes_boxes";
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'name',
        'code',
        'description',
        'private'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'boxes_boxes_categories', 'category_id');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($item) {
        });
        static::deleting(function ($item) {
        });
    }
}

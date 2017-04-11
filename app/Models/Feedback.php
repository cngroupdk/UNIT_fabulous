<?php

/**
 * Created by PhpStorm.
 * User: Lukas Figura
 * Date: 11/04/2017
 */


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use SoftDeletes;

    protected $table = "boxes_feedbacks";
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'box_id',
        'favorite',
        'comment',
        'admin_comment'
    ];

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
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

<?php

/**
 * Created by PhpStorm.
 * User: Lukas Figura
 * Date: 11/04/2017
 */


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = "boxes_categories";
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function boxes()
    {
        return $this->belongsToMany(Box::class, 'boxes_boxes_categories', 'box_id');
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

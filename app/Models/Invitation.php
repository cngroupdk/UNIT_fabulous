<?php

/**
 * Created by PhpStorm.
 * User: Lukas Figura
 * Date: 11/04/2017
 */


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invitation extends Model
{
    use SoftDeletes;

    protected $table = "boxes_invitations";
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'box_id',
        'email',
        'token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function box()
    {
        return $this->belongsTo(Box::class);
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

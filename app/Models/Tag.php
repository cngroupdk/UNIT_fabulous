<?php

/**
 * Created by PhpStorm.
 * User: Lukas Figura
 * Date: 11/04/2017
 */


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Tag
 *
 * @property int            $id
 * @property string         $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tag extends Model
{
    use SoftDeletes;

    protected $table = "boxes_tags";
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name'
    ];


    protected static function boot()
    {
        parent::boot();

        static::saving(function ($item) {
        });
        static::deleting(function ($item) {
        });
    }
}

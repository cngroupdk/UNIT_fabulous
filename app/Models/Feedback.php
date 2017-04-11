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
 * App\Models\Feedback
 *
 * @property int                                                                $id
 * @property int                                                                $user_id
 * @property int                                                                $box_id
 * @property bool                                                               $favorite
 * @property string                                                             $comment
 * @property string                                                             $admin_comment
 * @property \Carbon\Carbon                                                     $created_at
 * @property \Carbon\Carbon                                                     $updated_at
 * @property \Carbon\Carbon                                                     $deleted_at
 * @property-read \App\Models\Box                                               $box
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rating[] $ratings
 * @property-read \App\Models\User                                              $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Feedback whereAdminComment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Feedback whereBoxId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Feedback whereComment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Feedback whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Feedback whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Feedback whereFavorite($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Feedback whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Feedback whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Feedback whereUserId($value)
 * @mixin \Eloquent
 */
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

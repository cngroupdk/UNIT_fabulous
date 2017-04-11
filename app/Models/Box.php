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
 * App\Models\Box
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $code
 * @property string $description
 * @property bool $private
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Feedback[] $feedbacks
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Invitation[] $invitations
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Box whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Box whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Box whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Box whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Box whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Box whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Box wherePrivate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Box whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Box whereUserId($value)
 * @mixin \Eloquent
 */
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

    protected $casts = [
        'private' => 'boolean'
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

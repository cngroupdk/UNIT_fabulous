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
 * App\Models\Invitation
 *
 * @property int $id
 * @property int $user_id
 * @property int $box_id
 * @property string $email
 * @property string $token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property-read \App\Models\Box $box
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Invitation whereBoxId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Invitation whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Invitation whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Invitation whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Invitation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Invitation whereToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Invitation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Invitation whereUserId($value)
 * @mixin \Eloquent
 */
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

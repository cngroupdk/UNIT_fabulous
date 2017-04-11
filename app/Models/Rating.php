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
 * App\Models\Rating
 *
 * @property int $id
 * @property int $feedback_id
 * @property int $category_id
 * @property int $rating
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Feedback $feedback
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rating whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rating whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rating whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rating whereFeedbackId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rating whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rating whereRating($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rating whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Rating extends Model
{
    use SoftDeletes;

    protected $table = "boxes_ratings";
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'feedback_id',
        'category_id',
        'rating'
    ];

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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

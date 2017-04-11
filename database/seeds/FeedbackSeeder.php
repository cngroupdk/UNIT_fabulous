<?php

use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feedback = Facades\App\Services\FeedbackService::create([
            'user_id' => \App\Models\User::first()->id,
            'box_id'  => \App\Models\Box::first()->id,
        ]);

        Facades\App\Services\RatingService::create([
            'feedback_id' => $feedback->id,
            'category_id' => \App\Models\Category::first()->id,
            'rating'      => 3,
        ]);

        Facades\App\Services\RatingService::create([
            'feedback_id' => $feedback->id,
            'category_id' => \App\Models\Category::offset(1)->first()->id,
            'rating'      => 1,
        ]);
    }
}

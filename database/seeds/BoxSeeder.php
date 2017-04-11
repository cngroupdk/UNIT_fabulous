<?php

use Illuminate\Database\Seeder;

class BoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $box = Facades\App\Services\BoxService::create([
            'name'        => 'Try box',
            'description' => 'Try box description',
            'user_id'     => \App\Models\User::first()->id,
        ]);

        $category1 = Facades\App\Services\CategoryService::create([
            'name'    => 'DummyCategory1',
            'user_id' => \App\Models\User::first()->id,
        ]);

        $category2 = Facades\App\Services\CategoryService::create([
            'name'    => 'DummyCategory2',
            'user_id' => \App\Models\User::first()->id,
        ]);

        $category1->boxes()->attach($box);
        $category2->boxes()->attach($box);
    }
}

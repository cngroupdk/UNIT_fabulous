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
        Facades\App\Services\BoxService::create([
            'name'        => 'Try box',
            'description' => 'Try box description',
            'user_id'     => \App\Models\User::first()->id,
        ]);
    }
}

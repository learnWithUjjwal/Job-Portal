<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Technology', 'Engineering', 'Government', 'Medical', 'Construction', 'Software'];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
        \App\Models\User::factory(20)->create();
        \App\Models\Company::factory(20)->create();
        \App\Models\Job::factory(30)->create();

    }
}

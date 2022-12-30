<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'company_id' => Company::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'title' => $name = $this->faker->text,
            'slug' => \Str::slug($name),
            'position' => $this->faker->jobTitle,
            'address' => $this->faker->address,
            'type' => 'fullTime',
            'status' => rand(0,1),
            'description' => $this->faker->paragraph(rand(2,10)),
            'roles' => $this->faker->paragraph(rand(2,10)),
            'last_date' => $this->faker->DateTime,
        ];
    }
}

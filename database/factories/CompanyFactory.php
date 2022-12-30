<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
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
            'cname' => $name = $this->faker->company,
            'slug' => \Str::slug($name),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->domainName,
            'logo' => 'avatar/main.jpg',
            'cover_photo' => 'cover_photo/main.jpg',
            'slogan' => 'Learn, Earn & Grow',
            'description' => $this->faker->paragraph(rand(2,10))
            
        ];
    }
}

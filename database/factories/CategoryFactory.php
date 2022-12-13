<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CategoryFactory extends Factory
{

    public function definition()
    {
        $faker = new Faker();
        return [
            'name' => "example",
            'created_at' => \Carbon\Carbon::now()->subYears($faker->numberBetween(3, 5)),
            'updated_at' => \Carbon\Carbon::now()->subYears($faker->numberBetween(3, 5))
        ];
    }
}

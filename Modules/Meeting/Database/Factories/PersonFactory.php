<?php

namespace Modules\Meeting\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Meeting\Entities\Person;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PersonFactory extends Factory
{
    protected $model = Person::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'identification_card' => $this->faker->randomNumber(8),
            'email' => $this->faker->unique()->safeEmail(),
            'type' => $this->faker->boolean(),
            'phone' => $this->faker->phoneNumber(),
            'country_id' => 1,
            'domicile' => $this->faker->address(),
            'business_name' => $this->faker->words(2, true)
        ];
    }

}

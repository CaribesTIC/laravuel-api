<?php

namespace Modules\Meeting\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Meeting\Entities\{Country, Meeting};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class MeetingFactory extends Factory
{
    protected $model = Meeting::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country_id' =>  $this->faker->numberBetween(1, Country::count()),
            'place' => $this->faker->sentence(5),
            'subject' => $this->faker->words(2, true),
            'reason' => $this->faker->text(10),
            'observation' => $this->faker->address(15)            
        ];
    }

}
          


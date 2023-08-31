<?php

namespace Modules\Meeting\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Meeting\Entities\Approach;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ApproachFactory extends Factory
{
    protected $model = Approach::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'approach'=> $this->faker->text(10),
            'speaker'=> $this->faker->text(10),
            'observation'=> $this->faker->text(10)
        ];
    }

}
          

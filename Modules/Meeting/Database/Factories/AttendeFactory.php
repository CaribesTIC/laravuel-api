<?php

namespace Modules\Meeting\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Meeting\Entities\Attende;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AttendeFactory extends Factory
{
    protected $model = Attende::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [     
            'idcard' => $this->faker->text(10),     
            'fullname' => $this->faker->text(10),     
            'entity_id' => 1,
            'dependence_id' => 1,
            'position_id' => 1,
            'email' => $this->faker->text(10),
            'phone' => $this->faker->text(10),
            'observation' => $this->faker->text(10)
        ];
    }

}
          

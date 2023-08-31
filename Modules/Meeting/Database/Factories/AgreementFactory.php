<?php

namespace Modules\Meeting\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Meeting\Entities\Agreement;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AgreementFactory extends Factory
{
    protected $model = Agreement::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [     
            'agreement' => $this->faker->text(10),     
            'responsible' => $this->faker->text(10),     
            'observation' => $this->faker->text(10)
        ];
    }

}
          

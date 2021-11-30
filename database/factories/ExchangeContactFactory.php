<?php

namespace Database\Factories;

use App\Models\ExchangeContact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExchangeContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExchangeContact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'exchange_id' => $this->faker->unique()->safeEmail(),
            'phoneNumber' => $this->faker->numerify('##########'),
            'physicalAddress' =>  $this->faker->name,
        ];
    }
}

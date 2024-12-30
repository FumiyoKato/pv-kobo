<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ForecastUnit>
 */
class ForecastUnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'forecast_unit_name' => $this->faker->word(),
            'user_id' => User::inRandomOrder()->first()->id, // ランダムなユーザーを紐づけ
            'pv_capacity' => $this->faker->randomFloat(2, 0, 10000),
            'pcs_capacity' => $this->faker->randomFloat(2, 0, 10000),
            'pcs_efficiency' => $this->faker->numberBetween(0, 100),
            'loss_rate' => $this->faker->numberBetween(0, 99),
            'direction' => $this->faker->numberBetween(1, 360),
            'angle' => $this->faker->numberBetween(0, 90),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'start_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'end_at' => $this->faker->dateTimeBetween('now', '+1 years'),
        ];
    }
}
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'), // 開発用:固定値でテスト
            // 'password' => bcrypt('password'), // 本番用:毎回異なるハッシュ生成
            'remember_token' => Str::random(10),
            'address' => $this->faker->address(),
            // 'phone' => $this->faker->numerify('###########'), // 11桁=日本の電話番号
            'phone' => $this->faker->randomElement([
                $this->faker->regexify('0[7-9]0-\d{4}-\d{4}'), // 携帯番号
                $this->faker->regexify('0\d{1,3}-\d{2,4}-\d{4}'), // 固定電話
            ]),
            'name_incharge' => $this->faker->name(),
            'delivery_email' => $this->faker->unique()->safeEmail(),
            'on_service' => $this->faker->boolean(90), // 90% true
            'registered_at' => now(),
            'revised_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
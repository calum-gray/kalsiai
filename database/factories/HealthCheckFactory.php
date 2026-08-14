<?php

namespace Database\Factories;

use App\Models\HealthCheck;
use Illuminate\Database\Eloquent\Factories\Factory;

class HealthCheckFactory extends Factory
{
    protected $model = HealthCheck::class;

    public function definition(): array
    {
        $questionIds = collect(config('health_check.questions'))->pluck('id');
        $optionCount = count(config('health_check.options'));

        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'answers' => $questionIds
                ->mapWithKeys(fn ($id) => [
                    $id => fake()->numberBetween(1, $optionCount),
                ])
                ->toArray(),
        ];
    }
}

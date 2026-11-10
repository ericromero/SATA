<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    /**
     * El nombre del modelo correspondiente a este factory.
     *
     * @var string
     */
    protected $model = Group::class;

    /**
     * Define el estado por defecto del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Genera nombres como "Grupo 105", "Grupo 892", etc.
            'name' => 'Grupo ' . $this->faker->unique()->numberBetween(100, 999),
            'period' => '2026-2',
        ];
    }
}
 
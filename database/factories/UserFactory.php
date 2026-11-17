<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    protected static ?string $password;

    public function definition(): array
    {
        $cols = Schema::getColumnListing('users');

        $data = [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password123'),
            'remember_token' => Str::random(10),
        ];

        // Solo agrega columnas extra si realmente existen en tu tabla users
        if (in_array('two_factor_secret', $cols)) {
            $data['two_factor_secret'] = null;
        }
        if (in_array('two_factor_recovery_codes', $cols)) {
            $data['two_factor_recovery_codes'] = null;
        }
        if (in_array('profile_photo_path', $cols)) {
            $data['profile_photo_path'] = null;
        }
        if (in_array('current_team_id', $cols)) {
            $data['current_team_id'] = null;
        }
        if (in_array('matricula', $cols)) {
            $data['matricula'] = '2026' . fake()->unique()->numerify('####');
        }
        if (in_array('role', $cols)) {
            $data['role'] = 'alumno';
        }
        if (in_array('rol', $cols)) {
            $data['rol'] = 'alumno';
        }

        return $data;
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
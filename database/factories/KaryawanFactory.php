<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */


class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        return [
            'jabatan' => fake()->randomElement(['Teknisi', 'Kepala Teknisi', 'Supervisor']),
            'nama' => fake()->name(),
            'foto' => fake()->text(10),
            'divisi' =>fake()->randomElement(['ioan', 'provi', 'maintenance', 'project']),
            'remember_token' => Str::random(10),
        ];
    }
}

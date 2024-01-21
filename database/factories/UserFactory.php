<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserFactory extends Factory
{

    protected $model = User::class;

    public function definition()
    {
       return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => mt_rand(10000000000, 99999999999),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'status' => 1,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            $roles = Role::all();
            if ($roles->count() > 0) {
                $randomRole = $roles->random();
                $user->assignRole($randomRole);
            } 
        });
    }
   
}

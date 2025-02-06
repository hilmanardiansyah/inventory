<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'avatar' => $this->faker->imageUrl(),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Define the state for an 'admin' role.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
               'role' => 'admin',
            ];
        });
    }

    /**
     * Define the state for a 'staff' role.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function staff()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'staff',
            ];
        });
    }

    /**
     * Define the state for a 'customer' role.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function customer()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'customer',
            ];
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Assign the role to the user after it has been created.
     *
     * @param \App\Models\User $user
     * @param string $role
     * @return void
     */
    public function assignRole(User $user, string $role)
    {
        $role = Role::firstOrCreate(['name' => $role]);
        $user->assignRole($role);
    }
}

<?php

namespace Database\Factories;

use App\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PeopleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = People::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       return [
            'people_dni' => $this->faker->bankRoutingNumber,
            'people_fname' => $this->faker->name(),
            'people_sname' => $this->faker->name(),
            'people_fsurname' => $this->faker->lastname(),
            'people_ssurname' => $this->faker->lastname(),
            'people_birth_at' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'people_phone' => $this->faker->e164PhoneNumber(),
            'people_address' => $this->faker->address(),
            'people_email' => $this->faker->unique()->safeEmail(),
            'people_age' => $this->faker->numberBetween(18,65),

        ];
    }
}


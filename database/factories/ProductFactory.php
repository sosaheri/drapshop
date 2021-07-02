<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $a = $this->faker->numberBetween($min = 1, $max = 20);
        $b = $this->faker->numberBetween($min = 100, $max = 200);
        return [
            'product_name' => $this->faker->text($maxNbChars = 50),
            'product_liable' => $this->faker->name(),
            'product_type' => $this->faker->randomElement(['hogar', 'empresarial']),
            'product_amount' => $a,
            'product_price' => $b,
            'product_total' => $a * $b,

        ];
    }
}


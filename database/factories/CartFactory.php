<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        for($i=1;$i<=$this->faker->numberBetween($min=1,$max=10);$i++){
            $product= json_encode([
                'productID'=>$i,
                'name'=>$this->faker->text
            ]);
            $p[]=json_decode($product,true);
        }
        $products=json_encode($p);

        return [
            'userID'=>$this->faker->randomDigitNotNull,
            'products'=>$products,
        ];
    }
}

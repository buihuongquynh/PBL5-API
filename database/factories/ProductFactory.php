<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        for($i=1;$i<=$this->faker->numberBetween($min=1,$max=10);$i++){
            $review= json_encode([
                'reviewID'=>$i,
                'content'=>$this->faker->text
            ]);
            $r[]=json_decode($review,true);
        }
        $reviews=json_encode($r);
        
        for($i=1;$i<=$this->faker->numberBetween($min=1,$max=10);$i++){
            $image= json_encode([
                'imageID'=>$i,
                'image'=>$this->faker->imageUrl
            ]);
            $img[]=json_decode($image,true);
        }
        $images=json_encode($img);

        $boughtPrice=$this->faker->randomNumber;
        return [
            'name'=>$this->faker->name,
            'boughtPrice'=>$boughtPrice,
            'sellPrice'=>$boughtPrice*$this->faker->randomFloat($nbMaxDecimals=2, $min=1,$max=3),
            'discount'=>$this->faker->numberBetween($min = 0, $max = 100),
            'quantity'=>$this->faker->randomNumber,
            'images'=>$images,
            'size'=>$this->faker->randomFloat($nbMaxDecimals = 1, $min = 2, $max = 10),
            'material'=>$this->faker->text(50),
            'color'=>$this->faker->colorName,
            'category'=>$this->faker->text(50),
            'brandID'=>$this->faker->numberBetween($min = 1, $max = 10),
            'reviews'=>$reviews,
            'rating'=>$this->faker->randomFloat($nbMaxDecimals = 15, $min = 0, $max = 5)
        ];
    }
}

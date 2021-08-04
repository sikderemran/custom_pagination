<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker=Faker::create();
        foreach(range(1,10) as $index)
        {
            Product::create([
                'name'=>'Product name',
                'title'=>'Product title',
                'unit_price'=>rand(100,500),
                'slug'=>'product-name',
                'image'=>'1627747247.jpg'
            ]);
        }
    }
}

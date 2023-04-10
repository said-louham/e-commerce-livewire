<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\brand;
use App\Models\color;
use App\Models\slider;
use App\Models\product;
use App\Models\category;
use App\Models\product_color;
use App\Models\product_image;
use App\Models\wishlist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
  
    public function run()
{
    User::factory(10)->create([
        'role_as' => 0
    ]);

    User::factory()->create([
        'name' => 'admin',
        'email' => 'admin@example.com',
        'role_as' => 1
    ]);

    category::factory(6)->create();
    // brand::factory(10)->create();
    slider::factory(6)->create();
    color::factory(10)->create();

        category::all()->each(function ($category) {
            brand::factory(5)->create([
                'category_id' => $category->id,
            ])->each(function ($brand) use ($category) {
                product::factory()->create([
                    'brand' => $brand->name,
                    'category_id' => $category->id,
                ])->each(function ($product) {
                    product_image::factory()->count(3)->create([
                        'product_id' => $product->id,
                    ]);
                
                });
            });
        });

product::each(function($product){
        product_color::factory(3)->create();
});

   



// favorite 
product::each(function($product){
    wishlist::create([
        'user_id'=>2,
        'product_id'=>$product->id
    ]);
});



}

}

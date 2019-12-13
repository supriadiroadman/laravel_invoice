<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'title' => 'Lenovo ideapad',
            'description' => 'Laptop dengan kemampuan sangat baik',
            'price' => 4000000,
            'stock' => 5,
        ]);
        Product::create([
            'title' => 'Lenovo toshiba',
            'description' => 'Laptop dengan inovasi teknologi yang sangat baik',
            'price' => 5000000,
            'stock' => 10,
        ]);
    }
}

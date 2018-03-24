<?php

use Illuminate\Database\Seeder;
use App\Admin\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = "Arts & Crafts";
        $category->save();

        $category = new Category();
        $category->name = "Health & Beauty";
        $category->save();

        $category = new Category();
        $category->name = "Eyewear";
        $category->save();

        $category = new Category();
        $category->name = "Watches";
        $category->save();

        $category = new Category();
        $category->name = "Foods";
        $category->save();

        $category = new Category();
        $category->name = "Home & Garden";
        $category->save();

        $category = new Category();
        $category->name = "Jewelry & Accessories";
        $category->save();

        $category = new Category();
        $category->name = "Clothes & Accessories";
        $category->save();

        $category = new Category();
        $category->name = "Lingerie";
        $category->save();

        $category = new Category();
        $category->name = "Shoes";
        $category->save();

        $category = new Category();
        $category->name = "Electronics & Appliances";
        $category->save();


    }
}

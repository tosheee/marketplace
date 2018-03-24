<?php

use Illuminate\Database\Seeder;
use App\Admin\Category;
use App\Admin\SubCategory;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_category = new SubCategory();
        $sub_category->category_id = Category::where('name', 'Arts & Crafts')->first()->id;
        $sub_category->name = 'Paintings';
        $sub_category->identifier = preg_replace('/\s+/', '_', trim('Paintings'));
        $sub_category->save();

        $sub_category = new SubCategory();
        $sub_category->category_id = Category::where('name', 'Arts & Crafts')->first()->id;
        $sub_category->name = 'Sculptures';
        $sub_category->identifier = preg_replace('/\s+/', '_', trim('Sculptures'));
        $sub_category->save();

        $sub_category = new SubCategory();
        $sub_category->category_id = Category::where('name', 'Arts & Crafts')->first()->id;
        $sub_category->name = 'Pottery';
        $sub_category->identifier = preg_replace('/\s+/', '_', trim('Pottery'));
        $sub_category->save();


        $sub_category = new SubCategory();
        $sub_category->category_id = Category::where('name', 'Home & Garden')->first()->id;
        $sub_category->name = 'Lightings';
        $sub_category->identifier = preg_replace('/\s+/', '_', trim('Lightings'));
        $sub_category->save();

        $sub_category = new SubCategory();
        $sub_category->category_id = Category::where('name', 'Home & Garden')->first()->id;
        $sub_category->name = 'Textiles';
        $sub_category->identifier = preg_replace('/\s+/', '_', trim('Textiles'));
        $sub_category->save();

        $sub_category = new SubCategory();
        $sub_category->category_id = Category::where('name', 'Home & Garden')->first()->id;
        $sub_category->name = 'Furniture and Accessories';
        $sub_category->identifier = preg_replace('/\s+/', '_', trim('Furniture and Accessories'));
        $sub_category->save();

        $sub_category = new SubCategory();
        $sub_category->category_id = Category::where('name', 'Clothes & Accessories')->first()->id;
        $sub_category->name = 'Women';
        $sub_category->identifier = preg_replace('/\s+/', '_', trim('Women'));
        $sub_category->save();

        $sub_category = new SubCategory();
        $sub_category->category_id = Category::where('name', 'Clothes & Accessories')->first()->id;
        $sub_category->name = 'Girls';
        $sub_category->identifier = preg_replace('/\s+/', '_', trim('Girls'));
        $sub_category->save();

        $sub_category = new SubCategory();
        $sub_category->category_id = Category::where('name', 'Clothes & Accessories')->first()->id;
        $sub_category->name = 'Men';
        $sub_category->identifier = preg_replace('/\s+/', '_', trim('Men'));
        $sub_category->save();

        $sub_category = new SubCategory();
        $sub_category->category_id = Category::where('name', 'Health & Beauty')->first()->id;
        $sub_category->name = 'Fragrances';
        $sub_category->identifier = preg_replace('/\s+/', '_', trim('Fragrances'));
        $sub_category->save();

        $sub_category = new SubCategory();
        $sub_category->category_id = Category::where('name', 'Health & Beauty')->first()->id;
        $sub_category->name = 'Natural & Bio';
        $sub_category->identifier = preg_replace('/\s+/', '_', trim('Natural & Bio'));
        $sub_category->save();

        $sub_category = new SubCategory();
        $sub_category->category_id = Category::where('name', 'Health & Beauty')->first()->id;
        $sub_category->name = 'Luxury Beauty';
        $sub_category->identifier = preg_replace('/\s+/', '_', trim('Luxury Beauty'));
        $sub_category->save();

    }
}

<?php
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        factory(\CodeFlix\Models\Category::class,20)->create();
    }
}


?>
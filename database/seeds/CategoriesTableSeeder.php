<?php
class CategoriesTableSeeder extends seeder
{
    public function run()
    {
        factory(\CodeFlix\Models\Category::class,20)->create();
    }
}


?>
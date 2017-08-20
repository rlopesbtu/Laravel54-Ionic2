<?php
class SeriesTableSeeder extends Seeder
{
    public function run()
    {
        factory(\CodeFlix\Models\Serie::class,5)->create();
    }
}


?>

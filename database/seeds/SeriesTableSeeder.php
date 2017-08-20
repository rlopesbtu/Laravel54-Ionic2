<?php
use Illuminate\Database\Seeder;


class SeriesTableSeeder extends Seeder
{
    public function run()
    {
        factory(\CodeFlix\Models\Serie::class,5)->create();
    }
}


?>

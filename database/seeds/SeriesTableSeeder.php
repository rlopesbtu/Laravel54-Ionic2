<?php
use Illuminate\Database\Seeder;
class SeriesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * @var \Illuminate\Database\Eloquent\Collection $series
         */
        factory(\CodeFlix\Models\Serie::class,5)->create();

    }
}
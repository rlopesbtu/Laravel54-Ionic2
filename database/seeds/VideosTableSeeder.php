<?php
use Illuminate\Database\Seeder;


class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $series = \CodeFlix\Models\Serie::all();
        $categories = \CodeFlix\Models\Category::all();
        $repository = app(\CodeFlix\Repositories\VideoRepository::class);
        $collectionThumbs = $this->getThumbs();
        $collectionVideos = $this->getVideos();
        factory(\CodeFlix\Models\Video::class,2)
            ->create()
            ->each(function($video) use(
                $series,
                $categories,
                $repository,
                $collectionThumbs,
                $collectionVideos
            ){
                $repository->uploadThumb($video,$collectionThumbs->random());
                $repository->uploadFile($video,$collectionVideos->random());
                $video->categories()->attach($categories->random(4)->pluck('id'));
                $num = rand(1, 3);
                if($num % 2 == 0){
                    $serie = $series->random();
                    $video->serie_id = $serie->id;
                    $video->serie()->associate($serie);
                    $video->save();
                }
            });
    }

    protected function getThumbs(){
        return new \Illuminate\Support\Collection([
            new \Illuminate\Http\UploadedFile(
                storage_path('app/files/faker/thumbs/thumb_symfony.jpg'),
                'thumb_symfony.jpg'
            ),
        ]);
    }

    protected function getVideos(){
        return new \Illuminate\Support\Collection([
            new \Illuminate\Http\UploadedFile(
                storage_path('app/files/faker/videos/teste.mp4'),
                'teste.mp4.jpg'
            ),
        ]);
    }
}

?>

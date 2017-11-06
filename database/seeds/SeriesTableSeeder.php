<?php
use CodeFlix\Repositories\SerieRepository;
use Illuminate\Database\Seeder;


class SeriesTableSeeder extends Seeder
{
    public function run()
    {
        $rootPath = config('filesystems.disks.videos_local.root');
        \File::deleteDirectory($rootPath,true);
        $series = factory(\CodeFlix\Models\Serie::class,5)->create();
        $repository = app(SerieRepository::class);
        $collectionThumbs = $this->getThumbs();
        $series->each(function($serie)use($repository, $collectionThumbs){
            $repository->uploadThumb($serie,$collectionThumbs->random());
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
}


?>

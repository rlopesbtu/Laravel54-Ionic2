<?php

namespace CodeFlix\Models;

use Bootstrapper\Interfaces\TableInterface;
use CodeFlix\Media\SeriePaths;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Traits\TransformableTrait;

class Serie extends Model implements TableInterface
{
    use SeriePaths;
    use TransformableTrait;


    protected $fillable = ['title','description','thumb'];

    public function getTableHeaders()
    {
        return ['#','Descrição'];
    }


    public function getValueForHeader($header)
    {
        // TODO: Implement getValueForHeader() method.
        switch ($header){
            case '#':
                return $this->id;

        }
    }

}

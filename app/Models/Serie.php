<?php

namespace CodeFlix\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Traits\TransformableTrait;

class Serie extends Model implements TableInterface
{
    use TransformableTrait;

    protected $fillable = ['title','description'];

    public function getTableHeaders()
    {
        return ['#','Titulo','Descrição'];
    }


    public function getValueForHeader($header)
    {
        // TODO: Implement getValueForHeader() method.
        switch ($header){
            case '#':
                return $this->id;
            case 'Titulo':
                return $this->title;
            case 'Descrição':
                return $this->description;
        }
    }

}

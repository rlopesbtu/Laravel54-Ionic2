<?php

namespace CodeFlix\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements TableInterface
{


    protected $fillable = ['name'];

    public function getTableHeaders()
    {
        return ['#','Nome'];
    }


    public function getValueForHeader($header)
    {
        // TODO: Implement getValueForHeader() method.
        switch ($header){
            case '#':
                return $this->id;
            case 'Nome':
                return $this->name;
        }
    }

}

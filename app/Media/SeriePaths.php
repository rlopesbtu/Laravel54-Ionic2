<?php
/**
 * Created by PhpStorm.
 * User: riapl
 * Date: 16/10/2017
 * Time: 22:35
 */

namespace CodeFlix\Media;


trait SeriePaths
{
    use ThumbPaths;

    public function getThumbFolderStorageAttribute(){
        return "series/{$this->id}";
    }

    public function getThumbAssetAttribute(){
        return $this->isLocalDriver()?
            route('admin.series.thumb_asset',['serie'=>$this->id]):
            $this->thumb_path;
    }

    public function getThumbSmallAssetAttribute(){
        return $this->isLocalDriver()?
            route('admin.series.thumb_small_asset',['serie'=>$this->id]):
        $this->thumb_small_path;
    }

    public function getThumbDefaultAttribute(){
        return env('SERIE_NO_THUMB');
    }

    public function getThumbRelativeAttribute()
    {
        return "{$this->thumb_folder_storage}/{$this->thumb}";
    }

    public function getThumbPathAttribute(){
        return $this->getAbsolutePath($this->getStorage(),$this->thumb_relative);
    }

    public function getThumbSmallRelativeAttribute()
    {
        list($name,$extension) = explode('.',$this->thumb);
        return "{$this->thumb_folder_storage}/{$name}_small.{$extension}";
    }

    public function getThumbSmallPathAttribute(){
        return $this->getAbsolutePath($this->getStorage(),$this->thumb_small_relative);
    }

}
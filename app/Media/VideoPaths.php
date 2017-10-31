<?php
namespace CodeFlix\Media;
trait VideoPaths
{
    use VideoStorages;

    public function getThumbFolderStorageAttribute(){
        return "videos/{$this->id}";
    }

    public function getThumbAssetAttributes()
    {
        //return route('admin.series.thumb_asset',['serie' => $this->id]);
    }

    public function getThumbSmallAssetAttribute()
    {
        //return route('admin.series.thumb_small_asset',['serie' => $this->id]);
    }

}
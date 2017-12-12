<?php
namespace CodeFlix\Media;
use function Aws\recursive_dir_iterator;

trait VideoPaths
{
    use ThumbPaths;

    public function getFileRelativeAttribute()
    {
        return $this->file ? "{$this->thumb_folder_storage}/{$this->file}" : false;
    }

    public function getFilePathAttribute()
    {
        if($this->thumb_relative){
            return $this->getAbsolutePath($this->getStorage(),$this->file_relative);
        }
        return false;
    }


    public function getThumbFolderStorageAttribute(){
        return "videos/{$this->id}";
    }

    public function getFileFolderStorageAttribute()
    {
        return "videos/{$this->id}";
    }

    public function getFileAssetAttribute(){
        return $this->isLocalDriver()?
            route('admin.videos.file_asset',['video'=>$this->id]):
        $this->file_path;
    }

    public function getThumbAssetAttribute()
    {
        return $this->isLocalDriver()?
            route('admin.videos.thumb_asset',['video' => $this->id]):
            $this->thumb_path;
    }


    public function getThumbSmallAssetAttribute()
    {
        return $this->isLocalDriver() ?
            route('admin.videos.thumb_small_asset',['video'=>$this->id])
            : $this->thumb_small_path;
    }

}
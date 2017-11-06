<?php
/**
 * Created by PhpStorm.
 * User: riapl
 * Date: 16/10/2017
 * Time: 22:14
 */

namespace CodeFlix\Media;


use Illuminate\Filesystem\FilesystemAdapter;

trait VideoStorages
{
    public function getStorage(){
        return \Storage::disk($this->getDiskDriver());
    }

    protected function getDiskDriver(){ //driver
        return config('filesystems.default');
    }

    protected function getAbsolutePath(FilesystemAdapter $storage, $fileRelativePath){

        return $this->isLocalDriver()?
            $storage->getDriver()->getAdapter()->applyPathPrefix($fileRelativePath):
            $storage->url($fileRelativePath);
    }

    public function isLocalDriver(){
        $driver = config("filesystems.disks.{$this->getDiskDriver()}.driver");
        return $driver == 'local';
    }
}
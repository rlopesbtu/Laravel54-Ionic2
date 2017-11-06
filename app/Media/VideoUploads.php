<?php
/**
 * Created by PhpStorm.
 * User: riapl
 * Date: 21/10/2017
 * Time: 22:55
 */

namespace CodeFlix\Media;



use Illuminate\Http\UploadedFile;


trait VideoUploads
{
    use Uploads;

    public function uploadFile($id, UploadedFile $file)
    {
        $model = $this->find($id);
        $name=$this->upload($model,$file,'file');
        if($name){
            $this->deleteFileOld($model);
            $model->file = $name;
            $model->save();
        }
        return $model;
    }


    public function deleteFileOld($model){
        $storage = $model->getStorage();
        if($storage->exists($model->file_relative)) {
            $storage->delete($model->file_relative);
        }
    }
}
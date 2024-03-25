<?php


namespace app\Service;


class MultiMedia
{
    private $uploadPath = '/public/images/template/';
    private $pathFolder = '\public\images\template';
    private $allowedMimeTypes = ['image/jpeg','image/jpg', 'image/png'];


    private function getPath() {
        return $_SERVER['DOCUMENT_ROOT'].$this->uploadPath;
    }

    public function getFolder() {
        return $_SERVER['DOCUMENT_ROOT'].$this->pathFolder;
    }


    private function validateFileImage($uploadedFiles) {


        if (empty($uploadedFiles)) {
            return false;
        }

        if ($uploadedFiles->getError() !== UPLOAD_ERR_OK) {
            return false;
        }


        if (!in_array($uploadedFiles->getclientMediaType(), $this->allowedMimeTypes)) {
            return false;
        }


        return true;
    }

    public function multiUploadFileImage($uploadedFile) {

        if(!empty($uploadedFile) && $this->validateFileImage($uploadedFile)) {

            $filepath = $this->getPath() .$uploadedFile->getClientFilename();

            $uploadedFile->moveTo($filepath);

        }
    }

    public function getFiles() {

        $item = [];
        $files = scandir($this->getFolder());
        if($files) {
            sort($files);
            foreach ($files as $file) {
                if(strlen($file) > 3) {
                    $item[$file] = $this->uploadPath . $file;
                }
            }

            return $item;
        }
    }

}
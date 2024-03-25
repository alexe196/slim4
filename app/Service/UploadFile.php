<?php
namespace app\Service;


class UploadFile
{
    private $maxFileSize = 5242880; // 5 MB
    private $uploadPath = '/public/images/products/';
    private $allowedMimeTypes = ['image/jpeg', 'image/png'];
    private $path = null;


    private function getPath($path='') {
        return $_SERVER['DOCUMENT_ROOT'].$this->uploadPath.$this->path;
    }


    private function validateFileImage($uploadedFiles) {

        $maxFileSize = $this->maxFileSize;

        if (empty($uploadedFiles['file'])) {
            return false;
        }

        if ($uploadedFiles['file']->getError() !== UPLOAD_ERR_OK) {
            return false;
        }

        if ($uploadedFiles['file']->getSize() > $maxFileSize) {
            return false;
        }

        if (!in_array($uploadedFiles['file']->getclientMediaType(), $this->allowedMimeTypes)) {
            return false;
        }


        return true;
    }

    public function uploadFileImage($uploadedFiles) {

        $return_path = null;
        if(!empty($uploadedFiles) && $this->validateFileImage($uploadedFiles)) {

            $uploadedFile = $uploadedFiles['file'];
            $filename = uniqid() . '_' . $uploadedFile->getClientFilename();
            $filepath = $this->getPath() .$filename;

            $uploadedFile->moveTo($filepath);

            $return_path['path'] = $this->uploadPath.$filename;
            $return_path['filename'] = $filename;
        }


        return $return_path;
    }

    public static function deleteFile($path) {
        if(file_exists($path)) {
            unlink($path);
        }
    }

}
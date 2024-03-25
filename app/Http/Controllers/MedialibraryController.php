<?php


namespace app\Http\Controllers;


use app\Service\MultiMedia;
use app\Trait\Authentification;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\Service\UploadFile;

class MedialibraryController
{

    private MultiMedia $MultiMedia;


    public function __construct()
    {
        $this->MultiMedia = new MultiMedia();
        Authentification::isAdmin();
    }

    public function index(Request $request, Response $response)
    {

        $files = $this->MultiMedia->getFiles();

        return view($response, 'dashboard/medialibrary/index', [
            'files' => $files,
        ]);
    }

    public function upload(Request $request, Response $response)
    {
        $uploadedFiles = $request->getUploadedFiles();

        if (!empty($uploadedFiles['file'])) {


            foreach ($uploadedFiles['file'] as $item) {

                $this->MultiMedia->multiUploadFileImage($item);
            }

        }

        $response = $response->withStatus(302);
        return $response->withHeader('Location', '/dashboard/medialibrary/');
    }

    public function delete(Request $request, Response $response)
    {
        $name = $request->getAttribute('name');

        if (!empty($name)) {
            $path = $this->MultiMedia->getFolder()."\\".$name;
            UploadFile::deleteFile($path);
        }

        $response = $response->withStatus(302);
        return $response->withHeader('Location', '/dashboard/medialibrary/');
    }

}
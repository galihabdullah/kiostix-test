<?php

namespace App\Controllers;



use App\Lib\Request;
use App\Lib\Response;
use function OpenApi\scan;

class HomeController
{
    /**
     * @OA\Info(
     *    title="Galih Test Kiostix",
     *    version="1.0.0",
     * )
     */

    public function index()
    {
        echo 'ok';
    }

    public function docJson()
    {
        $openApi = scan(__DIR__);
        header('Content-Type: application/json');
        echo $openApi->toJson();
    }
}
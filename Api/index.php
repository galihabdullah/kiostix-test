<?php

require __DIR__."/vendor/autoload.php";


use App\Lib\Request;
use App\Lib\Response;
use App\Lib\Router;
use function OpenApi\scan;

\App\App::run();

Router::get('/', function (){
    (new \App\Controllers\HomeController())->index();
});

Router::get('/docs', function (Request $req, Response $res){
    $res->renderHtml(__DIR__.'/Views/index.html');
});


Router::get('/json', function (){
    (new \App\Controllers\HomeController())->docJson();
});

Router::get('/kategori', function (Request $request, Response $response){
    (new \App\Controllers\KategoriController())->all($response);
});

Router::get('/kategori/([0-9]*)', function (Request $request, Response $response){
    (new \App\Controllers\KategoriController())->find($response, $request->params[0]);
});


Router::post('/kategori', function (Request $request, Response $response){
    (new \App\Controllers\KategoriController())->store($request, $response);
});

Router::delete('/kategori/([0-9]*)', function (Request $request, Response $response){
    (new \App\Controllers\KategoriController())->delete($response, $request->params[0]);
});

Router::put('/kategori/([0-9]*)', function (Request $request, Response $response){
    (new \App\Controllers\KategoriController())->update($request, $response, $request->params[0]);
});


Router::get('/penulis', function (Request $request, Response $response){
    (new \App\Controllers\PenulisController())->all($response);
});

Router::get('/penulis/([0-9]*)', function (Request $request, Response $response){
    (new \App\Controllers\PenulisController())->find($response, $request->params[0]);
});


Router::post('/penulis', function (Request $request, Response $response){
    (new \App\Controllers\PenulisController())->store($request, $response);
});

Router::delete('/penulis/([0-9]*)', function (Request $request, Response $response){
    (new \App\Controllers\PenulisController())->delete($response, $request->params[0]);
});

Router::put('/penulis/([0-9]*)', function (Request $request, Response $response){
    (new \App\Controllers\PenulisController())->update($request, $response, $request->params[0]);
});

Router::get('/buku', function (Request $request, Response $response){
    (new \App\Controllers\BukuController())->all($request, $response);
});

Router::get('/buku/([0-9]*)', function (Request $request, Response $response){
    (new \App\Controllers\BukuController())->find($response, $request->params[0]);
});


Router::post('/buku', function (Request $request, Response $response){
    (new \App\Controllers\BukuController())->store($request, $response);
});

Router::delete('/buku/([0-9]*)', function (Request $request, Response $response){
    (new \App\Controllers\BukuController())->delete($response, $request->params[0]);
});

Router::put('/buku/([0-9]*)', function (Request $request, Response $response){
    (new \App\Controllers\BukuController())->update($request, $response, $request->params[0]);
});
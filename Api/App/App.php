<?php

namespace App;

use Illuminate\Database\Capsule\Manager;

class App
{
    public static function run()
    {
        $env = parse_ini_file( __DIR__."/../.env");

        $capsule = new Manager();
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'kiostix',
            'username'  => 'root',
            'password'  => 'root',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        $capsule->bootEloquent();
        $capsule->setAsGlobal();
    }
}
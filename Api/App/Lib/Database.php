<?php


namespace App\Lib;


use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;

class Database
{
    protected $conn;
    public $queryBuilder;

    public function __construct()
    {
        $env = parse_ini_file( __DIR__."/../../.env");
        $params = [
            'user' => $env['DB_USER'],
            'password' => $env['DB_PASSWORD'],
            'host' => $env['DB_HOST'],
            'driver' => $env['DB_DRIVER'],
        ];
        try {
            $this->conn = DriverManager::getConnection($params);
            $this->queryBuilder = $this->conn->createQueryBuilder();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function query($query, $attributes = null)
    {
        try {
            $stmt = $this->conn->executeQuery($query, $attributes);
            return $stmt->fetchAssociative();
        } catch (\Doctrine\DBAL\Driver\Exception $e) {
            return $e->getMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
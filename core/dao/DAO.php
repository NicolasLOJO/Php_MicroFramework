<?php

abstract class DAO implements CRUDInterface, RepositoryInterface{

    protected $pdo;

    public function __construct(){
        $this->pdo = Database::connect();
    }
}
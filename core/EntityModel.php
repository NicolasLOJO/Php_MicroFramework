<?php

abstract class EntityModel implements Persistable {

    protected $dao;

    public function __construct(){
        $name = "DAO".get_class($this);
        $this->dao = new $name();
    }

    public function load(){
        return $this->dao->retrieve(3);
    }

    public function update(){
        //return $this->dao->update($id);
        //return $this->dao->create($array_assoc);
    }

    public function remove(){
        //return $this->dao->delete($id);
    }
}
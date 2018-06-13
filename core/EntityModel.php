<?php

abstract class EntityModel implements Persistable {

    protected static $dao;

    public function __construct(){
        $name = "DAO".get_class($this);
        self::$dao = new $name();
    }

    public function load(){
        $entity = self::$dao->retrieve($this->get_id());
        if(empty($entity)){
            return false;
        } else {
            return $this->hydrate($entity);
        }
    }

    public function update(){
        $assoc_array = [];
        if(empty($this->get_id())){
            foreach($this as $key => $value){
                $assoc_array[$key] = $value;
            }
            $entity = self::$dao->create($assoc_array);
            return $this->hydrate($entity);
        } else {
            foreach($this as $key => $value){
                $assoc_array[$key] = $value;
            }
            return self::$dao->update($assoc_array,$this->get_id());
        }
    }

    public function remove(){
        return self::$dao->delete($this->get_id());
    }
}